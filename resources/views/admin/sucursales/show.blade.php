@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/sucursales') }}">Sucursales</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos de la  sucursal</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-info">
            <div class="card-header">
                <h3 class="card-title"><b>Datos registrados </b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la sucursal </label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <input type="text" value="{{ $sucursal->nombre }}" class="form-control" id="nombre" name="nombre"
                                        placeholder="Ingrese el nombre de la sucursal" readonly>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="direccion">Direccion </label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input type="text" value="{{ $sucursal->direccion }}" class="form-control" id="direccion" name="direccion"
                                        placeholder="Ingrese la direccion de la sucursal" readonly>
                                </div>
                                @error('direccion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="telefono">Telefono </label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" value="{{ $sucursal->telefono }}" class="form-control" id="telefono" name="telefono"
                                        placeholder="Ingrese el telefono de la sucursal" readonly>
                                </div>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="estado">Estado </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                    </div>
                                    <select class="form-control" id="activa" name="activa" disabled>
                                        <option value="">Seleccione un estado</option>
                                        <option value="1" {{ $sucursal->activa == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ $sucursal->activa == 0 ? 'selected' : '' }}>Inactivo</option>
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
                                    role="button">Regresar</a>
                               
                            </div>
                        </div>
                    </div>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @stop

    @section('css')

    @stop

    @section('js')

        

    @stop
