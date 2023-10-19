<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestPublico;
use App\Models\Publico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicoController extends Controller
{

    public function index()
    {
        $publicos = Publico::paginate(5);
        return view('publico.index', compact('publicos'));
    }


    public function create()
    {
        return view('publico.create');
    }


    public function store(requestPublico $request)
    {
        //Publico::create($request->all());
        $datos = request()->except('_token', 'password', "correo2");
        Publico::insert($datos);

        //insertando datos en la table users
        $password = bcrypt($request->password);
        $publico = DB::insert('insert into users (name, email, password, tipo_usuario) values (?, ?, ?,?)', [$request->nombre, $request->correo, $password, 4]);
        return redirect('publicos')->with('mensaje', 'Registro insertado correctamente!!');
    }

    public function show(Publico $publico)
    {
        return view('publico.show', compact('publico'));
    }

    public function edit(Publico $publico)
    {
        return view('publico.edit', compact('publico'));
    }


    public function update(requestPublico $request, Publico $publico)
    {
        //actualizando datos en la table users
        $users = DB::update('update users set name = ?, email = ? where email = ?', [$request->nombre, $request->correo, $request->correo2]);

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
        //eliminamos el registro de la tabla users
        $user = DB::delete('delete from users where email = ?', [$publico->correo]);

        $publico->delete();
        return redirect('publicos')->with('mensaje', 'Registro eliminado correctamente!!');
    }

    public function registro(Request $request)
    {
        $request->validate([
            "curp" => "required",
            "nombre" => "required",
            "apaterno" => "required",
            "amaterno" => "required",
            "correo" => "required",
            "telefono" => "required",
            "direccion" => "required",
            "edad" => "required",
            "password" => "required",
        ]);

        $sql = DB::insert(
            " insert into publicos (curp,nombre,apaterno,amaterno,correo,telefono,direccion,edad) values (?,?,?,?,?,?,?,?)",
            [$request->curp, $request->nombre, $request->apaterno, $request->amaterno, $request->correo, $request->telefono, $request->direccion, $request->edad]
        );

        $registroUser = DB::insert(
            "insert into users (name,email,password,tipo_usuario) values (?,?,?,?)",
            [$request->nombre, $request->correo, bcrypt($request->password), 4]
        );

        if ($sql == 1 && $registroUser == 1) {
            return back()->with('mensaje', 'Registro actualizado correctamente!!');
        } else {
            return back()->with('mensaje', 'Error al registrar!!');
        }
    }
}
