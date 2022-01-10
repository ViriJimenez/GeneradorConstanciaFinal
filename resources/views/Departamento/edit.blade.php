@extends('layouts.app')

@section('content')
    <form action="{{route('departamentos.update', $departamento)}}" method="POST">
        @csrf
        @method('PUT')
        @include('departamento.form', ['modo'=> 'Editar'])
    </form>
@endsection
