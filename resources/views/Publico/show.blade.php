@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-3">
            <h1 class="text-center">{{$publico->nombre}}</h1>
                <a class ="btn btn-warning float-right" href="{{route('publicos.index')}}">Regresar a Publico</a>
            </div>
        </div>
    </div>
@endsection
