@extends('layouts.app')

@section('content')
    <form action="{{route('publicos.store')}}" method="POST">
        @csrf
        @include('publico.form', ['modo'=> 'Agregar'])
    </form>
@endsection
