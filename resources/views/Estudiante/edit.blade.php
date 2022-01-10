@extends('layouts.app')

@section('content')
    <form action="{{route('estudiantes.update', $estudiante)}}" method="POST">
        @csrf
        @method('PUT')
        @include('estudiante.form', ['modo'=> 'Editar'])
    </form>
@endsection
