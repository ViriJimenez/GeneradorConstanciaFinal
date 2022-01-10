<h1 class="text-center">{{$modo}} Conferencia</h1>
<hr>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        Coloca los datos
                    </div>
                    <div class="card-body">
                            <label for ="titulo" class="form-label">Titulo:</label>
                            <input type="text" class="form-control" name="titulo" id="titulo"
                                    value="{{isset($conferencia->titulo)?$conferencia->titulo:old('titulo')}}">
                            @error('titulo')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="descripcion" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    value="{{isset($conferencia->descripcion)?$conferencia->descripcion:old('descripcion')}}">
                            @error('descripcion')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="modalidad" class="form-label">Modalidad:</label>
                            <input type="text" class="form-control" name="modalidad" id="modalidad"
                                    value="{{isset($conferencia->modalidad)?$conferencia->modalidad:old('modalidad')}}">
                            @error('modalidad')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="fecha" class="form-label">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                    value="{{isset($conferencia->fecha)?$conferencia->fecha:old('fecha')}}">
                            @error('fecha')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="hora" class="form-label">Hora:</label>
                            <input type="time" class="form-control" name="hora" id="hora"
                                    value="{{isset($conferencia->hora)?$conferencia->hora:old('hora')}}">
                            @error('hora')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <div class="mb-3">
                                <label for="ponente_id" class="form-label">Ponente encargado:</label>
                                <select class="form-control" name="ponente_id">
                                @foreach ($ponentes as $p)
                                    <option value="{{$p ->id}}" {{isset($conferencia->ponente_id)?($conferencia->ponente_id==$p->id?'selected': ''):''}}>{{$p ->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                            <br><br>
                            <div class="mb-3">
                                <label for="docente_id" class="form-label">Moderador encargado:</label>
                                <select class="form-control" name="docente_id">
                                @foreach ($docentes as $d)
                                    <option value="{{$d ->id}}" {{isset($conferencia->docente_id)?($conferencia->docente_id==$d->id?'selected': ''):''}}>{{$d ->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                            <input class ="btn btn-success float-left" type="submit" value= "{{$modo}} Registro">
                            <a class ="btn btn-secondary float-right" href="{{route('conferencias.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
