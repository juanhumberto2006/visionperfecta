@extends('layouts.shop')

@section('content')
<div class="container">
    <h1 class="mb-4">Finalizar Compra</h1>
    
    @if(!Auth::check())
    <div class="alert alert-warning mb-4">
        <p class="mb-0">Debes <a href="{{ route('login') }}" class="alert-link">iniciar sesión</a> para completar tu compra. Si no tienes una cuenta, puedes <a href="{{ route('register') }}" class="alert-link">registrarte aquí</a>.</p>
    </div>
    @endif
    
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Información de Envío</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') ?? (Auth::check() ? Auth::user()->name : '') }}" required>
                                @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? (Auth::check() ? Auth::user()->email : '') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección de envío</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" rows="3" required>{{ old('direccion') }}</textarea>
                            @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                                @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Método de pago</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metodo_pago" id="paypal" value="paypal" checked>
                                <label class="form-check-label" for="paypal">
                                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" alt="PayPal" height="23"> PayPal
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Volver al carrito</a>
                            <button type="submit" class="btn btn-success" {{ Auth::check() ? '' : 'disabled' }}>Proceder al pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Resumen de compra</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6>Productos ({{ count($cart) }})</h6>
                        <ul class="list-group list-group-flush">
                            @foreach($cart as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <span>{{ $item['nombre'] }}</span>
                                    <small class="d-block text-muted">Cantidad: {{ $item['cantidad'] }}</small>
                                </div>
                                <span>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Impuestos (16%):</span>
                        <span>${{ number_format($total * 0.16, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3 fw-bold">
                        <span>Total:</span>
                        <span>${{ number_format($total * 1.16, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection