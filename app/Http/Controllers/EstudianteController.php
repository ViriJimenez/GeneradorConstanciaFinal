<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestEstudiante;
use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::paginate(5);
        return view('estudiante.index', compact('estudiantes'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiante.create', compact('carreras'));
    }

    public function store(requestEstudiante $request)
    {
        $datos = request()->except('_token', 'password', "correo2");
        Estudiante::insert($datos);

        //insertando datos en la table users
        $password = bcrypt($request->password);
        $estudiante = DB::insert('insert into users (name, email, password, tipo_usuario) values (?, ?, ?,?)', [$request->nombre, $request->correo, $password, 3]);


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
        //actualizando datos en la table users
        $users = DB::update('update users set name = ?, email = ? where email = ?', [$request->nombre, $request->correo, $request->correo2]);

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
        //eliminamos el registro de la tabla users
        $user = DB::delete('delete from users where email = ?', [$estudiante->correo]);

        $estudiante->delete();
        return redirect('estudiantes')->with('mensaje', 'Registro eliminado correctamente!!');
    }
}
