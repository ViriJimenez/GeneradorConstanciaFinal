<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestDocente;
use App\Models\Departamento;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::paginate(10);
        return view ('docente.index', compact('docentes'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('Docente.create', compact('departamentos'));
    }

    public function store(requestDocente $request)
    {
        $datos = request()->except('_token');
        if ($request->hasFile('foto')){
            $datos['foto'] = $request->file('foto')->store('uploads','public');
        }
        Docente::insert($datos);
        return redirect('docentes')->with('mensaje', 'Registro insertado corectamente!!');
    }

    public function show(Docente $docente)
    {
         return view('docente.show', compact('docente'));

    }

    public function edit(Docente $docente)
    {
        $departamentos = Departamento::all();
        return view('docente.edit', compact('docente', 'departamentos'));
    }


    public function update(requestDocente $request, Docente $docente)
    {
        $datos = request()->except(['_token','_method']);
        if ($request->hasFile('foto')){
            // $instructor = Instructor::findOrFail($instructor->id);
            Storage::delete('public/',$docente->id);
            $datos['foto'] = $request->file('foto')->store('uploads','public');
        }
        Docente::where('id','=',$docente->id)->update($datos);
        return redirect('docentes')->with('mensaje', 'Registro actualizado corectamente!!');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect('docentes')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
