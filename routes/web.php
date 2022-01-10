<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\PublicoController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('carreras', CarreraController::class)->middleware('auth');
Route::resource('departamentos', DepartamentoController::class)->middleware('auth');
Route::resource('eventos', EventoController::class)->middleware('auth');
Route::resource('ponentes', PonenteController::class)->middleware('auth');
Route::resource('instructors', InstructorController::class)->middleware('auth');
Route::resource('publicos', PublicoController::class)->middleware('auth');;
Route::resource('estudiantes', EstudianteController::class)->middleware('auth');
Route::resource('docentes', DocenteController::class)->middleware('auth');
Route::resource('cursos', CursoController::class)->middleware('auth');
Route::resource('conferencias', ConferenciaController::class)->middleware('auth');


Auth::routes(['reset'=>true]);

#Route::get('/home', [DocenteController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [CarreraController::class, 'index'])->name('home');
});
