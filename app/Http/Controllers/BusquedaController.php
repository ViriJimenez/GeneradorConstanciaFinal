<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            "numero" => "required",
            "tipo" => "required"
        ]);
        $numero = $request->numero;

        if ($request->tipo == "estudiante") {
            //verificar si el $request->numero existe 
            $verificar = DB::select("SELECT
            cursos.titulo,
            cursos.estado,
            inscripcions.id,
            inscripcions.estudiante_id
            FROM
            cursos
            INNER JOIN inscripcions ON inscripcions.curso_id = cursos.id
            INNER JOIN estudiantes ON inscripcions.estudiante_id = estudiantes.id
            where estudiantes.numerocontrol='$numero'
            ");

            if (count($verificar) <= 0) {
                return back()->with("mensaje-error", "No se encontraron resultados");
            } else {
                return view("resultado")->with("datos", $verificar)->with("modelo", $request->tipo);
            }
        }


        if ($request->tipo == "docente") {
            //verificar si el $request->numero existe 
            $verificar = DB::select("SELECT
            cursos.titulo,
            cursos.estado,
            inscripcions.id,
            inscripcions.docente_id
            FROM
            cursos
            INNER JOIN inscripcions ON inscripcions.curso_id = cursos.id
            INNER JOIN docentes ON inscripcions.docente_id = docentes.id
            where docentes.rfc='$numero'
            ");

            if (count($verificar) <= 0) {
                return back()->with("mensaje-error", "No se encontraron resultados");
            } else {
                return view("resultado")->with("datos", $verificar)->with("modelo", $request->tipo);
            }
        }


        if ($request->tipo == "publico") {
            //verificar si el $request->numero existe 
            $verificar = DB::select("SELECT
            cursos.titulo,
            cursos.estado,
            inscripcions.id,
            inscripcions.publico_id
            FROM
            cursos
            INNER JOIN inscripcions ON inscripcions.curso_id = cursos.id
            INNER JOIN publicos ON inscripcions.publico_id = publicos.id
            where publicos.curp='$numero'
            ");

            if (count($verificar) <= 0) {
                return back()->with("mensaje-error", "No se encontraron resultados");
            } else {
                return view("resultado")->with("datos", $verificar)->with("modelo", $request->tipo);
            }
        }

        return back()->with("mensaje-error", "Se ha encontrado un error inesperado");
    }

    public function show($id, $modelo)
    {

        if ($modelo == "estudiante") {
            $verificarEstadoCurso = DB::select("SELECT
            inscripcions.id,
            cursos.estado
            FROM
            inscripcions
            INNER JOIN cursos ON inscripcions.curso_id = cursos.id
             where inscripcions.id=$id");

            if ($verificarEstadoCurso[0]->estado != 3) {
                return back()->with("mensaje-error", "El curso aun no ha finalizado");
            }
            return view("miCertificado")->with("id", $id)->with("modelo", $modelo);
        }


        if ($modelo == "docente") {
            $verificarEstadoCurso = DB::select("SELECT
            inscripcions.id,
            cursos.estado
            FROM
            inscripcions
            INNER JOIN cursos ON inscripcions.curso_id = cursos.id
            where inscripcions.id=$id");

            if ($verificarEstadoCurso[0]->estado != 3) {
                return back()->with("mensaje-error", "El curso aun no ha finalizado");
            }
            return view("miCertificado")->with("id", $id)->with("modelo", $modelo);
        }


        if ($modelo == "publico") {
            $verificarEstadoCurso = DB::select("SELECT
            inscripcions.id,
            cursos.estado
            FROM
            inscripcions
            INNER JOIN cursos ON inscripcions.curso_id = cursos.id
            where inscripcions.id=$id");

            if ($verificarEstadoCurso[0]->estado != 3) {
                return back()->with("mensaje-error", "El curso aun no ha finalizado");
            }
            return view("miCertificado")->with("id", $id)->with("modelo", $modelo);
        }

        return back()->with("mensaje-error", "Ha ocurrido un error");
    }
}
