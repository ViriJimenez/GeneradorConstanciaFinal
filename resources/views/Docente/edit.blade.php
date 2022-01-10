@extends('layouts.app')

@section('content')
    <form action="{{route('docentes.update', $docente)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('docente.form', ['modo'=> 'Editar'])
    </form>
@endsection
