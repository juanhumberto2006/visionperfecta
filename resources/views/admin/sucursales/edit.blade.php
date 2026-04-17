@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/sucursales') }}">Sucursales</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar sucursal</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-success">
            <div class="card-header">
                <h3 class="card-title"><b>Editar datos de la  sucursal</b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ url('/admin/sucursales/' . $sucursal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la sucursal <b style="color: red">(*)</b></label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('nombre', $sucursal->nombre) }}" class="form-control" id="nombre" name="nombre"
                                        placeholder="Ingrese el nombre de la sucursal" required>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="direccion">Direccion <b style="color: red">(*)</b></label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('direccion', $sucursal->direccion) }}" class="form-control" id="direccion" name="direccion"
                                        placeholder="Ingrese la direccion de la sucursal" required>
                                </div>
                                @error('direccion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="telefono">Telefono <b style="color: red">(*)</b></label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('telefono', $sucursal->telefono) }}" class="form-control" id="telefono" name="telefono"
                                        placeholder="Ingrese el telefono de la sucursal" required>
                                </div>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="estado">Estado <b style="color: red">(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                    </div>
                                    <select class="form-control" id="activa" name="activa" required>
                                        <option value="">Seleccione un estado</option>
                                        <option value="1" {{ old('activa', $sucursal->activa) == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ old('activa', $sucursal->activa) == 0 ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </div>
                                @error('activa')    
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a class="btn btn-secondary" href="{{ url('/admin/sucursales') }}"
                                    role="button">cancelar</a>
                                <button type="submit" class="btn btn-success ">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @stop

    @section('css')

    @stop

    @section('js')

        

    @stop
