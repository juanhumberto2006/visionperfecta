@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compra N° {{ $compra->id }}</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-info">
            <div class="card-header">
                <h3 class="card-title"><b>Paso 1 | Compra Registrada</b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">


                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="proveedor_id">Proveedores</label>

                            <p>{{ $compra->proveedor->nombre }}</p>
                        </div>
                    </div>

                    <!-------------------------------------------------------->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <p>{{ $compra->fecha }}</p>
                        </div>
                    </div>


                    <!-------------------------------------------------------->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <p>{{ $compra->observaciones }}</p>
                        </div>
                    </div>

                    <!-------------------------------------------------------->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha">Estado de la compra</label>
                            <p>{{ $compra->estado }}</p>
                        </div>
                    </div>
                    <!-------------------------------------------------------->

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha">Total de la compra</label>
                            <p>{{ $compra->total }}</p> 
                        </div>
                    </div>




                </div>


                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>





    <!--  -->

    <div class="col-md-12">
        <div class="card  card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Paso  | Agregar Productos</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <livewire:counter />
                </div>


                <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>



    @stop

    @section('css')
        @livewireStyles
    @stop

    @section('js')
        @livewireScripts
    @stop
