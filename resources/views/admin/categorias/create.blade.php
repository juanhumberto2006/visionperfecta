@extends('adminlte::page')



@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registrar categoria</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card  card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Registrar categoria</b></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ url('/admin/categorias/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la categoria <b style="color: red">(*)</b></label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('nombre') }}" class="form-control" id="nombre" name="nombre"
                                        placeholder="Ingrese el nombre de la categoria" required>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion de la categoria <b>(Opcional)</b></label>
                                <textarea class="form-control"  name="descripcion" id="descripcion" rows="3"
                                    placeholder="Ingrese una breve descripcion de la categoria">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a class="btn btn-secondary" href="{{ url('/admin/categorias') }}"
                                    class="btn btn-danger">cancelar</a>
                                <button type="submit" class="btn btn-primary ">Registrar</button>
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
