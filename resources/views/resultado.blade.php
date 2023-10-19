@extends('layouts/app')
<style>
    /* Estilos para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Estilos para los enlaces */
    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
@section('content')
    <div class="container">
        <div class="alert alert-success text-center">RESULTADOS</div>
        @if (Session::has('mensaje-error'))
            <div class="alert alert-danger alert-dismissible fade show" rol="alert">
                {{ Session::get('mensaje-error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table>
            <thead>
                <th>ID</th>
                <th>Curso</th>
                <th>Certificado</th>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->titulo }}</td>
                        <td><a class="btn btn-lg btn-danger" href="{{ route('busqueda.show', [$item->id, $modelo]) }}"><i
                                    class="fas fa-file-pdf"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
