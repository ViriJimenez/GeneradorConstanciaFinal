<h1 class="text-center">{{ $modo }} Estudiante</h1>
<hr>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Coloca tus datos
                </div>
                <div class="card-body">
                    <label for="numerocontrol" class="numerocontrol">NÚMERO DE CONTROL:</label>
                    <input type="text" class="form-control" name="numerocontrol" id="numerocontrol"
                        value="{{ isset($estudiante->numerocontrol) ? $estudiante->numerocontrol : old('numerocontrol') }}">
                    @error('numerocontrol')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ isset($estudiante->nombre) ? $estudiante->nombre : old('nombre') }}">
                    @error('nombre')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="apaterno" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" name="apaterno" id="apaterno"
                        value="{{ isset($estudiante->apaterno) ? $estudiante->apaterno : old('apaterno') }}">
                    @error('apaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="amaterno" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" name="amaterno" id="amaterno"
                        value="{{ isset($estudiante->amaterno) ? $estudiante->amaterno : old('amaterno') }}">
                    @error('amaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo"
                        value="{{ isset($estudiante->correo) ? $estudiante->correo : old('correo') }}">

                    <input type="hidden" class="form-control" name="correo2"
                        value="{{ isset($estudiante->correo) ? $estudiante->correo : '' }}">


                    @error('correo')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>

                    @if (Request::is('estudiantes/create'))
                        <label for="password" class="form-label">Contraseña de de inicio de sesion</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        @error('password')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                        <br><br>
                    @endif



                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="{{ isset($estudiante->telefono) ? $estudiante->telefono : old('telefono') }}">
                    @error('telefono')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ isset($estudiante->direccion) ? $estudiante->direccion : old('direccion') }}">
                    @error('direccion')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad"
                        value="{{ isset($estudiante->edad) ? $estudiante->edad : old('edad') }}">
                    @error('edad')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <div class="mb-3">
                        <label for="carrera_id" class="form-label">Carrera:</label>
                        <select class="form-control" name="carrera_id">
                            @foreach ($carreras as $c)
                                <option value="{{ $c->id }}"
                                    {{ isset($estudiante->carrera_id) ? ($estudiante->carrera_id == $c->id ? 'selected' : '') : '' }}>
                                    {{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input class="btn btn-success float-left" type="submit" value="{{ $modo }} Registro">
                    <a class="btn btn-secondary float-right" href="{{ route('estudiantes.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
