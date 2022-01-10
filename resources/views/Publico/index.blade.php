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
            <h1 class = "text-center">LISTADO DE PÚBLICO GENERAL</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('publicos.create')}}">Agregar publico general <i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
            <table class="table table-light table-striped">
                <thead>
                    <th>ID</th>
                    <th>CURP</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>CORREO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>EDAD</th>
                    <th colspan="2">OPERACIONES</th>
                </thead>
                <tbody>
                    @foreach ($publicos as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->curp}}</td>
                            <td><a href="{{route('publicos.show', $p)}}">{{$p->nombre}}</a></td>
                            <td>{{$p->apaterno}}</td>
                            <td>{{$p->amaterno}}</td>
                            <td>{{$p->correo}}</td>
                            <td>{{$p->telefono}}</td>
                            <td>{{$p->direccion}}</td>
                            <td>{{$p->edad}}</td>
                            <td><a class = "btn btn-warning" href="{{route('publicos.edit', $p)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                            <td>
                                <form action="{{route('publicos.destroy',$p)}}" method="POST">
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
        {{$publicos->links()}}
    </div>
@endsection

