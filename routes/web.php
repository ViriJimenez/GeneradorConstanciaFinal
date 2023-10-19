<?php

use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\BusquedasController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocentesPonenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\PublicoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
    //return view('auth.login');
});


Route::get('inscripcion/de/publico', [InscripcionController::class, "inscripcionPublico"])->name('inscripcion.publico')->middleware(['verified']);
Route::post('inscripcion/de/publico', [InscripcionController::class, "storePublico"])->name('inscripcion.storepublico')->middleware(['verified']);

Route::get('inscripcion/de/docente', [InscripcionController::class, "inscripcionDocente"])->name('inscripcion.docente')->middleware(['verified']);
Route::post('inscripcion/de/docente', [InscripcionController::class, "storeDocente"])->name('inscripcion.storedocente')->middleware(['verified']);

Route::get('verCertificado/pdf/{id}-{modelo}', [InscripcionController::class, "verCertificadoPDF"])->name('inscripcion.verCertificadoPDF')->middleware(['verified']);
//Route::get('verCertificadoPublico/pdf/{id}', [InscripcionController::class, "verCertificadoPublicoPDF"])->name('inscripcion.verCertificadoPublicoPDF');
Route::get('verCertificado/{id}', [InscripcionController::class, "showPublico"])->name('inscripcion.showPublico')->middleware(['verified']);
Route::get('verCertificadoDocente/{id}', [InscripcionController::class, "showDocente"])->name('inscripcion.showDocente')->middleware(['verified']);

Route::resource('carreras', CarreraController::class)->middleware(['verified', 'administrador']);
Route::resource('departamentos', DepartamentoController::class)->middleware(['verified', 'administrador']);
Route::resource('eventos', EventoController::class)->middleware(['verified', 'administrador']);
Route::resource('ponentes', PonenteController::class)->middleware(['verified', 'administrador']);
Route::resource('instructors', InstructorController::class)->middleware(['verified', 'administrador']);
Route::resource('publicos', PublicoController::class)->middleware(['verified', 'administrador']);
Route::post('registroPublico', [PublicoController::class, "registro"])->name('publicos.registro');

Route::resource('estudiantes', EstudianteController::class)->middleware(['verified', 'administrador']);
Route::resource('docentes', DocenteController::class)->middleware(['verified', 'administrador']);
Route::resource('cursos', CursoController::class)->middleware(['verified', 'administrador']);
Route::resource('conferencias', ConferenciaController::class)->middleware(['verified', 'administrador']);
Route::resource('dp', DocentesPonenteController::class)->middleware(['verified', 'administrador']);
Route::resource('inscripcion', InscripcionController::class)->middleware(['verified']);

//rutas para la busqueda de certificados
Route::get("busqueda/{id}-{modelo}", [BusquedaController::class, "show"])->name("busqueda.show")->middleware(['verified']);
Route::get("busqueda", [BusquedaController::class, "search"])->name("busqueda.search")->middleware(['verified']);



//Auth::routes(['register' => true, 'reset' => false]);
Route::get('register', function () {
    return view('auth/register');
})->name("register")->middleware(['verified', 'administrador']);

#Route::get('/home', [DocenteController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [DocenteController::class, 'index'])->name('home')->middleware(['verified', 'administrador']);
});



//busquedas
Route::resource('busquedas', BusquedasController::class)->middleware(['verified']);


//eliminar imagen
Route::get('eliminarImagen/{id}', [DocenteController::class, "eliminarImagen"])->name('docente.eliminarImagen')->middleware(['verified']);
