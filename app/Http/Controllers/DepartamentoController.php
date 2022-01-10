<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestDepartamento;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos= Departamento::paginate(10);
        return view ('departamento.index', compact('departamentos'));
    }


    public function create()
    {
        return view('departamento.create');
    }


    public function store(requestDepartamento $request)
    {
        Departamento::create($request->all());
        return redirect('departamentos')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Departamento $departamento)
    {
        return view('departamento.show', compact('departamento'));
    }


    public function edit(Departamento $departamento)
    {
        return view('departamento.edit', compact('departamento'));
    }


    public function update(requestDepartamento $request, Departamento $departamento)
    {
        $departamento->nombre = $request->nombre;
        $departamento->descripcion = $request->descripcion;
        $departamento->save();
        return redirect('departamentos')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect('departamentos')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
