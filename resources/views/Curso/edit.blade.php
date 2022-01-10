@extends('layouts.app')

@section('content')
    <form action="{{route('cursos.update', $curso)}}" method="POST">
        @csrf
        @method('PUT')
        @include('curso.form', ['modo'=> 'Editar'])
    </form>
@endsection
