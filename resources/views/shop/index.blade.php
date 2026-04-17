@extends('layouts.shop')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="p-5 mb-4 bg-light rounded-3">
        
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Bienvenido a nuestra tienda</h1>
            <p class="col-md-8 fs-4">Encuentra los mejores productos al mejor precio. Navega por nuestro catálogo y descubre todo lo que tenemos para ti.</p>
            <a href="{{ route('shop.catalog') }}" class="btn btn-primary btn-lg">Ver catálogo</a>
        </div>
    </div>

    <!-- Featured Products -->
    <h2 class="mb-4">Productos destacados</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
        @foreach($productos as $producto)
        <div class="col">
            <div class="card h-100 product-card">
                @php
                                            $imagenUrl = $producto->imagen;
                                            $isExternal = str_starts_with($imagenUrl, 'http://') || str_starts_with($imagenUrl, 'https://');
                                        @endphp
                                        <img src="{{ $isExternal ? $imagenUrl : asset('storage/' . $imagenUrl) }}" class="card-img-top product-img" alt="{{ $producto->nombre }}" onerror="this.src='{{ asset('img/no-image.png') }}'">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text text-truncate">{{ $producto->descripcion }}</p>
                    <p class="card-text fw-bold text-primary">${{ number_format($producto->precio_venta, 2) }}</p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('shop.product', $producto->id) }}" class="btn btn-outline-primary">Ver detalles</a>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Categories Section -->
    <h2 class="mb-4">Categorías</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        @foreach($categorias as $categoria)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->nombre }}</h5>
                    <p class="card-text">{{ $categoria->descripcion }}</p>
                    <a href="{{ route('shop.category', $categoria->id) }}" class="btn btn-outline-primary">Ver productos</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection