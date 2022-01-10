@extends('layouts.app')

@section('content')
    <form action="{{route('eventos.update', $evento)}}" method="POST">
        @csrf
        @method('PUT')
        @include('evento.form', ['modo'=> 'Editar'])
    </form>
@endsection
