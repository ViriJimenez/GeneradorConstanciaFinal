@extends('layouts.app')

@section('content')
    <form action="{{route('estudiantes.store')}}" method="POST">
        @csrf
        @include('estudiante.form', ['modo'=> 'Agregar'])
    </form>
@endsection
