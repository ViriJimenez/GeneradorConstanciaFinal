@extends('layouts.app')

@section('content')
    <form action="{{route('cursos.store')}}" method="POST">
        @csrf
        @include('curso.form', ['modo'=> 'Agregar'])
    </form>
@endsection
