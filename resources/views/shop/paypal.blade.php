@extends('layouts.shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">PayPal - Simulación de Pago</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal" class="img-fluid" style="max-width: 200px;">
                    </div>
                    
                    <div class="alert alert-info">
                        <p>Esta es una simulación de pago con PayPal para fines de demostración.</p>
                        <p>En un entorno de producción, aquí se integraría la API real de PayPal.</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Detalles de la orden:</h5>
                        <p><strong>ID de orden:</strong> {{ $orden['id'] }}</p>
                        <p><strong>Fecha:</strong> {{ $orden['fecha'] }}</p>
                        <p><strong>Total a pagar:</strong> ${{ number_format($orden['total'] * 1.16, 2) }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Información del cliente:</h5>
                        <p><strong>Nombre:</strong> {{ $checkout_info['nombre'] }}</p>
                        <p><strong>Email:</strong> {{ $checkout_info['email'] }}</p>
                        <p><strong>Dirección:</strong> {{ $checkout_info['direccion'] }}</p>
                        <p><strong>Teléfono:</strong> {{ $checkout_info['telefono'] }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Resumen de productos:</h5>
                        <ul class="list-group">
                            @foreach($cart as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span>{{ $item['nombre'] }}</span>
                                    <small class="d-block text-muted">Cantidad: {{ $item['cantidad'] }}</small>
                                </div>
                                <span>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('checkout.index') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Volver</a>
                        <a href="{{ route('checkout.complete') }}" class="btn btn-success">Confirmar Pago</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection