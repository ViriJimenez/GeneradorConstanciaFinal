@extends('layouts.app')

@section('content')

    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" rol="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2 class="text-center font-bold">CURSOS</h2>
        <hr>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary float-right" href="{{ route('cursos.create') }}"><i class="bi bi-plus-circle"></i>
                    Agregar curso</a>
            </div>
            {{-- <div class="col">
                    <a class="btn btn-info float-right" href="{{route('descargar-pdf')}}">Generar Constancia<i class="bi bi-plus-square-fill"></i></a>
                </div> --}}
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    {{-- <th class=" bg-blue-900 text-white border px-2 py-0">ID</th> --}}
                    <th>TITULO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>MODALIDAD</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>INSTRUCTOR</th>
                    <th>Estado</th>
                    <th class="text-center" colspan="3">OPERACIONES</th>
                </thead>
                <tbody>
                    @foreach ($cursos as $c)
                        <tr>
                            {{-- <td>{{$c->id}}</td> --}}
                            <td><a href="{{ route('cursos.show', $c) }}">{{ $c->titulo }}</a></td>
                            <td>{{ $c->descripcion }}</td>
                            <td>{{ $c->modalidad }}</td>
                            <td>{{ $c->fecha }}</td>
                            <td>{{ $c->hora }}</td>
                            <td><a href="{{ route('instructors.show', $c->instructor) }}">{{ $c->instructor->nombre }}</a>
                            </td>
                            <td>
                                @if ($c->estado == 1)
                                    <a class="btn btn-warning">PROXIMAMENTE</a>
                                @else
                                    @if ($c->estado == 2)
                                        <a class="btn btn-success">EN CURSO</a>
                                    @else
                                        @if ($c->estado == 3)
                                            <a class="btn btn-danger">FINALIZADO</a>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            
                            <td><a class="btn btn-warning" href="{{ route('cursos.edit', $c) }}"><i
                                        class="bi bi-pen-fill"></i></a></td>
                            <td>
                                <form action="{{ route('cursos.destroy', $c) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('¿Seguro(a) que desea eliminar el registro?');"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $cursos->links() }}
    </div>
@endsection
