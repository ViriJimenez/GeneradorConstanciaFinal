@extends('layouts.app')

@section('content')
    <form action="{{route('conferencias.update', $conferencia)}}" method="POST">
        @csrf
        @method('PUT')
        @include('conferencia.form', ['modo'=> 'Editar'])
    </form>
@endsection
