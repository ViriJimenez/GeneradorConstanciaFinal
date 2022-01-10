<h1 class="text-center">{{$modo}} Ponente</h1>
<hr>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        Coloca tus datos
                    </div>
                    <div class="card-body">
                            <label for ="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{isset($ponente->nombre)?$ponente->nombre:old('nombre')}}">
                            @error('nombre')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="clave" class="form-label">Clave:</label>
                            <input type="text" class="form-control" name="clave" id="clave"
                                    value="{{isset($ponente->clave)?$ponente->clave:old('clave')}}">
                            @error('clave')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="correo" class="form-label">Correo electrónico</label>
                            <input type="text" class="form-control" name="correo" id="correo"
                                    value="{{isset($ponente->correo)?$ponente->correo:old('correo')}}">
                            @error('correo')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <input class ="btn btn-success float-left" type="submit" value= "{{$modo}} Registro">
                            <a class ="btn btn-secondary float-right" href="{{route('ponentes.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
