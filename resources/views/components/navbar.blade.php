{{--
    ============================================================
    COMPONENTE: Barra de Navegación principal (catacumbas-nav)
    ------------------------------------------------------------
    Navbar principal del sitio. Incluye:
      - Logo + nombre de marca
      - Links de navegación con indicador de página activa
      - Bloque de autenticación (Ingresar / Registrarse)
    En móvil colapsa en un menú hamburguesa (Bootstrap).
    ============================================================
--}}

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
        .catacumbas-nav .navbar-brand:hover .brand-name {
            max-height: 20px;
            opacity: 1;
            margin-top: 4px;
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

        .catacumbas-nav .nav-link.dropdown-toggle::after {
            display: none !important;
        }
        .catacumbas-nav .nav-link.dropdown-toggle {
            position: relative;
        }
        .catacumbas-nav .nav-link.dropdown-toggle::before {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: -2px;
            height: 2px;
            background: #c0392b;
            border-radius: 1px;
            transform: scaleX(0);
            transition: transform 0.2s ease;
        }
        .catacumbas-nav .nav-link.dropdown-toggle:hover::before,
        .catacumbas-nav .nav-link.dropdown-toggle.active::before,
        .catacumbas-nav .dropdown:hover .nav-link.dropdown-toggle::before {
            transform: scaleX(1);
        }

        .catacumbas-nav .search-wrapper {
            display: flex;
            align-items: center;
            background: #1c1c1c;
            border: 1px solid #2e2e2e;
            border-radius: 6px;
            padding: 0 10px;
            gap: 8px;
            transition: border-color 0.15s;
        }
        .catacumbas-nav .search-wrapper:focus-within { border-color: #555; }
        .catacumbas-nav .search-wrapper i { color: #555; font-size: 13px; }
        .catacumbas-nav .search-wrapper input {
            background: transparent;
            border: none;
            outline: none;
            color: #ccc;
            font-size: 13px;
            padding: 6px 0;
            width: 180px;
        }
        .catacumbas-nav .search-wrapper input::placeholder { color: #555; }

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

        /* ── Nombre de usuario logueado ── */
        .catacumbas-nav .btn-username {
            color: #aaa;
            font-size: 13px;
            padding: 6px 14px;
            border: 1px solid #333;
            border-radius: 20px;
            white-space: nowrap;
        }

        /* ── Botón cerrar sesión ── */
        .catacumbas-nav .btn-logout {
            color: #aaa;
            font-size: 13px;
            text-decoration: none;
            padding: 6px 14px;
            border: 1px solid #333;
            border-radius: 20px;
            transition: color 0.15s, border-color 0.15s;
            white-space: nowrap;
            background: none;
            cursor: pointer;
        }
        .catacumbas-nav .btn-logout:hover { color: #fff; border-color: #555; }

        .catacumbas-nav .dropdown-menu {
            background-color: #1a1c20;
            border: 1px solid #2a2a2a;
            border-radius: 4px;
            margin-top: 16px;
            padding: 8px 0;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }
        .catacumbas-nav .dropdown-item {
            color: #b0b0b0;
            font-size: 13px;
            padding: 8px 20px;
            transition: background-color 0.15s ease, color 0.15s ease;
        }
        .catacumbas-nav .dropdown-item:hover,
        .catacumbas-nav .dropdown-item:focus {
            background-color: #2a2d33;
            color: #ffffff;
        }
        .catacumbas-nav .dropdown-divider {
            border-top-color: #2a2a2a;
            margin: 4px 0;
        }

        @media (min-width: 992px) {
            .catacumbas-nav .dropdown:hover > .dropdown-menu {
                display: block;
                margin-top: 16px !important;
            }
            .catacumbas-nav .dropdown-menu::before {
                content: '';
                position: absolute;
                top: -15px;
                left: 0;
                width: 100%;
                height: 15px;
            }
        }

        .catacumbas-nav .dropdown:hover .nav-link {
            color: #ffffff !important;
        }

        @media (max-width: 991px) {
            .catacumbas-nav .search-wrapper { width: 100%; }
            .catacumbas-nav .search-wrapper input { width: 100%; }
            .catacumbas-nav .btn-login  { flex: 1; text-align: center; }
            .catacumbas-nav .btn-signup { flex: 1; text-align: center; }
            .catacumbas-nav .btn-logout { flex: 1; text-align: center; }
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
                    <a class="nav-link fs-6 {{ request()->is('/*') ? 'active' : '' }}" href="/">Principal</a>
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

                <div class="d-flex gap-2 justify-content-center">

                        @auth
                            @php
                                // 1. Buscamos si el usuario logueado tiene una venta abierta en estado 'carrito'
                                $ventaActiva = \Illuminate\Support\Facades\DB::table('ventas_cabecera')
                                    ->where('user_id', Auth::id())
                                    ->where('estado', 'carrito')
                                    ->first();

                                $cantidadCarrito = 0;

                                // 2. Si tiene una venta activa, sumamos la cantidad de los productos en sus detalles
                                if ($ventaActiva) {
                                    $cantidadCarrito = \Illuminate\Support\Facades\DB::table('ventas_detalle')
                                        ->where('venta_id', $ventaActiva->id)
                                        ->sum('cantidad');
                                }
                            @endphp

                            <a href="{{ route('carrito.index') }}" class="btn-login position-relative">
                                <i class="bi bi-cart3" style="font-size: 1.1rem;"></i>
                                
                                {{-- El globito rojo mágico --}}
                                <span id="contador-carrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill {{ $cantidadCarrito > 0 ? '' : 'd-none' }}"
                                    style="background:#c02a2a; font-size: 0.65rem;">
                                    {{ $cantidadCarrito }}
                                </span>
                            </a>

                            {{-- Menú Desplegable de Usuario (Avatar) --}}
                            <div class="dropdown ms-2 position-relative">
                                
                                {{-- El botón visible en la navbar (Le sacamos la clase nav-link para evitar la línea roja) --}}
                                <a class="d-flex align-items-center text-decoration-none border-0 bg-transparent p-0" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div style="width: 36px; height: 36px; border-radius: 50%; overflow: hidden; border: 2px solid #2a2a2a; transition: border-color 0.2s;">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nombre ?? Auth::user()->name) }}&background=1c1c1c&color=c0392b&bold=true" 
                                            alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </a>

                                {{-- El menú que se despliega (Forzamos la posición a la derecha con right: 0 y left: auto) --}}
                                <ul class="dropdown-menu shadow-lg" aria-labelledby="perfilDropdown" style="width: 250px; background-color: #141414; border: 1px solid #2a2a2a; margin-top: 12px; right: 0 !important; left: auto !important; position: absolute;">
                                    
                                    {{-- Cabecera del menú: Foto + Nombre + Correo --}}
                                    <li class="px-3 py-3 border-bottom border-dark mb-2 d-flex align-items-center gap-3">
                                        <div style="width: 46px; height: 46px; border-radius: 50%; overflow: hidden; flex-shrink: 0; border: 1px solid #333;">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nombre ?? Auth::user()->name) }}&background=1c1c1c&color=c0392b&bold=true" 
                                                alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div style="min-width: 0;"> 
                                            <div class="fw-bold text-white text-truncate" style="font-size: 0.95rem;">
                                                {{ Auth::user()->nombre ?? Auth::user()->name }}
                                            </div>
                                            <div class="text-secondary text-truncate" style="font-size: 0.8rem;">
                                                {{ Auth::user()->email }}
                                            </div>
                                        </div>
                                    </li>

                                    {{-- Opciones del menú --}}
                        {{-- oipcion de mis comprar osea el historial pero si da tiempo --}}
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('compras.index') }}">
                                            <i class="bi bi-bag-check text-secondary"></i> Mis Compras
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider border-dark my-2"></li>

                                    {{-- Botón de Cerrar Sesión --}}
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2" style="color: #c0392b; cursor: pointer; background: transparent; border: none; width: 100%; text-align: left;">
                                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                                                    <a href="{{ route('login') }}" class="btn-login">Ingresar</a>
                            <a href="{{ route('register') }}" class="btn btn-signup">Registrarse</a>
                        @endauth
                </div>

            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>