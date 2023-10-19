<h1 class="text-center">{{ $modo }} Publico general</h1>
<hr>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Coloca tus datos
                </div>
                <div class="card-body">
                    <label for="curp" class="form-label">Curp:</label>
                    <input type="text" class="form-control" name="curp" id="curp"
                        value="{{ isset($publico->curp) ? $publico->curp : old('curp') }}">
                    @error('curp')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ isset($publico->nombre) ? $publico->nombre : old('nombre') }}">
                    @error('nombre')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="apaterno" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" name="apaterno" id="apaterno"
                        value="{{ isset($publico->apaterno) ? $publico->apaterno : old('apaterno') }}">
                    @error('apaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="amaterno" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" name="amaterno" id="amaterno"
                        value="{{ isset($publico->amaterno) ? $publico->amaterno : old('amaterno') }}">
                    @error('amaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo"
                        value="{{ isset($publico->correo) ? $publico->correo : old('correo') }}">

                    <input type="hidden" class="form-control" name="correo2"
                        value="{{ isset($publico->correo) ? $publico->correo : '' }}">


                    @error('correo')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>


                    @if (Request::is('publicos/create'))
                        <label for="password" class="form-label">Contraseña de de inicio de sesion</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        @error('password')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                        <br><br>
                    @endif


                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="{{ isset($publico->telefono) ? $publico->telefono : old('telefono') }}">
                    @error('telefono')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ isset($publico->direccion) ? $publico->direccion : old('direccion') }}">
                    @error('direccion')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad"
                        value="{{ isset($publico->edad) ? $publico->edad : old('edad') }}">
                    @error('edad')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <input class="btn btn-success float-left" type="submit" value="{{ $modo }} Registro">
                    <a class="btn btn-secondary float-right" href="{{ route('publicos.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
