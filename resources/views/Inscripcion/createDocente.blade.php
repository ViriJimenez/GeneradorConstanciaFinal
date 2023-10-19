@extends('layouts.app')

@section('content')
    <form action="{{route('inscripcion.storedocente')}}" method="POST">
        @csrf
        @include('inscripcion.formDocente', ['modo'=> 'Agregar'])
    </form>
@endsection
