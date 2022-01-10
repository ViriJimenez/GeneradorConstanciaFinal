@extends('layouts.app')

@section('content')
    <form action="{{route('publicos.update', $publico)}}" method="POST">
        @csrf
        @method('PUT')
        @include('publico.form', ['modo'=> 'Editar'])
    </form>
@endsection
