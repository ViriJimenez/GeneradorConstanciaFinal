@extends('layouts.app')

@section('content')
    <form action="{{route('instructors.update', $instructor)}}" method="POST">
        @csrf
        @method('PUT')
        @include('instructor.form', ['modo'=> 'Editar'])
    </form>
@endsection
