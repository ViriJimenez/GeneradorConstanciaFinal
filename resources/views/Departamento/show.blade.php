@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$departamento->nombre}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('departamentos.index')}}">Regresar a Departamento</a>
            </div>
        </div>
    </div>
@endsection
