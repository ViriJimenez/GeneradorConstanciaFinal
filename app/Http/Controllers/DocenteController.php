<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestDocente;
use App\Models\Departamento;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::paginate(8);
        return view('docente.index', compact('docentes'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('docente.create', compact('departamentos'));
    }

    public function store(requestDocente $request)
    {
        $datos = request()->except('_token', 'password', "correo2", "foto");
        if ($request->hasFile('foto')) {
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Docente::insert($datos);

        //insertando datos en la table users
        $password = bcrypt($request->password);
        $docente = DB::insert('insert into users (name, email, password, tipo_usuario) values (?, ?, ?,?)', [$request->nombre, $request->correo, $password, 2]);

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
        $datos = request()->except(['_token', '_method', "correo2"]);
        //verificar si se ha modificado el campo foto y eliminar la foto anterior
        if ($request->hasFile('foto')) {
            //buscamos el nombre de la imagen en la bd
            $nombreIMG = Docente::select('foto')->where('id', '=', $docente->id)->get();
            //eliminamos la foto de storage\app\public\uploads
            Storage::delete('public/' . $nombreIMG[0]->foto);
        }
        if ($request->hasFile('foto')) {
            // $instructor = Instructor::findOrFail($instructor->id);
            Storage::delete('public/', $docente->id);
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        //actualizando datos en la table users
        $users = DB::update('update users set name = ?, email = ? where email = ?', [$request->nombre, $request->correo, $request->correo2]);
        Docente::where('id', '=', $docente->id)->update($datos);
        
        return redirect('docentes')->with('mensaje', 'Registro actualizado corectamente!!');
    }

    public function destroy(Docente $docente)
    {
        //eliminamos el registro de la tabla users
        $user = DB::delete('delete from users where email = ?', [$docente->correo]);
        $docente->delete();
        return redirect('docentes')->with('mensaje', 'Registro eliminado correctamente!!');
    }


    public function eliminarImagen($id)
    {
        //buscamos el nombre de la imagen en la bd
        $nombreIMG = Docente::select('foto')->where('id', '=', $id)->get();
        //eliminamos la foto de storage\app\public\uploads
        Storage::delete('public/' . $nombreIMG[0]->foto);
        //actualizamos el campo foto de la bd
        Docente::where('id', '=', $id)->update(['foto' => ""]);
        //retornamos un mensaje
        return back()->with('mensaje', 'Imagen eliminada correctamente!!');
    }
}
