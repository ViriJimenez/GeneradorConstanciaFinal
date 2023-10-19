@extends('layouts.app')

@section('content')
    <form action="{{route('inscripcion.store')}}" method="POST">
        @csrf
        @include('inscripcion.form', ['modo'=> 'Agregar'])
    </form>
@endsection
