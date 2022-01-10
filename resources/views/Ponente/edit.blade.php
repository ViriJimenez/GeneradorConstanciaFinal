@extends('layouts.app')

@section('content')
    <form action="{{route('ponentes.update', $ponente)}}" method="POST">
        @csrf
        @method('PUT')
        @include('ponente.form', ['modo'=> 'Editar'])
    </form>
@endsection
