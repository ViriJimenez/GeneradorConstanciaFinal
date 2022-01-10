@extends('layouts.app')

@section('content')
    <form action="{{route('carreras.store')}}" method="POST">
        @csrf
        @include('carrera.form', ['modo'=> 'Agregar'])
    </form>
@endsection
