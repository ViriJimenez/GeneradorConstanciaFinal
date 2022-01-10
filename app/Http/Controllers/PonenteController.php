<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestPonente;
use App\Models\Ponente;
use Illuminate\Http\Request;

class PonenteController extends Controller
{

    public function index()
    {
        $ponentes = Ponente::paginate(10);
        return view ('ponente.index', compact('ponentes'));
    }


    public function create()
    {
        return view('ponente.create');
    }


    public function store(requestPonente $request)
    {
        Ponente::create($request->all());
        return redirect('ponentes')->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show(Ponente $ponente)
    {
        return view('ponente.show',compact('ponente'));
    }


    public function edit(Ponente $ponente)
    {
        return view('ponente.edit', compact('ponente'));
    }


    public function update(requestPonente $request, Ponente $ponente)
    {
        $ponente->nombre = $request->nombre;
        $ponente->clave = $request->clave;
        $ponente->correo = $request->correo;
        $ponente->save();
        return redirect('ponentes')->with('mensaje', 'Registro actualizado correctamente!!');
    }


    public function destroy(Ponente $ponente)
    {
        $ponente->delete();
        return redirect('ponentes')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
