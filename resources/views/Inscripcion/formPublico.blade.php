<span hidden>{{ date_default_timezone_set('America/Mexico_City') }}</span>
<h1 class="text-center">{{ $modo }} Inscripcion</h1>
<hr>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Coloca tus datos
                </div>
                <div class="card-body">

                    <input name="fecha" type="hidden" value="{{ date('Y-m-d H:i:s') }}">

                    <div class="mb-3">
                        <label for="curso_id" class="form-label">Curso:</label>
                        <select class="form-control" name="curso_id" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($cursos as $i)
                                <option value="{{ $i->id }}"
                                    {{ isset($inscripcion->curso_id) ? ($inscripcion->curso_id == $i->id ? 'selected' : '') : '' }}>
                                    {{ $i->titulo . ' - ' . $i->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('curso_id')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="publico_id" class="form-label">Publico:</label>
                        <select class="form-control" name="publico_id" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($estudiantes as $i)
                                @if (Auth::user()->email == $i->correo or Auth::user()->tipo_usuario==1)
                                    <option value="{{ $i->id }}"
                                        {{ isset($inscripcion->publico_id) ? ($inscripcion->publico_id == $i->id ? 'selected' : '') : '' }}>
                                        {{ $i->nombre . ' ' . $i->apaterno . ' ' . $i->amaterno }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('publico_id')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="evento_id" class="form-label">Evento:</label>
                        <select class="form-control" name="evento_id" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($eventos as $i)
                                <option value="{{ $i->id }}"
                                    {{ isset($inscripcion->estudiante_id) ? ($inscripcion->estudiante_id == $i->id ? 'selected' : '') : '' }}>
                                    {{ $i->nombre . ' - ' . $i->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('evento_id')
                            <small style="color:red;">* {{ $message }}</small>
                        @enderror
                    </div>


                    <input class="btn btn-success float-left" type="submit" value="{{ $modo }} Registro">
                    <a class="btn btn-secondary float-right" href="{{ route('inscripcion.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
