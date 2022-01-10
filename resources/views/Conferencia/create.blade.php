@extends('layouts.app')

@section('content')
    <form action="{{route('conferencias.store')}}" method="POST">
        @csrf
        @include('conferencia.form', ['modo'=> 'Agregar'])
    </form>
@endsection
