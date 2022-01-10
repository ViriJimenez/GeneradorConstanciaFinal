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
            <h1 class = "text-center">LISTADO DE INSTRUCTORES</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('instructors.create')}}">Agregar Instructor <i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
            <table class="table table-light table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>CORREO</th>
                    <th>TELEFONO</th>
                    <th>TITULO</th>
                    <th colspan="2">OPERACIONES</th>
                </thead>
                <tbody>
                    @foreach ($instructors as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td><a href="{{route('instructors.show', $i)}}">{{$i->nombre}}</a></td>
                            <td>{{$i->apaterno}}</td>
                            <td>{{$i->amaterno}}</td>
                            <td>{{$i->correo}}</td>
                            <td>{{$i->telefono}}</td>
                            <td>{{$i->titulo}}</td>
                            <td><a class = "btn btn-warning" href="{{route('instructors.edit', $i)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                            <td>
                                <form action="{{route('instructors.destroy',$i)}}" method="POST">
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
        {{$instructors->links()}}
    </div>
@endsection
