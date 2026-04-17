@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registrar compra</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-primary">
            <div class="card-header">
                <h3 class="card-title"><b> Paso 1  | Registrar una compra</b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ url('/admin/compras/create') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="proveedor_id">Proveedores <b style="color: red">(*)</b></label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    </div>
                                    <select name="proveedor_id" id="" class="form-control" required>
                                        <option value="">Seleccione un proveedor...</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}"
                                                {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                                {{ $proveedor->nombre . ' | ' . $proveedor->empresa }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-------------------------------------------------------->
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha">Fecha <b style="color: red">(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    </div>
                                    <input type="date" name="fecha" id="" class="form-control" 
                                     value="{{ date('fecha') }}" required>

                                </div>
                                @error('fecha')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <!-------------------------------------------------------->
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    </div>
                                    <textarea name="observaciones" id="" class="form-control" 
                                     required></textarea>

                                </div>
                                @error('observaciones')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>




                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-4 px-3 py-3">
                                <a class="btn btn-secondary" href="{{ url('/admin/compras') }}"
                                    role="button">Cancelar</a>
                                <button type="submit" class="btn btn-primary ">Registrar compra y añadir productos</button>
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
