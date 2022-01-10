@extends('layouts.app')

@section('content')
    <form action="{{route('ponentes.store')}}" method="POST">
        @csrf
        @include('ponente.form', ['modo'=> 'Agregar'])
    </form>
@endsection
