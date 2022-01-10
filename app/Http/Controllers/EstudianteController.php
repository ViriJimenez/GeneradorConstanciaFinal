<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestEstudiante;
use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::paginate(15);
        return view ('estudiante.index', compact('estudiantes'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiante.create', compact('carreras'));
    }

    public function store(requestEstudiante $request)
    {
        Estudiante::create($request->all());
        return redirect('estudiantes')->with('mensaje', 'Registro insertado corectamente!!');
    }


    public function show(Estudiante $estudiante)
    {
         return view('estudiante.show', compact('estudiante'));

    }

    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::all();
        return view('estudiante.edit', compact('estudiante', 'carreras'));
    }


    public function update(Request $request, Estudiante $estudiante)
    {
        $estudiante->numerocontrol = $request->numerocontrol;
        $estudiante->nombre = $request->nombre;
        $estudiante->apaterno = $request->apaterno;
        $estudiante->amaterno = $request->amaterno;
        $estudiante->correo = $request->correo;
        $estudiante->telefono = $request->telefono;
        $estudiante->direccion = $request->direccion;
        $estudiante->edad = $request->edad;
        $estudiante->carrera_id = $request->carrera_id;
        $estudiante->save();
        return redirect('estudiantes')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect('estudiantes')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
