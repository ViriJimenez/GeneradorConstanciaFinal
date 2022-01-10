@extends('layouts.app')

@section('content')
    <form action="{{route('eventos.store')}}" method="POST">
        @csrf
        @include('evento.form', ['modo'=> 'Agregar'])
    </form>
@endsection
