@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$estudiante->nombre}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('estudiantes.index')}}">Regresar a Estudiante</a>
            </div>
        </div>
    </div>
@endsection
