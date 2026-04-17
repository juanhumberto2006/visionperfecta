@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/productos') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle del producto</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-info">
            <div class="card-header">
                <h3 class="card-title"><b>Datoss registrados</b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">


                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Categoria </label>
                                    <p>{{ $producto->categoria->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Codigo ></label>
                                    <p>{{ $producto->codigo }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre </label>
                                    <p>{{ $producto->nombre }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion </label>
                                    <p>{!! $producto->descripcion !!}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio compra </label>
                                        <p>{{ $producto->precio_compra }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio de venta </label>
                                        <p>{{ $producto->precio_venta }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock minimo </label><br><br>
                                        <p>{{ $producto->stock_minimo }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Stock maximo </label>
                                        <p>{{ $producto->stock_maximo }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Unidad de medida </label>
                                        <p>{{ $producto->unidad_medida }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="estado">Estado </label><br><br>
                                        @if ($producto->estado == '1')
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Inactivo</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imagen">Imagen del producto</label>
                                    @php
                                    $imagenUrl = $producto->imagen;
                                    $isExternal = str_starts_with($imagenUrl, 'http://') || str_starts_with($imagenUrl, 'https://');
                                @endphp
                                <img src="{{ $isExternal ? $imagenUrl : asset('storage/' . $imagenUrl) }}" alt="{{ $producto->nombre }}" width="100%" height="auto" class="img-thumbnail" onerror="this.src='{{ asset('img/no-image.png') }}'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-4 px-3 py-3">
                        <a class="btn btn-secondary" href="{{ url('/admin/productos') }}" role="button">Regresar</a>

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
