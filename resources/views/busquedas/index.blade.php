@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 500px">
        <div class="alert alert-success text-center">BÚSQUEDA DE CERTIFICADOS</div>
        @if (Session::has('mensaje-error'))
            <div class="alert alert-danger alert-dismissible fade show" rol="alert">
                {{ Session::get('mensaje-error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('busqueda.search') }}" class="form" method="GET">
            @method('GET')
            <p class="title">Ingrese su Numero de control / RFC / CURP</p>
            <input id="dni" required type="text" name="numero" placeholder="Ingrese el numero">
            <select required name="tipo">
                <option value="">Seleccionar...</option>
                <option value="docente">Docente</option>
                <option value="estudiante">Estudiante</option>
                <option value="publico">Publico</option>
            </select>
            <div class="group__button">
                <button id="entrada" class="entrada"><i class="fa-solid fa-magnifying-glass"></i>
                    Buscar Certificado</button>
            </div>
        </form>

    </div>
@endsection
