<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestEvento;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
        $eventos= Evento::paginate(5);
        return view ('evento.index', compact('eventos'));

    }


    public function create()
    {
        return view('evento.create');
    }


    public function store(requestEvento $request)
    {
        Evento::create($request->all());
        return redirect('eventos')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Evento $evento)
    {
        return view('evento.show', compact('evento'));
    }


    public function edit(Evento $evento)
    {
        return view('evento.edit', compact('evento'));
    }


    public function update(requestEvento $request, Evento $evento)
    {
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo;
        $evento->descripcion = $request->descripcion;
        $evento->save();
        return redirect('eventos')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect('eventos')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
