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
            <h1 class = "text-center">LISTADO DE CONFERENCIAS</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('conferencias.create')}}">Agregar conferencia<i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
            <table class="table table-light table-striped">
                <thead>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>MODALIDAD</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>PONENTE</th>
                    <th>MODERADOR</th>
                    <th colspan="2">OPERACIONES</th>
                </thead>
                <tbody>
                    @foreach ($conferencias as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td><a href="{{route('conferencias.show', $c)}}">{{$c->titulo}}</a></td>
                            <td>{{$c->descripcion}}</td>
                            <td>{{$c->modalidad}}</td>
                            <td>{{$c->fecha}}</td>
                            <td>{{$c->hora}}</td>
                            <td><a href="{{route('ponentes.show', $c->ponente)}}">{{$c->ponente->nombre}}</a></td>
                            <td><a href="{{route('docentes.show', $c->docente)}}">{{$c->docente->nombre}}</a></td>
                            <td><a class = "btn btn-warning" href="{{route('conferencias.edit', $c)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                            <td>
                                <form action="{{route('conferencias.destroy',$c)}}" method="POST">
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
        {{$conferencias->links()}}
    </div>
@endsection
