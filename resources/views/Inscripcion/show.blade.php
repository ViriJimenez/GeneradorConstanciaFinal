@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">VISTA PREVIA DEL CERTIFICADO</h1>
            <a class="btn btn-warning float-right" href="{{ route('inscripcion.index') }}">Regresar a Inscripcion</a>
        </div>
        <iframe src="{{ route("inscripcion.verCertificadoPDF",[$id,"estudiante"]) }}" frameborder="0" style="width: 100%; height: 82vh;z-index: 999999;position: relative;"></iframe>
    </div>
    </div>
@endsection
