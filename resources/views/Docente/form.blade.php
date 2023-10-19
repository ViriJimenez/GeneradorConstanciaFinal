<h1 class="text-center">{{ $modo }} Docente</h1>
<hr>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Coloca los datos
                </div>
                <div class="card-body">
                    <label for="rfc" class="rfc">RFC:</label>
                    <input type="text" class="form-control" name="rfc" id="rfc"
                        value="{{ isset($docente->rfc) ? $docente->rfc : old('rfc') }}">
                    @error('rfc')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ isset($docente->nombre) ? $docente->nombre : old('nombre') }}">
                    @error('nombre')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="apaterno" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" name="apaterno" id="apaterno"
                        value="{{ isset($docente->apaterno) ? $docente->apaterno : old('apaterno') }}">
                    @error('apaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="amaterno" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" name="amaterno" id="amaterno"
                        value="{{ isset($docente->amaterno) ? $docente->amaterno : old('amaterno') }}">
                    @error('amaterno')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo"
                        value="{{ isset($docente->correo) ? $docente->correo : old('correo') }}">

                    <input type="hidden" class="form-control" name="correo2"
                        value="{{ isset($docente->correo) ? $docente->correo : '' }}">

                    @error('correo')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>

                    @if (Request::is('docentes/create'))
                        <label for="password" class="form-label">Contraseña de de inicio de sesion</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        @error('password')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                        <br><br>
                    @endif

                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="{{ isset($docente->telefono) ? $docente->telefono : old('telefono') }}">
                    @error('telefono')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion"
                        value="{{ isset($docente->direccion) ? $docente->direccion : old('direccion') }}">
                    @error('direccion')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad"
                        value="{{ isset($docente->edad) ? $docente->edad : old('edad') }}">
                    @error('edad')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <div class="mb-3">
                        <label for="departamento_id" class="form-label">Departamento:</label>
                        <select class="form-control" name="departamento_id">
                            @foreach ($departamentos as $d)
                                <option value="{{ $d->id }}"
                                    {{ isset($docente->departamento_id) ? ($docente->departamento_id == $d->id ? 'selected' : '') : '' }}>
                                    {{ $d->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        @if (isset($docente->foto))
                            <br>
                            <img class="img-thumbnail img-fluid" style="width: 130px" src="{{asset('storage').'/'. $docente->foto }}"
                                alt="Sin foto">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto:</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                        @error('foto')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                    </div>
                    <input class="btn btn-success float-left" type="submit" value="{{ $modo }} Registro">
                    <a class="btn btn-secondary float-right" href="{{ route('docentes.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
