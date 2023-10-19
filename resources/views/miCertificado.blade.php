@extends('layouts/app')

@section('content')
<div class="container">
    <div class="alert alert-success text-center">RESULTADOS</div>
    <iframe src="{{ route("inscripcion.verCertificadoPDF",[$id,$modelo]) }}" frameborder="0" style="width: 100%; height: 82vh;z-index: 999999;position: relative;"></iframe>

</div>
@endsection