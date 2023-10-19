<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use TCPDF;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{

    public function index()
    {
        $sql = DB::table('instructors')
            ->select(
                DB::raw("CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor'"),
                'cursos.titulo',
                'cursos.descripcion',
                'cursos.estado',
                'cursos.modalidad',
                'inscripcions.id',
                'inscripcions.fecha',
                'inscripcions.curso_id',
                'inscripcions.estudiante_id',
                'estudiantes.numerocontrol',
                'estudiantes.correo',
                DB::raw("CONCAT(estudiantes.nombre, estudiantes.apaterno, estudiantes.amaterno) as 'nomEstudiante'"),
                'carreras.nombre',
                'eventos.tipo',
                'eventos.nombre as evento'
            )
            ->join('cursos', 'cursos.instructor_id', '=', 'instructors.id')
            ->join('inscripcions', 'inscripcions.curso_id', '=', 'cursos.id')
            ->join('estudiantes', 'inscripcions.estudiante_id', '=', 'estudiantes.id')
            ->join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')
            ->join('eventos', 'inscripcions.evento_id', '=', 'eventos.id')
            ->paginate(5);


        $publico = DB::table('instructors')
            ->select(
                DB::raw("CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor'"),
                'cursos.titulo',
                'cursos.descripcion',
                'cursos.estado',
                'cursos.modalidad',
                'inscripcions.id',
                'inscripcions.fecha',
                'inscripcions.curso_id',
                'inscripcions.publico_id',
                'publicos.correo',
                DB::raw("CONCAT(publicos.nombre, publicos.apaterno, publicos.amaterno) as 'nomEstudiante'"),
                'eventos.tipo',
                DB::raw("eventos.nombre as 'evento'")
            )
            ->join('cursos', 'cursos.instructor_id', '=', 'instructors.id')
            ->join('inscripcions', 'inscripcions.curso_id', '=', 'cursos.id')
            ->join('publicos', 'inscripcions.publico_id', '=', 'publicos.id')
            ->join('eventos', 'inscripcions.evento_id', '=', 'eventos.id')
            ->paginate(5);

        $docente = DB::table('instructors')
            ->select(
                DB::raw("CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor'"),
                'cursos.titulo',
                'cursos.descripcion',
                'cursos.estado',
                'cursos.modalidad',
                'inscripcions.id',
                'inscripcions.fecha',
                'inscripcions.curso_id',
                DB::raw("CONCAT(docentes.nombre, docentes.apaterno, docentes.amaterno) as 'nomDocente'"),
                'docentes.nombre',
                'docentes.apaterno',
                'docentes.amaterno',
                'docentes.correo',
                'docentes.rfc',
                'eventos.tipo',
                'eventos.nombre as evento',
                'inscripcions.docente_id'
            )
            ->join('cursos', 'cursos.instructor_id', '=', 'instructors.id')
            ->join('inscripcions', 'inscripcions.curso_id', '=', 'cursos.id')
            ->join('docentes', 'inscripcions.docente_id', '=', 'docentes.id')
            ->join('eventos', 'inscripcions.evento_id', '=', 'eventos.id')
            ->paginate(5);



        return view("inscripcion.index", compact("sql", "publico", "docente"));
    }


    public function create()
    {
        $estudiantes = DB::select("select * from estudiantes");
        $cursos = DB::select("select * from cursos");
        $instructores = DB::select("select * from instructors");
        $eventos = DB::select("select * from eventos");
        return view("inscripcion.create", compact("estudiantes", "cursos", "instructores", "eventos"));
    }


    public function store(Request $request)
    {
        Inscripcion::create($request->all());
        return redirect("inscripcion")->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function show($inscripcion)
    {
        $verificarEstadoCurso = DB::select("SELECT
        inscripcions.id,
        cursos.estado
        FROM
        inscripcions
        INNER JOIN cursos ON inscripcions.curso_id = cursos.id
         where inscripcions.id=$inscripcion");

        if ($verificarEstadoCurso[0]->estado != 3) {
            return back()->with("mensaje-error", "El curso aun no ha finalizado");
        }
        return view("inscripcion.show")->with("id", $inscripcion);
    }

    public function showPublico($id)
    {
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
        return view("inscripcion.showPublico")->with("id", $id);
    }

    public function showDocente($id)
    {
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
        return view("inscripcion.showDocente")->with("id", $id);
    }


    public function destroy($inscripcion)
    {
        $sql = DB::delete("delete from inscripcions where id=$inscripcion");
        return back()->with('mensaje', 'Registro eliminado correctamente!!');
    }


    //publicos

    public function inscripcionPublico()
    {
        $estudiantes = DB::select("select * from publicos");
        $cursos = DB::select("select * from cursos");
        $instructores = DB::select("select * from instructors");
        $eventos = DB::select("select * from eventos");
        return view("inscripcion.createPublico", compact("estudiantes", "cursos", "instructores", "eventos"));
    }

    public function storePublico(Request $request)
    {
        Inscripcion::create($request->all());
        return redirect("inscripcion")->with('mensaje', 'Registro insertado correctamente!!');
    }


    //incripcion docentes
    public function inscripcionDocente()
    {
        $docentes = DB::select("select * from docentes");
        $cursos = DB::select("select * from cursos");
        $instructores = DB::select("select * from instructors");
        $eventos = DB::select("select * from eventos");
        return view("inscripcion.createDocente", compact("docentes", "cursos", "instructores", "eventos"));
    }

    public function storeDocente(Request $request)
    {
        Inscripcion::create($request->all());
        return redirect("inscripcion")->with('mensaje', 'Registro insertado correctamente!!');
    }


    public function verCertificadoPDF($id, $modelo)
    {
        if ($modelo == "estudiante") {
            $datos = DB::select(" SELECT
            CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) AS nomInstructor,
            cursos.titulo,
            cursos.descripcion,
            cursos.estado,
            cursos.modalidad,
            inscripcions.id,
            inscripcions.fecha,
            inscripcions.curso_id,
            inscripcions.estudiante_id,
            estudiantes.numerocontrol,
            CONCAT(estudiantes.nombre,' ', estudiantes.apaterno, ' ', estudiantes.amaterno) AS nomEstudiante,
            carreras.nombre,
            eventos.tipo,
            eventos.nombre as evento
            FROM
            instructors
            JOIN cursos ON cursos.instructor_id = instructors.id
            JOIN inscripcions ON inscripcions.curso_id = cursos.id
            JOIN estudiantes ON inscripcions.estudiante_id = estudiantes.id
            JOIN carreras ON estudiantes.carrera_id = carreras.id
            INNER JOIN eventos ON inscripcions.evento_id = eventos.id where inscripcions.id=$id ");

            foreach ($datos as $key => $value) {
                $otorga = strtoupper($value->nomEstudiante);
                $evento = $value->evento;
                $curso = $value->titulo;
                $tipo = $value->tipo;
            }
        } else {
            if ($modelo == "docente") {
                $datos = DB::select(" SELECT
                CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) AS nomInstructor,
                cursos.titulo,
                cursos.descripcion,
                cursos.estado,
                cursos.modalidad,
                inscripcions.id,
                inscripcions.fecha,
                inscripcions.curso_id,
                CONCAT(docentes.nombre,' ',docentes.apaterno,' ',docentes.amaterno) AS nomDocente,
                eventos.nombre AS evento,
                eventos.tipo,
                inscripcions.docente_id
                FROM
                instructors
                JOIN cursos ON cursos.instructor_id = instructors.id
                JOIN inscripcions ON inscripcions.curso_id = cursos.id
                INNER JOIN eventos ON inscripcions.evento_id = eventos.id
                INNER JOIN docentes ON inscripcions.docente_id = docentes.id
                 where inscripcions.id=$id ");

                foreach ($datos as $key => $value) {
                    $otorga = strtoupper($value->nomDocente);
                    $evento = $value->evento;
                    $curso = $value->titulo;
                    $tipo = $value->tipo;
                }
            } else {
                if ($modelo == "publico") {
                    $datos = DB::select(" SELECT
                    CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) AS nomInstructor,
                    cursos.titulo,
                    cursos.descripcion,
                    cursos.estado,
                    cursos.modalidad,
                    inscripcions.id,
                    inscripcions.fecha,
                    inscripcions.curso_id,
                    inscripcions.publico_id,
                    CONCAT(publicos.nombre,' ',publicos.apaterno,' ',publicos.amaterno) AS nomPublico,
                    eventos.nombre AS evento,
                    eventos.tipo
                    FROM
                    instructors
                    JOIN cursos ON cursos.instructor_id = instructors.id
                    JOIN inscripcions ON inscripcions.curso_id = cursos.id
                    JOIN publicos ON inscripcions.publico_id = publicos.id
                    INNER JOIN eventos ON inscripcions.evento_id = eventos.id where inscripcions.id=$id ");

                    foreach ($datos as $key => $value) {
                        $otorga = strtoupper($value->nomPublico);
                        $evento = $value->evento;
                        $curso = $value->titulo;
                        $tipo = $value->tipo;
                    }
                }
            }
        }




        $dia = date("d");
        $mes =  date("m");
        $anio =  date("y");
        switch ($mes) {
            case '01':
                $nombreMes = "Enero";
                break;
            case '02':
                $nombreMes = "Febrero";
                break;
            case '03':
                $nombreMes = "Marzo";
                break;
            case '04':
                $nombreMes = "Abril";
                break;
            case '05':
                $nombreMes = "Mayo";
                break;
            case '06':
                $nombreMes = "Junio";
                break;
            case '07':
                $nombreMes = "Julio";
                break;
            case '08':
                $nombreMes = "Agosto";
                break;
            case '09':
                $nombreMes = "Septiembre";
                break;
            case '10':
                $nombreMes = "Octubre";
                break;
            case '11':
                $nombreMes = "Noviembre";
                break;
            case '12':
                $nombreMes = "Diciembre";
                break;
            default:
                $nombreMes = "Mes no válido";
                break;
        }


        // Crear una nueva instancia de TCPDF
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->setPageOrientation('P'); // L para horizontal, P para vertical
        // Agregar la primera página
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(false, 0);
        $pdf->SetMargins(0, 0, 0);
        
        if ($tipo == "curso") {
            $pdf->Image(public_path("certificados/cer-curso.jpg"), 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight());
        } else {
            $pdf->Image(public_path("certificados/cer-conferencia.jpg"), 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight());
        }


        // Mostrar el PDF en el navegador


        // Posicionamiento y dimensiones del texto
        $x = 15;
        $y = 120;
        $w = 180;
        $h = 12;
        $fill = false; // color de fondo
        $pdf->SetFont('helvetica', 'B', 25);
        $pdf->SetLineWidth(0.25);
        $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
        $pdf->SetTextColor(16, 64, 153);
        $text = $otorga;
        $pdf->MultiCell($w, $h, $text, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
        //$pdf->Rect($x, $y, $w, $h, 'D');


        $x = 27;
        $y = 152;
        $w = 156;
        $h = 12;
        $fill = false; // color de fondo
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->SetLineWidth(0.25);
        $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
        $pdf->SetTextColor(2, 13, 33);
        $text2 = $curso;
        $pdf->MultiCell($w, $h, $text2, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
        //$pdf->Rect($x, $y, $w, $h, 'D');


        $x = 86;
        $y = 165;
        $w = 94;
        $h = 10;
        $fill = false; // color de fondo
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->SetLineWidth(0.25);
        $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
        $pdf->SetTextColor(2, 13, 33);
        $text3 = $evento;
        $pdf->MultiCell($w, $h, $text3, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
        //$pdf->Rect($x, $y, $w, $h, 'D');



        $x = 93;
        $y = 197.7;
        $w = 15;
        $h = 10;
        $fill = false; // color de fondo
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetLineWidth(0.25);
        $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
        $pdf->SetTextColor(2, 13, 33);
        $text3 = $dia;
        $pdf->MultiCell($w, $h, $text3, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
        //$pdf->Rect($x, $y, $w, $h, 'D');


        $x = 113;
        $y = 197.7;
        $w = 29;
        $h = 10;
        $fill = false; // color de fondo
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetLineWidth(0.25);
        $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
        $pdf->SetTextColor(2, 13, 33);
        $text3 = $nombreMes;
        $pdf->MultiCell($w, $h, $text3, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
        //$pdf->Rect($x, $y, $w, $h, 'D');


        $x = 158;
        $y = 197.7;
        $w = 29;
        $h = 10;
        $fill = false; // color de fondo
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetLineWidth(0.25);
        $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
        $pdf->SetTextColor(2, 13, 33);
        $text3 = substr($anio, -1);
        $pdf->MultiCell($w, $h, $text3, 1, "L", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
        //$pdf->Rect($x, $y, $w, $h, 'D');


        $pdf->Output('certificado-'.$otorga . '.pdf', 'I');
    }

    // public function verCertificadoPublicoPDF($id, $modelo)
    // {
    //     if ($modelo == "estudiante") {
    //         $datos = DB::select(" SELECT 
    //         CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor',
    //         cursos.titulo,
    //         cursos.descripcion,
    //         cursos.estado,
    //         cursos.modalidad,
    //         inscripcions.id,
    //         inscripcions.fecha,
    //         inscripcions.curso_id,
    //         inscripcions.publico_id,
    //         publicos.curp,
    //         CONCAT(publicos.nombre, publicos.apaterno, publicos.amaterno) as 'nomPublico'
    //         FROM instructors JOIN cursos ON cursos.instructor_id = instructors.id
    //         JOIN inscripcions ON inscripcions.curso_id = cursos.id JOIN 
    //         publicos ON inscripcions.publico_id = publicos.id where inscripcions.id=$id ");

    //         foreach ($datos as $key => $value) {
    //             $nomPublico = $value->nomPublico;
    //             $nomInstructor = $value->nomInstructor;
    //             $curso = $value->titulo;
    //         }
    //     } else {
    //         if ($modelo == "docente") {
    //             $datos = DB::select(" SELECT 
    //             CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor',
    //             cursos.titulo,
    //             cursos.descripcion,
    //             cursos.estado,
    //             cursos.modalidad,
    //             inscripcions.id,
    //             inscripcions.fecha,
    //             inscripcions.curso_id,
    //             inscripcions.publico_id,
    //             publicos.curp,
    //             CONCAT(publicos.nombre, publicos.apaterno, publicos.amaterno) as 'nomPublico'
    //             FROM instructors JOIN cursos ON cursos.instructor_id = instructors.id
    //             JOIN inscripcions ON inscripcions.curso_id = cursos.id JOIN 
    //             publicos ON inscripcions.publico_id = publicos.id where inscripcions.id=$id ");

    //             foreach ($datos as $key => $value) {
    //                 $nomPublico = $value->nomPublico;
    //                 $nomInstructor = $value->nomInstructor;
    //                 $curso = $value->titulo;
    //             }
    //         } else {
    //             if ($modelo == "publico") {
    //                 $datos = DB::select(" SELECT 
    //             CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor',
    //             cursos.titulo,
    //             cursos.descripcion,
    //             cursos.estado,
    //             cursos.modalidad,
    //             inscripcions.id,
    //             inscripcions.fecha,
    //             inscripcions.curso_id,
    //             inscripcions.publico_id,
    //             publicos.curp,
    //             CONCAT(publicos.nombre, publicos.apaterno, publicos.amaterno) as 'nomPublico'
    //             FROM instructors JOIN cursos ON cursos.instructor_id = instructors.id
    //             JOIN inscripcions ON inscripcions.curso_id = cursos.id JOIN 
    //             publicos ON inscripcions.publico_id = publicos.id where inscripcions.id=$id ");

    //                 foreach ($datos as $key => $value) {
    //                     $nomPublico = $value->nomPublico;
    //                     $nomInstructor = $value->nomInstructor;
    //                     $curso = $value->titulo;
    //                 }
    //             }
    //         }
    //     }


    //     $fecha = date("d-m-Y H:i:s");

    //     // Crear una nueva instancia de TCPDF
    //     $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    //     $pdf->setPageOrientation('P'); // L para horizontal, P para vertical
    //     // Agregar la primera página
    //     $pdf->AddPage();
    //     $pdf->SetAutoPageBreak(false, 0);
    //     $pdf->SetMargins(0, 0, 0);
    //     $pdf->Image(public_path("certificados/modelo.jpg"), 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight());
    //     // Mostrar el PDF en el navegador


    //     // Posicionamiento y dimensiones del texto
    //     $x = 60;
    //     $y = 60;
    //     $w = 60;
    //     $h = 60;
    //     $fill = false; // color de fondo
    //     $pdf->SetFont('helvetica', 'B', 20);
    //     $pdf->SetLineWidth(0.25);
    //     $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
    //     $text = $nomPublico;
    //     $pdf->MultiCell($w, $h, $text, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
    //     $pdf->Rect($x, $y, $w, $h, 'D');


    //     $x = 70;
    //     $y = 70;
    //     $w = 70;
    //     $h = 70;
    //     $fill = false; // color de fondo
    //     $pdf->SetFont('helvetica', 'B', 20);
    //     $pdf->SetLineWidth(0.25);
    //     $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
    //     $text2 = $curso;
    //     $pdf->MultiCell($w, $h, $text2, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
    //     $pdf->Rect($x, $y, $w, $h, 'D');


    //     $x = 80;
    //     $y = 80;
    //     $w = 80;
    //     $h = 80;
    //     $fill = false; // color de fondo
    //     $pdf->SetFont('helvetica', 'B', 20);
    //     $pdf->SetLineWidth(0.25);
    //     $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
    //     $text3 = $nomInstructor;
    //     $pdf->MultiCell($w, $h, $text3, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
    //     $pdf->Rect($x, $y, $w, $h, 'D');

    //     $pdf->Output('certificado-' . '.pdf', 'I');
    // }

    // public function verCertificadoDocentePDF($id)
    // {
    //     //nos trae los datos de la inscripcion de los ESTUDIANTES
    //     $datos = DB::select(" SELECT 
    //     CONCAT(instructors.nombre, instructors.apaterno, instructors.amaterno) as 'nomInstructor',
    //     cursos.titulo,
    //     cursos.descripcion,
    //     cursos.estado,
    //     cursos.modalidad,
    //     inscripcions.id,
    //     inscripcions.fecha,
    //     inscripcions.curso_id,
    //     inscripcions.publico_id,
    //     publicos.curp,
    //     CONCAT(publicos.nombre, publicos.apaterno, publicos.amaterno) as 'nomPublico'
    //     FROM instructors JOIN cursos ON cursos.instructor_id = instructors.id
    //     JOIN inscripcions ON inscripcions.curso_id = cursos.id JOIN 
    //     publicos ON inscripcions.publico_id = publicos.id where inscripcions.id=$id ");

    //     foreach ($datos as $key => $value) {
    //         $nomPublico = $value->nomPublico;
    //         $nomInstructor = $value->nomInstructor;
    //         $curso = $value->titulo;
    //     }
    //     $fecha = date("d-m-Y H:i:s");

    //     // Crear una nueva instancia de TCPDF
    //     $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    //     $pdf->setPageOrientation('P'); // L para horizontal, P para vertical
    //     // Agregar la primera página
    //     $pdf->AddPage();
    //     $pdf->SetAutoPageBreak(false, 0);
    //     $pdf->SetMargins(0, 0, 0);
    //     $pdf->Image(public_path("certificados/modelo.jpg"), 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight());
    //     // Mostrar el PDF en el navegador


    //     // Posicionamiento y dimensiones del texto
    //     $x = 60;
    //     $y = 60;
    //     $w = 60;
    //     $h = 60;
    //     $fill = false; // color de fondo
    //     $pdf->SetFont('helvetica', 'B', 20);
    //     $pdf->SetLineWidth(0.25);
    //     $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
    //     $text = $nomPublico;
    //     $pdf->MultiCell($w, $h, $text, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
    //     $pdf->Rect($x, $y, $w, $h, 'D');


    //     $x = 70;
    //     $y = 70;
    //     $w = 70;
    //     $h = 70;
    //     $fill = false; // color de fondo
    //     $pdf->SetFont('helvetica', 'B', 20);
    //     $pdf->SetLineWidth(0.25);
    //     $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
    //     $text2 = $curso;
    //     $pdf->MultiCell($w, $h, $text2, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
    //     $pdf->Rect($x, $y, $w, $h, 'D');


    //     $x = 80;
    //     $y = 80;
    //     $w = 80;
    //     $h = 80;
    //     $fill = false; // color de fondo
    //     $pdf->SetFont('helvetica', 'B', 20);
    //     $pdf->SetLineWidth(0.25);
    //     $pdf->SetDrawColor(255, 0, 0); // Establece el color de borde a rojo
    //     $text3 = $nomInstructor;
    //     $pdf->MultiCell($w, $h, $text3, 1, "C", $fill, 1, $x, $y, true, 0, false, true, $h, 'T');
    //     $pdf->Rect($x, $y, $w, $h, 'D');

    //     $pdf->Output('certificado-' . '.pdf', 'I');
    // }
}
