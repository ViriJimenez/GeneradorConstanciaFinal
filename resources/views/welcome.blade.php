@extends('layouts/layoutWelcome')
@section('contenido')
    {{-- mostrar un h1 solo si la sesion esta iniciada y si no otro mensaje --}}
    @if (auth()->check())
        <div class="container">
            <div class="alert alert-success text-center">BÚSQUEDA DE CERTIFICADOS</div>
            @if (Session::has('mensaje-error'))
                <div class="alert alert-danger alert-dismissible fade show" rol="alert">
                    {{ Session::get('mensaje-error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('busqueda.search') }}" class="form" method="GET">
                @method('GET')
                <p class="title">Ingrese su Numero de control / RFC / CURP</p>
                <input id="dni" required type="text" name="numero" placeholder="Ingrese el numero">
                <select required name="tipo">
                    <option value="">Seleccionar...</option>
                    <option value="docente">Docente</option>
                    <option value="estudiante">Estudiante</option>
                    <option value="publico">Publico</option>
                </select>
                <div class="group__button">
                    <button id="entrada" class="entrada"><i class="fa-solid fa-magnifying-glass"></i>
                        Buscar Certificado</button>
                </div>
            </form>

        </div>
    @endif

    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" rol="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <br>
    <br>

    <details id="details">
        <summary class="bg-primary text-center p-3 text-white hidden">REGISTRATE AQUI</summary>
        <form action="{{ route('publicos.registro') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    Coloca tus datos
                </div>
                <div class="card-body">
                    <label for="curp" class="form-label">Curp:</label>
                    <input type="text" class="form-control" name="curp" id="curp" value="{{ old('curp') }}">
                    @error('curp')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="apaterno" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" name="apaterno" id="apaterno" value="{{ old('apaterno') }}">
                    @error('apaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="amaterno" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" name="amaterno" id="amaterno"
                        value="{{ old('amaterno') }}">
                    @error('amaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}">

                    @error('correo')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>


                    <label for="password" class="form-label">Contraseña de de inicio de sesion</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    @error('password')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>


                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="{{ old('telefono') }}">
                    @error('telefono')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ old('direccion') }}">
                    @error('direccion')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad"
                        value="{{ old('edad') }}">
                    @error('edad')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <input class="btn btn-success float-left" type="submit" value="Registro">
                </div>
            </div>
        </form>
    </details>
@endsection
