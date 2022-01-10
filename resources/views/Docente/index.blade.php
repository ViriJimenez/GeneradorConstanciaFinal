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
            <h1 class = "text-center">LISTADO DE DOCENTES</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{route('docentes.create')}}">Agregar docente  <i class="bi bi-plus-square-fill"></i></a>
                </div>
            </div>
            <br><br>
                <div class="table-responsive">
                <table class= "table-striped bg-gray-200 text-black">
                    <thead>
                        <th class=" bg-blue-900 text-white border px-2 py-0">ID</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">RFC</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">NOMBRE</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">APELLIDO PATERNO</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">APELLIDO MATERNO</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">CORREO</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">TELEFONO</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">DIRECCION</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">EDAD</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">DEPARTAMENTO</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0">FOTO</th>
                        <th class=" bg-blue-900 text-white border px-2 py-0" colspan="2">OPERACIONES</th>
                    </thead>
                    <tbody>
                        @foreach ($docentes as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->rfc}}</td>
                            <td><a href="{{route('docentes.show', $d)}}">{{$d->nombre}}</a></td>
                            <td>{{$d->apaterno}}</td>
                            <td>{{$d->amaterno}}</td>
                            <td>{{$d->correo}}</td>
                            <td>{{$d->telefono}}</td>
                            <td>{{$d->direccion}}</td>
                            <td>{{$d->edad}}</td>
                            <td><a href="{{route('departamentos.show', $d->departamento)}}">{{$d->departamento->nombre}}</td>
                            <td><img class= "img-thumbnail img-fluid" style="width: 150px;" src="{{asset('storage').'/'.$d->foto}}" alt="{{asset('storage').'/',$d->foto}}"></td>
                            <td><a class = "btn btn-warning" href="{{route('docentes.edit', $d)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                            <td>
                                <form action="{{route('docentes.destroy',$d)}}" method="POST">
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
                </div>
                </table>
        {{$docentes->links()}}
    </div>
@endsection

