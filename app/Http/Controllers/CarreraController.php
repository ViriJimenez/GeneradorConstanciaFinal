<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestCarrera;
use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{

    public function index()
    {
        $carreras= Carrera::paginate(5);
        return view ('carrera.index', compact('carreras'));
    }


    public function create()
    {
        return view ('carrera.create');
    }


    public function store(requestCarrera $request)
    {
        Carrera::create($request->all());
        return redirect('carreras')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Carrera $carrera)
    {
        return view('carrera.show', compact('carrera'));
    }


    public function edit(Carrera $carrera)
    {
        return view('carrera.edit', compact('carrera'));
    }


    public function update(requestCarrera $request, Carrera $carrera)
    {
        $carrera->nombre = $request->nombre;
        $carrera->save();
        return redirect('carreras')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras.index');
        // $carrera->delete();
        // return redirect('carreras')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
