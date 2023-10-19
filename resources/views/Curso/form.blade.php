<h1 class="text-center">{{ $modo }} Cursos</h1>
<hr>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Coloca tus datos
                </div>
                <div class="card-body">
                    <label for="titulo" class="form-label">Titulo:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo"
                        value="{{ isset($curso->titulo) ? $curso->titulo : old('titulo') }}">
                    @error('titulo')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                        value="{{ isset($curso->descripcion) ? $curso->descripcion : old('descripcion') }}">
                    @error('descripcion')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="modalidad" class="form-label">Modalidad:</label>
                    <input type="text" class="form-control" name="modalidad" id="modalidad"
                        value="{{ isset($curso->modalidad) ? $curso->modalidad : old('modalidad') }}">
                    @error('modalidad')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha"
                        value="{{ isset($curso->fecha) ? $curso->fecha : old('fecha') }}">
                    @error('fecha')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <label for="hora" class="form-label">Hora:</label>
                    <input type="time" class="form-control" name="hora" id="hora"
                        value="{{ isset($curso->hora) ? $curso->hora : old('hora') }}">
                    @error('hora')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <div class="mb-3">
                        <label for="instructor_id" class="form-label">Instructor encargado:</label>
                        <select class="form-control" name="instructor_id">
                            @foreach ($instructors as $i)
                                <option value="{{ $i->id }}"
                                    {{ isset($curso->instructor_id) ? ($curso->instructor_id == $i->id ? 'selected' : '') : '' }}>
                                    {{ $i->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" name="estado">
                            <option {{ isset($curso->estado) ? ($curso->estado == 1 ? 'selected' : '') : '' }} value="1">Proximamente</option>
                            <option {{ isset($curso->estado) ? ($curso->estado == 2 ? 'selected' : '') : '' }} value="2">En curso</option>
                            <option {{ isset($curso->estado) ? ($curso->estado == 3 ? 'selected' : '') : '' }} value="3">Finalizado</option>
                        </select>
                    </div>
                    <input class="btn btn-success float-left" type="submit" value="{{ $modo }} Registro">
                    <a class="btn btn-secondary float-right" href="{{ route('cursos.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
