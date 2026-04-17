<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Tienda</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Estilos adicionales para la tienda -->
    <style>
        .product-card {
            transition: transform 0.3s;
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .product-img {
            height: 200px;
            object-fit: cover;
        }
        .cart-icon {
            position: relative;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.index') }}">
                    {{ config('app.name', 'Laravel') }} - Tienda
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.catalog') }}">Catálogo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorías
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(\App\Models\Categoria::all() as $categoria)
                                <li><a class="dropdown-item" href="{{ route('shop.category', $categoria->id) }}">{{ $categoria->nombre }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

                    <!-- Search Form -->
                    <form class="d-flex mx-auto" action="{{ route('shop.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Buscar productos..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Buscar</button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Cart Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <div class="cart-icon">
                                    <i class="bi bi-cart3 fs-5"></i>
                                    @if(session('cart') && count(session('cart')) > 0)
                                    <span class="cart-count">{{ count(session('cart')) }}</span>
                                    @endif
                                </div>
                            </a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-outline-warning ms-2" href="{{ route('login') }}?admin=1">
                                    <i class="bi bi-shield-lock"></i> Acceso Administrador
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>{{ config('app.name', 'Laravel') }}</h5>
                        <p>Sistema de gestión de inventario y tienda en línea.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Enlaces rápidos</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('shop.index') }}" class="text-white" >Inicio</a></li>
                            <li><a href="{{ route('shop.catalog') }}" class="text-white">Catálogo</a></li>
                            <li><a href="{{ route('cart.index') }}" class="text-white">Carrito</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Contacto</h5>
                        <address>
                            <p><i class="bi bi-geo-alt"></i> Dirección: Calle Principal CR 17-95</p>
                            <p><i class="bi bi-telephone"></i> Teléfono: (313) 456-7890</p>
                            <p><i class="bi bi-envelope"></i> Email: sisgestiondeinventario@gmail.com</p>
                        </address>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>