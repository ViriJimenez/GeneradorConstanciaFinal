<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestCurso;
use App\Models\Curso;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(15);
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
        $curso->save();
        return redirect('cursos')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect('cursos')->with('mensaje','Curso eliminado correctamente!!');
    }
}
