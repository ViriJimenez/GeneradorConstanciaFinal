@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$carrera->nombre}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('carreras.index')}}">Regresar a Carrera</a>
            </div>
        </div>
    </div>
@endsection
