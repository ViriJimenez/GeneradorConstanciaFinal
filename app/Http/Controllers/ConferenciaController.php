<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestConferencia;
use App\Models\Conferencia;
use App\Models\Docente;
use App\Models\Ponente;
use Illuminate\Http\Request;

class ConferenciaController extends Controller
{
    public function index()
    {
        $conferencias = Conferencia::paginate(15);
        return view ('conferencia.index', compact('conferencias'));
    }


    public function create()
    {
        $docentes = Docente::all();
        return view('conferencia.create', compact('docentes'));
        //return view('conferencia.create')->with('docentes',$docentes);

        $ponentes = Ponente::all();
        return view('conferencia.create', compact('ponentes'));
        //return view('conferencia.create')->with('ponentes',$ponentes);
    }


    public function store(Request $request)
    {
        //return $request;
        Conferencia::create($request->all());
        return redirect('conferencias')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Conferencia $conferencia)
    {
        return view('conferencia.show', compact('conferencia'));
    }


    public function edit(Conferencia $conferencia)
    {

        $docentes = Docente::all();
        return view('conferencia.edit', compact('conferencia', 'docentes'));

        $ponentes = Ponente::all();
        return view('conferencia.edit', compact('conferencia', 'ponentes'));

    }


    public function update(requestConferencia $request, Conferencia $conferencia)
    {
        $conferencia->titulo = $request->titulo;
        $conferencia->descripcion = $request->descripcion;
        $conferencia->modalidad = $request->modalidad;
        $conferencia->fecha = $request->fecha;
        $conferencia->hora = $request->hora;
        $conferencia->ponente_id = $request->ponente_id;
        $conferencia->docente_id = $request->docente_id;
        $conferencia->save();
        return redirect('conferencias')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Conferencia $conferencia)
    {
        $conferencia->delete();
        return redirect('conferencias')->with('mensaje','Conferencia eliminado correctamente!!');
    }
}
