<h1 class="text-center">{{$modo}} Instructor</h1>
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
                                    value="{{isset($instructor->nombre)?$instructor->nombre:old('nombre')}}">
                            @error('nombre')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="apaterno" class="form-label" >Apellido paterno</label>
                            <input type="text" class="form-control" name="apaterno" id="apaterno"
                                    value="{{isset($instructor->apaterno)?$instructor->apaterno:old('apaterno')}}">
                            @error('apaterno')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="amaterno" class="form-label">Apellido materno</label>
                            <input type="text" class="form-control" name="amaterno" id="amaterno"
                                    value="{{isset($instructor->amaterno)?$instructor->amaterno:old('amaterno')}}">
                            @error('amaterno')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="correo" class="form-label">Correo electrónico</label>
                            <input type="text" class="form-control" name="correo" id="correo"
                                    value="{{isset($instructor->correo)?$instructor->correo:old('correo')}}">
                            @error('correo')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono"
                                    value="{{isset($instructor->telefono)?$instructor->telefono:old('telefono')}}">
                            @error('telefono')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <label for ="titulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo"
                                    value="{{isset($instructor->titulo)?$instructor->titulo:old('titulo')}}">
                            @error('titulo')
                                <small style="color:red;">* {{$message}}</small>
                            @enderror
                            <br><br>
                            <input class ="btn btn-success float-left" type="submit" value= "{{$modo}} Registro">
                            <a class ="btn btn-secondary float-right" href="{{route('instructors.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
