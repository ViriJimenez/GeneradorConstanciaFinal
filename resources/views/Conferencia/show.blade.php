@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$conferencia->titulo}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('conferencias.index')}}">Regresar a Conferencias</a>
            </div>
        </div>
    </div>
@endsection
