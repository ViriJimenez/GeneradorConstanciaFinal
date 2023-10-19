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
            <h1 class = "text-center font-bold">LISTADO DE EVENTOS</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('eventos.create')}}">Agregar evento <i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
            <table class="table table-light table-striped">
                <thead>
                    <th class=" bg-blue-900 text-white border px-2 py-0">ID</th>
                    <th class=" bg-blue-900 text-white border px-2 py-0">TIPO DE EVENTO</th>
                    <th class=" bg-blue-900 text-white border px-2 py-0">NOMBRE</th>
                    <th class=" bg-blue-900 text-white border px-2 py-0">DESCRIPCION</th>
                    <th class=" bg-blue-900 text-white border px-2 py-0"colspan="2">OPERACIONES</th>
                </thead>

                <tbody>
                    @foreach ($eventos as $e)
                    <tr>
                        <td>{{$e->id}}</td>
                        <td>{{$e->tipo}}</td>
                        <td><a href="{{route('eventos.show', $e)}}">{{$e->nombre}}</a></td>
                        <td>{{$e->descripcion}}</a></td>
                        <td><a class = "btn btn-warning" href="{{route('eventos.edit', $e)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                        <td>
                            <form action="{{route('eventos.destroy',$e)}}" method="POST">
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
            {{$eventos->links()}}
    </div>
@endsection
