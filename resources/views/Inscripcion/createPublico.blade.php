@extends('layouts.app')

@section('content')
    <form action="{{route('inscripcion.storepublico')}}" method="POST">
        @csrf
        @include('inscripcion.formPublico', ['modo'=> 'Agregar'])
    </form>
@endsection
