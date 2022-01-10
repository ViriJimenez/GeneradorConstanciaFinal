@extends('layouts.app')

@section('content')

    <div class="container">
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" rol = "alert">
                    {{Session::get('mensaje')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h1 class = "text-center">LISTADO DE ESTUDIANTES</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('estudiantes.create')}}">Agregar estudiante<i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
            <table class="table table-light table-striped">
                <thead>
                    <th>ID</th>
                    <th>NÚMERO DE CONTROL</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>CORREO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>EDAD</th>
                    <th>CARRERA</th>
                    <th colspan="2">OPERACIONES</th>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $e)
                        <tr>
                            <td>{{$e->id}}</td>
                            <td>{{$e->numerocontrol}}</td>
                            <td><a href="{{route('estudiantes.show', $e)}}">{{$e->nombre}}</a></td>
                            <td>{{$e->apaterno}}</td>
                            <td>{{$e->amaterno}}</td>
                            <td>{{$e->correo}}</td>
                            <td>{{$e->telefono}}</td>
                            <td>{{$e->direccion}}</td>
                            <td>{{$e->edad}}</td>
                            <td><a href="{{route('carreras.show', $e->carrera)}}">{{$e->carrera->nombre}}</td>
                            <td><a class = "btn btn-warning" href="{{route('estudiantes.edit', $e)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                            <td>
                                <form action="{{route('estudiantes.destroy',$e)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class = "btn btn-danger" type="submit" onclick="return confirm('¿Seguro(a) que desea eliminar el registro?');">
                                        Eliminar <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{$estudiantes->links()}}
    </div>
@endsection
