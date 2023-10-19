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
            <h1 class = "text-center font-bold">LISTADO DE CONFERENCIAS</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('conferencias.create')}}">Agregar conferencia<i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
                <div class="table-responsive">
                    <table class="table-striped bg-gray-200 text-black">
                        <thead>
                            <th class=" bg-blue-900 text-white border px-2 py-0">ID</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">TITULO</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">DESCRIPCIÓN</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">MODALIDAD</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">FECHA</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">HORA</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">PONENTE</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0">MODERADOR</th>
                            <th class=" bg-blue-900 text-white border px-2 py-0" colspan="2">OPERACIONES</th>
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
                </div>
        {{$conferencias->links()}}
    </div>
@endsection
