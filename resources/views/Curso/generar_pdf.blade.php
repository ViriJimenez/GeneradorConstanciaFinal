{{-- @extends('layouts.app')

@section('content')

    <div class="container">
            <h2 class = "text-center font-bold">CURSOS</h2>
            <hr>
            <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>TITULO</th>
                            <th>DESCRIPCIÓN</th>
                            <th>MODALIDAD</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>INSTRUCTOR</th>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$curso->titulo}}</td>
                                    <td>{{$curso->descripcion}}</td>
                                    <td>{{$curso->modalidad}}</td>
                                    <td>{{$curso->fecha}}</td>
                                    <td>{{$curso->hora}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
    </div>
@endsection --}}
<html>
    @foreach ($cursos as $c)
        <h5>{{$c->titulo}} </h5>
        <h5>{{$c->descripcion}} </h5>
        <h5>{{$c->modalidad}} </h5>
        <h5>{{$c->fecha}} </h5>
        <h5>{{$c->hora}} </h5>
        <hr><hr>
    @endforeach
</html>
