@extends('layouts.shop')

@section('content')
<div class="container">
    <h1 class="mb-4">Resultados de búsqueda: "{{ $query }}"</h1>
    
    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Categorías</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('shop.catalog') }}" class="list-group-item list-group-item-action">
                            Todas las categorías
                        </a>
                        @foreach($categorias as $categoria)
                        <a href="{{ route('shop.category', $categoria->id) }}" class="list-group-item list-group-item-action">
                            {{ $categoria->nombre }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <!-- Products Grid -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @forelse($productos as $producto)
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
                @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No se encontraron productos que coincidan con "{{ $query }}".
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $productos->appends(['query' => $query])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection