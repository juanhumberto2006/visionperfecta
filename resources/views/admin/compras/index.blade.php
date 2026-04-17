@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 18pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de compras</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Compras registradas</b></h3>

                <div class="card-tools">
                    <a href="{{ url('/admin/compras/create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-folder-plus"></i>
                        Registrar compra
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Proveedor</th>
                                <th>Fecha de la compra</th>  
                                <th>Total  de la compra</th>
                                <th>Estado</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $compra->proveedor_id }}</td>
                                    <td>{{ $compra->fecha }}</td>
                                    <td>{{ $compra->total }}</td>
                                    <td>{!! $compra->estado !!}</td>
                                   
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/compra/' . $compra->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>Ver
                                            </a>
                                            <a href="{{ url('/admin/compra/' . $compra->id . '/edit') }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-pencil-alt"></i>Editar
                                            </a>
                                            <form action="{{ url('/admin/compra/' . $compra->id) }}" 
                                                  id="miformulario{{ $compra->id }}" method="POST" 
                                                  style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $compra->id }}(event)">
                                                    <i class="fas fa-trash-alt"></i>Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <script>
                                    function preguntar{{ $compra->id }}(event) {
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
                                                document.getElementById('miformulario' + {{ $compra->id }}).submit();
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

        .btn-danger { background-color: #dc3545; border: none; }
        .btn-success { background-color: #28a745; border: none; }
        .btn-info { background-color: #17a2b8; border: none; }
        .btn-warning { background-color: #ffc107; color: #212529; border: none; }
        .btn-default { background-color: #6e7176; color: #212529; border: none; }

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
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                    "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                    "lengthMenu": "Mostrar _MENU_ Compras",
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
                buttons: [
                    {text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default'},
                    {text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger'},
                    {text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info'},
                    {text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success'},
                    {text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning'}
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
