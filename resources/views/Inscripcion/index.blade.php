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

        @if (Session::has('mensaje-error'))
            <div class="alert alert-danger alert-dismissible fade show" rol="alert">
                {{ Session::get('mensaje-error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h2 class="text-center font-bold">INSCRIPCIONES</h2>
        <hr>
        <div class="row">
            <div class="col text-right" style="z-index: 999">


                @if (Auth::user()->tipo_usuario == 2 or Auth::user()->tipo_usuario == 1)
                    <a class="btn btn-primary" href="{{ route('inscripcion.docente') }}"><i class="bi bi-plus-circle"></i>
                        Inscribir docente</a>
                @endif

                @if (Auth::user()->tipo_usuario == 3 or Auth::user()->tipo_usuario == 1)
                    <a class="btn btn-primary" href="{{ route('inscripcion.create') }}"><i class="bi bi-plus-circle"></i>
                        Inscribir estudiante</a>
                @endif

                @if (Auth::user()->tipo_usuario == 4 or Auth::user()->tipo_usuario == 1)
                    <a class="btn btn-primary" href="{{ route('inscripcion.publico') }}"><i class="bi bi-plus-circle"></i>
                        Inscribir público</a>
                @endif


            </div>

        </div>
        <br>


        @if (Auth::user()->tipo_usuario == 1)
        @endif
        @if (Auth::user()->tipo_usuario == 2 or Auth::user()->tipo_usuario == 1)
            <div class="table-responsive">
                <h4 class="font-weight-bold">Inscripcion de docentes</h4>
                <table class="table table-striped">
                    <thead>
                        <th>DOCENTE</th>
                        <th>CURSO</th>
                        <th>ESTADO-CURSO</th>
                        <th>NOMBRE EVENTO</th>
                        <th>TIPO DE EVENTO</th>
                        <th>MODALIDAD</th>
                        <th>INSTRUCTOR</th>
                        <th>FECHA DE INSCRIPCION</th>
                        <th class="text-center" colspan="3">OPERACIONES</th>
                    </thead>
                    <tbody>
                        @foreach ($docente as $c)
                            @if (Auth::user()->email == $c->correo or Auth::user()->tipo_usuario == 1)
                                <tr>
                                    <td>{{ $c->nomDocente }}</td>
                                    <td>{{ $c->titulo }}</td>
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
                                    <td>{{ $c->evento }}</td>
                                    <td>{{ $c->tipo }}</td>
                                    <td>{{ $c->modalidad }}</td>
                                    <td>{{ $c->nomInstructor }}</td>
                                    <td>{{ $c->fecha }}</td>
                                    <td><a class="btn btn-success" href="{{ route('inscripcion.showDocente', $c->id) }}"><i
                                                class="bi bi-file-earmark-pdf"></i></a></td>

                                    <td>
                                        <form action="{{ route('inscripcion.destroy', $c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('¿Seguro(a) que desea eliminar el registro?');"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $sql->links() }}

            <br>
            <hr>
        @endif
        @if (Auth::user()->tipo_usuario == 3 or Auth::user()->tipo_usuario == 1)
            <div class="table-responsive">
                <h4 class="font-weight-bold">Inscripcion de estudiantes</h4>
                <table class="table table-striped">
                    <thead>
                        <th>ESTUDIANTE</th>
                        <th>CURSO</th>
                        <th>ESTADO-CURSO</th>
                        <th>NOMBRE EVENTO</th>
                        <th>TIPO DE EVENTO</th>
                        <th>MODALIDAD</th>
                        <th>INSTRUCTOR</th>
                        <th>FECHA DE INSCRIPCION</th>
                        <th class="text-center" colspan="3">OPERACIONES</th>
                    </thead>
                    <tbody>
                        @foreach ($sql as $c)
                            @if (Auth::user()->email == $c->correo or Auth::user()->tipo_usuario == 1)
                                <tr>
                                    <td>{{ $c->nomEstudiante }}</td>
                                    <td>{{ $c->titulo }}</td>
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
                                    <td>{{ $c->evento }}</td>
                                    <td>{{ $c->tipo }}</td>
                                    <td>{{ $c->modalidad }}</td>
                                    <td>{{ $c->nomInstructor }}</td>
                                    <td>{{ $c->fecha }}</td>
                                    <td><a class="btn btn-success" href="{{ route('inscripcion.show', $c->id) }}"><i
                                                class="bi bi-file-earmark-pdf"></i></a></td>

                                    <td>
                                        <form action="{{ route('inscripcion.destroy', $c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('¿Seguro(a) que desea eliminar el registro?');"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $sql->links() }}

            <br>
            <hr>
        @endif
        @if (Auth::user()->tipo_usuario == 4 or Auth::user()->tipo_usuario == 1)
            <div class="table-responsive">
                <h4 class="font-weight-bold">Inscripcion de publico general</h4>
                <table class="table table-striped">
                    <thead>
                        <th>PUBLICO</th>
                        <th>CURSO</th>
                        <th>ESTADO-CURSO</th>
                        <th>NOMBRE EVENTO</th>
                        <th>TIPO DE EVENTO</th>
                        <th>MODALIDAD</th>
                        <th>INSTRUCTOR</th>
                        <th>FECHA DE INSCRIPCION</th>
                        <th class="text-center" colspan="3">OPERACIONES</th>
                    </thead>
                    <tbody>
                        @foreach ($publico as $c)
                            @if (Auth::user()->email == $c->correo or Auth::user()->tipo_usuario == 1)
                                <tr>
                                    <td>{{ $c->nomEstudiante }}</td>
                                    <td>{{ $c->titulo }}</td>
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
                                    <td>{{ $c->evento }}</td>
                                    <td>{{ $c->tipo }}</td>
                                    <td>{{ $c->modalidad }}</td>
                                    <td>{{ $c->nomInstructor }}</td>
                                    <td>{{ $c->fecha }}</td>
                                    <td><a class="btn btn-success" href="{{ route('inscripcion.showPublico', $c->id) }}"><i
                                                class="bi bi-file-earmark-pdf"></i></a></td>

                                    <td>
                                        <form action="{{ route('inscripcion.destroy', $c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('¿Seguro(a) que desea eliminar el registro?');"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $publico->links() }}
        @endif








    </div>
@endsection
