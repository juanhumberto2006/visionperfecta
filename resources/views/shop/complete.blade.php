@extends('layouts.shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">¡Compra Completada!</h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                    </div>
                    
                    <h4 class="mb-3">¡Gracias por tu compra!</h4>
                    <p class="lead">Tu pedido ha sido procesado correctamente.</p>
                    
                    <div class="alert alert-info mb-4">
                        <p class="mb-0">Hemos enviado un correo electrónico a <strong>{{ $compra->email_cliente }}</strong> con los detalles de tu compra y la factura.</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Detalles de la orden:</h5>
                        <p><strong>Número de orden:</strong> {{ $compra->referencia }}</p>
                        <p><strong>Fecha:</strong> {{ $compra->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Total pagado:</strong> ${{ number_format($compra->total * 1.16, 2) }}</p>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('shop.index') }}" class="btn btn-primary me-2">Volver a la tienda</a>
                        <a href="#" class="btn btn-outline-primary me-2" onclick="window.print();"><i class="bi bi-printer"></i> Imprimir recibo</a>
                        <a href="{{ route('checkout.factura', $compra->referencia) }}" class="btn btn-outline-danger"><i class="bi bi-file-pdf"></i> Descargar factura PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection