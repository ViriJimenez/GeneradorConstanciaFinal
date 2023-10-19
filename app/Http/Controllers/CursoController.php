<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestCurso;
use App\Models\Curso;
use App\Models\Instructor;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\PDF;

/*** Importamos estos Facades ***/
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(5);
        return view ('curso.index', compact('cursos'));
    }


    public function create()
    {
        $instructors = Instructor::all();
        return view('curso.create', compact('instructors'));
    }


    public function store(requestCurso $request)
    {
        Curso::create($request->all());
        return redirect('cursos')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Curso $curso)
    {
        return view('curso.show', compact('curso'));
    }


    public function edit(Curso $curso)
    {
        $instructors = Instructor::all();
        return view('curso.edit', compact('curso', 'instructors'));
    }


    public function update(requestCurso $request, Curso $curso)
    {
        $curso->titulo = $request->titulo;
        $curso->descripcion = $request->descripcion;
        $curso->modalidad = $request->modalidad;
        $curso->fecha = $request->fecha;
        $curso->hora = $request->hora;
        $curso->instructor_id = $request->instructor_id;
        $curso->estado = $request->estado;
        $curso->save();
        return redirect('cursos')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect('cursos')->with('mensaje','Curso eliminado correctamente!!');
    }

    public function generar_pdf()
    {
        $directorio = "descargas/constancias-cursos";
        if(file_exists(public_path($directorio))){
            File::deleteDirectory(public_path($directorio."/"), 0777, true, true);
            $this->guardarConstancias($directorio);
        }else{
            File::makeDirectory(public_path($directorio), 0777, true, true);
            $this->guardarConstancias($directorio);
        }

        // if(File::exists(public_path('fotos/1.jpg'))){
        //     dd('Si existe el Archivo');
        // }else{
        //     dd('No existe el Archivo');
        // }


//     /**Verificanco si existe el Directorio */

//   $ruta = public_path('upload/imgs');
//   //isDirectory () tomará un argumento como ruta de carpeta y devolverá true si la carpeta existe o false.
//   if(!File::isDirectory($ruta)){
//   //makeDirectory () tomará cuatro argumentos para crear una carpeta con permiso
//   File::makeDirectory($ruta, 0777, true, true);
//   }
//   dd('Directorio Creado');



// /**Crear directorio */
// /*  $path = public_path().'/images';
//   File::makeDirectory($path, 0777, true, true);
// */

//         return $pdf->stream();
    }

    public function guardarConstancias($directorio)
    {
        $cursos = Curso::all();
        $messageData = [
            'titulo' => 'constancias'
        ];
        $pdf = PDF::loadView('Curso.generar_pdf', compact('cursos'));
        //$pdf->save(public_path($directorio."/") . "constancias.pdf");
        Mail::send('Curso.generar_pdf', $messageData , function ($mail) use ($pdf) {
            $mail->from('viri@hotmail.com', 'Viridiana');
            $mail->to('ujko.pekzy58@kygur.com');
            $mail->attachData($pdf->output(), 'constancias.pdf');
        });
    }
}
