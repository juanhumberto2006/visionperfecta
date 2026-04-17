@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/proveedores') }}">Proveedores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de proveedores</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Proveedores registrados</b></h3>

                <div class="card-tools">

                    <!-- Button trigger modal  VISTA PARA CREAR PROVEEDOR-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                        <i class="fas fa-plus"></i> Registrar proveedor
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #1a17b8; color:white;">
                                    <h5 class="modal-title" id="exampleModalLabel">Crear proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/admin/proveedor/create') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="empresa">Empresa <b style="color: red">(*)</b></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-building"></i></span>
                                                        </div>
                                                        <input type="text" value="{{ old('empresa') }}"
                                                            class="form-control" id="empresa" name="empresa"
                                                            placeholder="Ingrese el nombre de la empresa..." required>
                                                    </div>
                                                    @error('empresa')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="direccion">Direccion <b style="color: red">(*)</b></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input type="text" value="{{ old('direccion') }}"
                                                            class="form-control" id="direccion" name="direccion"
                                                            placeholder="Ingrese la dirección..." required>
                                                    </div>
                                                    @error('direccion')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre <b style="color: red">(*)</b></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-user"></i></span>
                                                        </div>
                                                        <input type="text" value="{{ old('nombre') }}"
                                                            class="form-control" id="nombre" name="nombre"
                                                            placeholder="Ingrese el nombre..." required>
                                                    </div>
                                                    @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="telefono">Telefono <b style="color: red">(*)</b></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" value="{{ old('telefono') }}"
                                                            class="form-control" id="telefono" name="telefono"
                                                            placeholder="Ingrese el telefono..." required>
                                                    </div>
                                                    @error('telefono')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email <b style="color: red">(*)</b></label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-envelope"></i></span>
                                                        </div>
                                                        <input type="text" value="{{ old('email') }}"
                                                            class="form-control" id="email" name="email"
                                                            placeholder="Ingrese el email..." required>
                                                    </div>
                                                    @error('email')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Registrar </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Empresa</th>
                                <th>Dirección</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedors as $proveedor)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $proveedor->empresa }}</td>
                                    <td>{{ $proveedor->direccion }}</td>
                                    <td>{{ $proveedor->nombre }}</td>
                                    <td>{{ $proveedor->telefono }}</td>
                                    <td>{{ $proveedor->email }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">




                                            <!-- Button trigger modal  VISTA PARA VER PROVEEDOR-->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#ModalShow{{ $proveedor->id }}">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="ModalShow{{ $proveedor->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background-color: #177db8; color:white;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Datos del
                                                                proveedor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="empresa">Empresa </label>
                                                                        <p>{{ $proveedor->empresa }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="direccion">Direccion </label>
                                                                        <p>{{ $proveedor->direccion }}</p>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="nombre">Nombre </label>
                                                                        <p>{{ $proveedor->nombre }}</p>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="telefono">Telefono </label>
                                                                        <p>{{ $proveedor->telefono }}</p>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="email">Email </label>
                                                                        <p>{{ $proveedor->email }}</p>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <!-------------------------------MODAL DE ACTUALIZACION---------------------------------------------------------------------------------------------------->

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#ModalEdit{{ $proveedor->id }}">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="ModalEdit{{ $proveedor->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background-color: #069144; color:white;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar
                                                                proveedor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/proveedor/' . $proveedor->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="empresa">Empresa <b
                                                                                    style="color: red">(*)</b></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-building"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('empresa', $proveedor->empresa) }}"
                                                                                    class="form-control" id="empresa"
                                                                                    name="empresa"
                                                                                    placeholder="Ingrese el nombre de la empresa..."
                                                                                    required>
                                                                            </div>
                                                                            @error('empresa')
                                                                                <small
                                                                                    style="color: red">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="direccion">Direccion <b
                                                                                    style="color: red">(*)</b></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-map-marker-alt"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('direccion', $proveedor->direccion) }}"
                                                                                    class="form-control" id="direccion"
                                                                                    name="direccion"
                                                                                    placeholder="Ingrese la dirección..."
                                                                                    required>
                                                                            </div>
                                                                            @error('direccion')
                                                                                <small
                                                                                    style="color: red">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="nombre">Nombre <b
                                                                                    style="color: red">(*)</b></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-user"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('nombre', $proveedor->nombre) }}"
                                                                                    class="form-control" id="nombre"
                                                                                    name="nombre"
                                                                                    placeholder="Ingrese el nombre..."
                                                                                    required>
                                                                            </div>
                                                                            @error('nombre')
                                                                                <small
                                                                                    style="color: red">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="telefono">Telefono <b
                                                                                    style="color: red">(*)</b></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-phone"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('telefono', $proveedor->telefono) }}"
                                                                                    class="form-control" id="telefono"
                                                                                    name="telefono"
                                                                                    placeholder="Ingrese el telefono..."
                                                                                    required>
                                                                            </div>
                                                                            @error('telefono')
                                                                                <small
                                                                                    style="color: red">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="email">Email <b
                                                                                    style="color: red">(*)</b></label>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-envelope"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    value="{{ old('email', $proveedor->email) }}"
                                                                                    class="form-control" id="email"
                                                                                    name="email"
                                                                                    placeholder="Ingrese el email..."
                                                                                    required>
                                                                            </div>
                                                                            @error('email')
                                                                                <small
                                                                                    style="color: red">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Actualizar </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-------------------------------fin modal de actualizacion ---------------------------------------------------------------------------------------------------->



                                            <!---------------------------------------modal de eliminacion
                    -------------------------------------------------------------------------------------------------------->

                                            <form action="{{ url('/admin/proveedor/' . $proveedor->id) }}"
                                                id="miformulario{{ $proveedor->id }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $proveedor->id }}(event)">
                                                    <i class="fas fa-trash-alt"></i>Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <script>
                                    function preguntar{{ $proveedor->id }}(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: "¿Deseas eliminar este registro?",
                                            text: "No podras revertir este cambio",
                                            icon: "question",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Si, Eliminar!",
                                            cancelButtonText: "No, cancelar"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('miformulario' + {{ $proveedor->id }}).submit();
                                            }
                                        });
                                    }
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .table-responsive {
            overflow-x: auto;
            width: 100%;
            margin-bottom: 15px;
        }

        table {
            width: 100% !important;
        }

        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        #example1_wrapper .btn {
            color: #fff;
            border-radius: 4px;
            padding: 5px 15px;
            font-size: 14px;
            margin: 2px;
        }

        .btn-group .btn {
            padding: 4px 8px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6e7176;
            color: #212529;
            border: none;
        }

        @media screen and (max-width: 768px) {
            .table-responsive {
                display: block;
            }

            .btn-group {
                display: flex;
                flex-direction: column;
            }

            .btn-group .btn {
                margin: 2px 0;
            }
        }
    </style>
@stop

@section('js')
    @if ($errors->any())
        <script>
            @if (session('modal_id'))
                var modalId = '{{ session('modal_id') }}';
                $('#ModalEdit' + modalId).modal('show');
            @else 
                $('#ModalCreate').modal('show');
            @endif
        </script>
    @endif
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                    "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                    "lengthMenu": "Mostrar _MENU_ Proveedores",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "scrollX": true,
                "scrollCollapse": true,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>

@stop
