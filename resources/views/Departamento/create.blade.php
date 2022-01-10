@extends('layouts.app')

@section('content')
    <form action="{{route('departamentos.store')}}" method="POST">
        @csrf
        @include('departamento.form', ['modo'=> 'Agregar'])
    </form>
@endsection
