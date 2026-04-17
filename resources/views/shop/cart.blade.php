@extends('layouts.shop')

@section('content')
<div class="container">
    <h1 class="mb-4">Carrito de Compras</h1>
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(count($cart) > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Productos en el carrito</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $id => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @php
                                                $imagenUrl = $item['imagen'];
                                                $isExternal = str_starts_with($imagenUrl, 'http://') || str_starts_with($imagenUrl, 'https://');
                                            @endphp
                                            <img src="{{ $isExternal ? $imagenUrl : asset('storage/' . $imagenUrl) }}" alt="{{ $item['nombre'] }}" class="img-thumbnail me-3" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.src='{{ asset('img/no-image.png') }}'">
                                            <div>
                                                <h6 class="mb-0">{{ $item['nombre'] }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${{ number_format($item['precio'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $id }}">
                                            <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="form-control form-control-sm" style="width: 70px;">
                                            <button type="submit" class="btn btn-sm btn-outline-primary ms-2"><i class="bi bi-arrow-repeat"></i></button>
                                        </form>
                                    </td>
                                    <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                                    <td>
                                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('shop.catalog') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Seguir comprando</a>
                        <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger">Vaciar carrito</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Resumen de compra</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Impuestos:</span>
                        <span>${{ number_format($total * 0.16, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3 fw-bold">
                        <span>Total:</span>
                        <span>${{ number_format($total * 1.16, 2) }}</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success w-100">Proceder al pago</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        <h4 class="alert-heading">¡Tu carrito está vacío!</h4>
        <p>No hay productos en tu carrito de compras.</p>
        <hr>
        <p class="mb-0">Explora nuestro catálogo para encontrar productos que te interesen.</p>
        <div class="mt-3">
            <a href="{{ route('shop.catalog') }}" class="btn btn-primary">Ver catálogo</a>
        </div>
    </div>
    @endif
</div>
@endsection