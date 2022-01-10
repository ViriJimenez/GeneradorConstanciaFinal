@extends('layouts.app')

@section('content')
    <form action="{{route('carreras.update', $carrera)}}" method="POST">
        @csrf
        @method('PUT')
        @include('carrera.form', ['modo'=> 'Editar'])
    </form>
@endsection
