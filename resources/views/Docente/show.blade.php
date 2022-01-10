@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$docente->nombre}} {{$docente->apaterno}} {{$docente->amaterno}}</h1>

            <img class = "img-thumbnail img-fluid" src="{{asset('storage').'/'.$docente->foto}}" alt="{{asset('storage').'/',$docente->foto}}">
            <br>

            <div class="mb-3">
            <a class ="btn btn-warning float-right" href="{{route('docentes.index')}}">Regresar a Docente</a>
            </div>
        </div>
    </div>
@endsection
