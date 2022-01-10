@extends('layouts.app')

@section('content')
    <form action="{{route('instructors.store')}}" method="POST">
        @csrf
        @include('instructor.form', ['modo'=> 'Agregar'])
    </form>
@endsection
