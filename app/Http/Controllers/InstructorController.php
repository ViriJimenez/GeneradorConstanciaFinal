<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestInstructor;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{

    public function index()
    {
        $instructors = Instructor::paginate(5);
        return view ('instructor.index', compact('instructors'));
    }


    public function create()
    {
        return view('instructor.create');
    }


    public function store(requestInstructor $request)
    {
        Instructor::create($request->all());
        return redirect('instructors')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Instructor $instructor)
    {
        return view('instructor.show',compact('instructor'));
    }


    public function edit(Instructor $instructor)
    {
        return view('instructor.edit', compact('instructor'));
    }


    public function update(requestInstructor $request, Instructor $instructor)
    {
        $instructor->nombre = $request->nombre;
        $instructor->apaterno = $request->apaterno;
        $instructor->amaterno = $request->amaterno;
        $instructor->correo = $request->correo;
        $instructor->telefono = $request->telefono;
        $instructor->titulo = $request->titulo;
        $instructor->save();
        return redirect('instructors')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect('instructors')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
