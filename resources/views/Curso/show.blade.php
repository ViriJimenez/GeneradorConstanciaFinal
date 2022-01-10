@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$curso->titulo}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('cursos.index')}}">Regresar a Cursos</a>
            </div>
        </div>
    </div>
@endsection
