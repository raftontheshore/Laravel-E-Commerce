<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }

        .catacumbas-nav {
            background-color: #0d0d0d;
            border-bottom: 1px solid #2a2a2a;
        }

        .catacumbas-nav .navbar-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .catacumbas-nav .brand-name {
            font-family: 'SystemFont', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #c0392b;
            line-height: 1;
            margin-top: 4px;
            text-align: center;
        }

        .catacumbas-nav .nav-link {
            position: relative;
            color: #b0b0b0 !important;
            transition: color 0.15s;
        }
        .catacumbas-nav .nav-link::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: -2px;
            height: 2px;
            background: #c0392b;
            border-radius: 1px;
            transform: scaleX(0);
            transition: transform 0.2s ease;
        }
        .catacumbas-nav .nav-link:hover,
        .catacumbas-nav .nav-link.active { color: #ffffff !important; }
        .catacumbas-nav .nav-link:hover::after,
        .catacumbas-nav .nav-link.active::after { transform: scaleX(1); }

        .catacumbas-nav .btn-login {
            color: #aaa;
            font-size: 13px;
            text-decoration: none;
            padding: 6px 14px;
            border: 1px solid #333;
            border-radius: 20px;
            transition: color 0.15s, border-color 0.15s;
            white-space: nowrap;
        }
        .catacumbas-nav .btn-login:hover { color: #fff; border-color: #555; }

        .catacumbas-nav .btn-signup {
            background-color: #c0392b;
            border: none;
            color: #fff;
            font-size: 13px;
            padding: 7px 18px;
            border-radius: 20px;
            white-space: nowrap;
            transition: background-color 0.15s;
        }
        .catacumbas-nav .btn-signup:hover { background-color: #e74c3c; color: #fff; }

        .catacumbas-nav .dropdown-menu {
            background-color: #141414;
            border: 1px solid #2a2a2a;
            border-radius: 4px;
            margin-top: 12px;
            padding: 8px 0;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }
        .catacumbas-nav .dropdown-item {
            color: #b0b0b0;
            font-size: 13px;
            padding: 8px 20px;
            transition: background-color 0.15s, color 0.15s;
        }
        .catacumbas-nav .dropdown-item:hover,
        .catacumbas-nav .dropdown-item:focus {
            background-color: #2a2d33;
            color: #fff;
        }
        .catacumbas-nav .dropdown-divider { border-top-color: #2a2a2a; margin: 4px 0; }

        
        .user-offcanvas {
            background: #1c1c1e !important;
            border-radius: 20px 20px 0 0 !important;
            height: auto !important;
        }
        .user-offcanvas .offcanvas-body { padding: 0 !important; }

        .offcanvas-menu-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border-bottom: 1px solid #1e1e1e;
            color: #ddd;
            text-decoration: none;
            width: 100%;
            background: transparent;
            border-left: none;
            border-right: none;
            border-top: none;
            cursor: pointer;
            font-size: 15px;
        }
        .offcanvas-menu-item:hover { background: #262626; color: #fff; }
        .offcanvas-menu-item.danger { color: #c0392b; border-bottom: none; }
        .offcanvas-menu-item.danger:hover { background: #1a0a0a; }

        @media (max-width: 991px) {
            .catacumbas-nav .btn-login  { flex: 1; text-align: center; }
            .catacumbas-nav .btn-signup { flex: 1; text-align: center; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark py-2 catacumbas-nav">
    <div class="container-fluid px-4">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/favicon.png') }}" alt="logo" height="36">
            <span class="brand-name">Catacumbas</span>
        </a>

        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3" style="gap: 4px;">
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('/') ? 'active' : '' }}" href="/">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('tienda*') ? 'active' : '' }}" href="/tienda">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('nosotros*') ? 'active' : '' }}" href="/nosotros">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('faq*') ? 'active' : '' }}" href="/faq">Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('contacto*') ? 'active' : '' }}" href="/contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('terminos*') ? 'active' : '' }}" href="/terminos">Términos De Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('privacidad*') ? 'active' : '' }}" href="/privacidad">Política De Privacidad</a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center ms-auto gap-2 mt-3 mt-lg-0">
                <div class="d-flex gap-2 justify-content-center align-items-center">

                    @auth
                        @php
                            $ventaActiva = \Illuminate\Support\Facades\DB::table('ventas_cabecera')
                                ->where('user_id', Auth::id())
                                ->where('estado', 'carrito')
                                ->first();

                            $cantidadCarrito = 0;

                            if ($ventaActiva) {
                                $cantidadCarrito = \Illuminate\Support\Facades\DB::table('ventas_detalle')
                                    ->where('venta_id', $ventaActiva->id)
                                    ->sum('cantidad');
                            }

                            $nombreCompleto = Auth::user()->nombre ?? Auth::user()->name ?? '';
                            $partes = explode(' ', trim($nombreCompleto));
                            $iniciales = strtoupper(substr($partes[0], 0, 1) . (isset($partes[1]) ? substr($partes[1], 0, 1) : ''));
                        @endphp

                        {{-- Carrito --}}
                        <a href="{{ route('carrito.index') }}" class="btn-login position-relative">
                            <i class="bi bi-cart3" style="font-size: 1.1rem;"></i>
                            <span id="contador-carrito"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill {{ $cantidadCarrito > 0 ? '' : 'd-none' }}"
                                style="background:#c02a2a; font-size: 0.65rem;">
                                {{ $cantidadCarrito }}
                            </span>
                        </a>

                        {{-- DESKTOP: dropdown --}}
                        <div class="dropdown ms-2 position-relative d-none d-lg-block">
                            <a href="#" id="perfilDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                class="d-flex align-items-center text-decoration-none">
                                <div style="width:36px; height:36px; border-radius:50%; background:#c0392b;
                                            border:2px solid #3a0a0a; display:flex; align-items:center;
                                            justify-content:center; font-size:13px; font-weight:700;
                                            color:#fff; cursor:pointer; letter-spacing:0.5px;">
                                    {{ $iniciales }}
                                </div>
                            </a>
                            <ul class="dropdown-menu shadow-lg" aria-labelledby="perfilDropdown"
                                style="width:250px; right:0 !important; left:auto !important; position:absolute;">
                                <li class="px-3 py-3 border-bottom border-dark mb-2 d-flex align-items-center gap-3">
                                    <div style="width:46px; height:46px; border-radius:50%; background:#c0392b;
                                                border:1px solid #3a0a0a; display:flex; align-items:center;
                                                justify-content:center; font-size:15px; font-weight:700;
                                                color:#fff; flex-shrink:0;">
                                        {{ $iniciales }}
                                    </div>
                                    <div style="min-width:0;">
                                        <div class="fw-bold text-white text-truncate" style="font-size:0.95rem;">
                                            {{ Auth::user()->nombre ?? Auth::user()->name }}
                                        </div>
                                        <div class="text-secondary text-truncate" style="font-size:0.8rem;">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="{{ route('compras.index') }}">
                                        <i class="bi bi-bag-check text-secondary"></i> Mis Compras
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider border-dark my-2"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            style="color:#c0392b; cursor:pointer; background:transparent;
                                                   border:none; width:100%; text-align:left;">
                                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        {{-- MÓVIL: botón offcanvas --}}
                        <button type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#userOffcanvas"
                            aria-controls="userOffcanvas"
                            class="d-lg-none"
                            style="width:36px; height:36px; border-radius:50%; background:#c0392b;
                                   border:2px solid #3a0a0a; color:#fff; font-size:13px; font-weight:700;
                                   cursor:pointer; letter-spacing:0.5px; flex-shrink:0;">
                            {{ $iniciales }}
                        </button>

                    @else
                        <a href="{{ route('login') }}" class="btn-login">Ingresar</a>
                        <a href="{{ route('register') }}" class="btn btn-signup">Registrarse</a>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</nav>

