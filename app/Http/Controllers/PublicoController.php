<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestPublico;
use App\Models\Publico;
use Illuminate\Http\Request;

class PublicoController extends Controller
{

    public function index()
    {
        $publicos = Publico::paginate(10);
        return view ('publico.index', compact('publicos'));
    }


    public function create()
    {
        return view('publico.create');
    }


    public function store(requestPublico $request)
    {
        Publico::create($request->all());
        return redirect('publicos')->with('mensaje', 'Registro insertado correctamente!!');
    }

    public function show(Publico $publico)
    {
        return view('publico.show',compact('publico'));
    }

    public function edit(Publico $publico)
    {
        return view('publico.edit', compact('publico'));
    }


    public function update(requestPublico $request, Publico $publico)
    {
        $publico->curp = $request->curp;
        $publico->nombre = $request->nombre;
        $publico->apaterno = $request->apaterno;
        $publico->amaterno = $request->amaterno;
        $publico->correo = $request->correo;
        $publico->telefono = $request->telefono;
        $publico->direccion = $request->direccion;
        $publico->edad = $request->edad;
        $publico->save();
        return redirect('publicos')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Publico $publico)
    {
        $publico->delete();
        return redirect('publicos')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
