@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$ponente->nombre}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('ponentes.index')}}">Regresar a Ponentes</a>
            </div>
        </div>
    </div>
@endsection