{{-- Offcanvas solo móvil (fuera del nav) --}}
@auth
<div class="offcanvas offcanvas-bottom user-offcanvas" tabindex="-1" id="userOffcanvas" aria-labelledby="userOffcanvasLabel">
    <div style="width:36px; height:4px; background:#444; border-radius:2px; margin:10px auto 0;"></div>
    <div class="offcanvas-body">
        <div style="display:flex; align-items:center; gap:12px; padding:16px; border-bottom:1px solid #2a2a2a;">
            <div style="width:48px; height:48px; border-radius:50%; background:#c0392b;
                        border:2px solid #3a0a0a; display:flex; align-items:center;
                        justify-content:center; font-size:16px; font-weight:700;
                        color:#fff; flex-shrink:0;">
                {{ $iniciales }}
            </div>
            <div>
                <div style="color:#f0f0f0; font-size:15px; font-weight:600;">
                    {{ Auth::user()->nombre ?? Auth::user()->name }}
                </div>
                <div style="color:#777; font-size:12px; margin-top:2px;">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>
        <a href="{{ route('compras.index') }}" class="offcanvas-menu-item">
            <i class="bi bi-bag-check" style="font-size:18px; color:#888;"></i>
            Mis compras
        </a>
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="offcanvas-menu-item danger">
                <i class="bi bi-box-arrow-right" style="font-size:18px;"></i>
                Cerrar sesión
            </button>
        </form>
        <div style="height:20px;"></div>
    </div>
</div>
@endauth

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>