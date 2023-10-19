@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Agregar Conferencia</h1>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        Captura el Docente
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="rfc" class="rfc">RFC:</label>
                                    <input type="text" class="form-control" name="rfc" id="rfc"
                                        value="{{isset($docente->rfc)?$docente->rfc:old('rfc')}}">
                                    @error('rfc')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="nombre" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="{{isset($docente->nombre)?$docente->nombre:old('nombre')}}">
                                    @error('nombre')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="apaterno" class="form-label" >Apellido paterno</label>
                                    <input type="text" class="form-control" name="apaterno" id="apaterno"
                                        value="{{isset($docente->apaterno)?$docente->apaterno:old('apaterno')}}">
                                    @error('apaterno')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="amaterno" class="form-label">Apellido materno</label>
                                    <input type="text" class="form-control" name="amaterno" id="amaterno"
                                        value="{{isset($docente->amaterno)?$docente->amaterno:old('amaterno')}}">
                                    @error('amaterno')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="correo" class="form-label">Correo electrónico</label>
                                    <input type="text" class="form-control" name="correo" id="correo"
                                            value="{{isset($docente->correo)?$docente->correo:old('correo')}}">
                                    @error('correo')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" id="telefono"
                                            value="{{isset($docente->telefono)?$docente->telefono:old('telefono')}}">
                                    @error('telefono')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for ="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{isset($docente->direccion)?$docente->direccion:old('direccion')}}">
                                    @error('direccion')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                    <label for ="edad" class="form-label">Edad</label>
                                    <input type="text" class="form-control" name="edad" id="edad"
                                            value="{{isset($docente->edad)?$docente->edad:old('edad')}}">
                                    @error('edad')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="departamento_id" class="form-label">Departamento:</label>
                                    <select class="form-control" name="departamento_id">
                                    {{-- @foreach ($departamentos as $d)
                                        <option value="{{$d ->id}}" {{isset($docente->departamento_id)?($docente->departamento_id==$d->id?'selected': ''):''}} >{{$d ->nombre}}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    @if (isset($docente->foto))
                                    <br>
                                        <img class = "img-thumbnail img-fluid" src="{{asset('storage').'/'.$docente->foto}}" alt="{{asset('storage').'/',$docente->foto}}">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto:</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                    @error('foto')
                                        <small style="color:red;">* {{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        Captura el Ponente
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for ="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                                value="{{isset($ponente->nombre)?$ponente->nombre:old('nombre')}}">
                                        @error('nombre')
                                            <small style="color:red;">* {{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for ="clave" class="form-label">Clave:</label>
                                        <input type="text" class="form-control" name="clave" id="clave"
                                                value="{{isset($ponente->clave)?$ponente->clave:old('clave')}}">
                                        @error('clave')
                                            <small style="color:red;">* {{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for ="correo" class="form-label">Correo electrónico</label>
                                        <input type="text" class="form-control" name="correo" id="correo"
                                                value="{{isset($ponente->correo)?$ponente->correo:old('correo')}}">
                                        @error('correo')
                                            <small style="color:red;">* {{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class ="btn btn-success float-right" type="submit">Agregar</button>
                        </form>
                        <br><br>
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>CLAVE</th>
                                <th>CORREO</th>
                            </thead>
                            <tbody id="tblPonentes">
                                {{-- @foreach ($ponentes as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td><a href="{{route('ponentes.show', $p)}}">{{$p->nombre}}</a></td>
                                        <td>{{$p->clave}}</td>
                                        <td>{{$p->correo}}</td>
                                        <td><a class = "btn btn-warning" href="{{route('ponentes.edit', $p)}}">Editar <i class="bi bi-pen-fill"></i></a></td>
                                        <td>
                                            <form action="{{route('ponentes.destroy',$p)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class = "btn btn-danger" type="submit" onclick="return confirm('¿Seguro(a) que desea eliminar el registro?');">
                                                    Eliminar <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
