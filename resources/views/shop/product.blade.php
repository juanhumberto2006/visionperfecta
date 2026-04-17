@extends('layouts.shop')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.catalog') }}">Catálogo</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.category', $producto->categoria_id) }}">{{ $producto->categoria->nombre }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $producto->nombre }}</li>
        </ol>
    </nav>

    <div class="row mb-5">
        <!-- Product Image -->
        <div class="col-md-5">
            @php
                    $imagenUrl = $producto->imagen;
                    $isExternal = str_starts_with($imagenUrl, 'http://') || str_starts_with($imagenUrl, 'https://');
                @endphp
                <img src="{{ $isExternal ? $imagenUrl : asset('storage/' . $imagenUrl) }}" class="img-fluid rounded" alt="{{ $producto->nombre }}" onerror="this.src='{{ asset('img/no-image.png') }}'">
        </div>
        
        <!-- Product Details -->
        <div class="col-md-7">
            <h1 class="mb-3">{{ $producto->nombre }}</h1>
            <p class="text-muted mb-3">Código: {{ $producto->codigo }}</p>
            <p class="fs-4 fw-bold text-primary mb-3">${{ number_format($producto->precio_venta, 2) }}</p>
            <p class="mb-4">{{ $producto->descripcion }}</p>
            
            <div class="mb-4">
                <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
                <p><strong>Unidad de medida:</strong> {{ $producto->unidad_medida }}</p>
            </div>
            
            <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="cantidad" class="col-form-label">Cantidad:</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="cantidad" name="cantidad" class="form-control" value="1" min="1">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Añadir al carrito</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Related Products -->
    @if(count($relacionados) > 0)
    <div class="mb-5">
        <h3 class="mb-4">Productos relacionados</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($relacionados as $relacionado)
            <div class="col">
                <div class="card h-100 product-card">
                    @php
                                        $relacionadoUrl = $relacionado->imagen;
                                        $isExternalRel = str_starts_with($relacionadoUrl, 'http://') || str_starts_with($relacionadoUrl, 'https://');
                                    @endphp
                                    <img src="{{ $isExternalRel ? $relacionadoUrl : asset('storage/' . $relacionadoUrl) }}" class="card-img-top product-img" alt="{{ $relacionado->nombre }}" onerror="this.src='{{ asset('img/no-image.png') }}'">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relacionado->nombre }}</h5>
                        <p class="card-text text-truncate">{{ $relacionado->descripcion }}</p>
                        <p class="card-text fw-bold text-primary">${{ number_format($relacionado->precio_venta, 2) }}</p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('shop.product', $relacionado->id) }}" class="btn btn-outline-primary">Ver detalles</a>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $relacionado->id }}">
                                <input type="hidden" name="cantidad" value="1">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection