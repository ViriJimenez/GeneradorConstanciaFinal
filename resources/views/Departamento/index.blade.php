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
            <h1 class = "text-center">LISTADO DE DEPARTAMENTOS</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('departamentos.create')}}">Agregar departamento <i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
            <table class="table table-light table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th colspan="2">OPERACIONES</th>
                </thead>

                <tbody>
                    @foreach ($departamentos as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td><a href="{{route('departamentos.show', $d)}}">{{$d->nombre}}</a></td>
                        <td>{{$d->descripcion}}</a></td>
                        <td><a class = "btn btn-warning" href="{{route('departamentos.edit', $d)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                        <td>
                            <form action="{{route('departamentos.destroy',$d)}}" method="POST">
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
            {{$departamentos->links()}}
    </div>
@endsection
