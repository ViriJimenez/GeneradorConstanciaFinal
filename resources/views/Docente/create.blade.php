@extends('layouts.app')

@section('content')
    <form action="{{route('docentes.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('docente.form', ['modo'=> 'Agregar'])
    </form>
@endsection
