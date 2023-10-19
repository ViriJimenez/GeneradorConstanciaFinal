<h1 class="text-center">{{ $modo }} Evento</h1>
<hr>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Coloca tus datos
                </div>
                <div class="card-body">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ isset($evento->nombre) ? $evento->nombre : old('nombre') }}">
                    @error('nombre')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de evento:</label>
                        <select class="form-control" name="tipo">
                            <option value="">seleccionar...</option>
                            <option {{ isset($evento->tipo) ? ($evento->tipo == 'curso' ? 'selected' : '') : '' }}
                                value="curso">Curso</option>
                            <option
                                {{ isset($evento->tipo) ? ($evento->tipo == 'conferencia' ? 'selected' : '') : '' }}
                                value="conferencia">Conferencia</option>
                        </select>
                    </div>
                    <br><br>
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                        value="{{ isset($evento->descripcion) ? $evento->descripcion : old('descripcion') }}">
                    @error('descripcion')
                        <small style="color:red;">* {{ $message }}</small>
                    @enderror
                    <br><br>
                    <input class="btn btn-success float-left" type="submit" value="{{ $modo }} Registro">
                    <a class="btn btn-secondary float-right" href="{{ route('eventos.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
