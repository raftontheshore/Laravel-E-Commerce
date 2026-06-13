<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $producto->nombre }} - Catacumbas Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('adminDashBoard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('adminDashBoard/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
        }
        .catacumbas-logo-text {
            font-family: 'SystemFont', monospace !important;
            font-size: 20px !important; letter-spacing: 2px !important;
            color: #ffffff !important; text-align: center !important; line-height: 1.2 !important;
        }
        .catacumbas-logo-sub {
            font-family: 'SystemFont', monospace !important;
            font-size: 11px !important; letter-spacing: 1px !important; margin-top: 2px !important;
        }

        body, #content-wrapper, #content { background-color: #1a1a1a !important; }

        .sidebar-dark.bg-gradient-primary, .bg-gradient-primary {
            background: linear-gradient(180deg, #111111 0%, #1a1a1a 100%) !important;
            border-right: 1px solid #c0392b !important;
        }
        .topbar.navbar-light.bg-white, nav.navbar {
            background-color: #111111 !important;
            border-bottom: 1px solid #c0392b !important;
        }
        .topbar .text-gray-600, .navbar-nav .nav-link { color: #cccccc !important; }

        .card {
            background-color: #222222 !important;
            border: 1px solid #333333 !important;
            color: #ffffff !important;
        }
        .card-header {
            background-color: #2a2a2a !important;
            border-bottom: 1px solid #c0392b !important;
        }

        .sticky-footer {
            background-color: #111111 !important;
            border-top: 1px solid #c0392b !important;
            color: #aaaaaa !important;
        }

        .btn-primary { background-color: #c0392b !important; border-color: #c0392b !important; }
        .btn-primary:hover { background-color: #e74c3c !important; border-color: #e74c3c !important; }
        .text-primary { color: #c0392b !important; }

        .dropdown-menu { background-color: #222222 !important; border: 1px solid #333333 !important; }
        .dropdown-item { color: #cccccc !important; }
        .dropdown-item:hover { background-color: #c0392b !important; color: #ffffff !important; }

        /* ── BADGES ── */
        .badge-condicion-nuevo           { background-color: #09c762; color: #fff; }
        .badge-condicion-usado           { background-color: #e67e22; color: #fff; }
        .badge-condicion-reacondicionado { background-color: #3498db; color: #fff; }
        .badge-activo   { background-color: rgba(9,199,98,0.15); color: #09c762; border: 1px solid #09c762; }
        .badge-inactivo { background-color: rgba(192,57,43,0.15); color: #e74c3c; border: 1px solid #e74c3c; }

        /* ── IMAGEN PRODUCTO ── */
        .prod-img-main {
            width: 100%;
            max-height: 320px;
            object-fit: contain;
            background: #111;
            border-radius: 10px;
            border: 1px solid #333;
            padding: 12px;
        }
        .prod-img-placeholder {
            width: 100%;
            height: 280px;
            background: #1a1a1a;
            border: 2px dashed #333;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-size: 64px;
        }

        /* ── DATOS ── */
        .dato-label {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #666;
            margin-bottom: 2px;
            font-weight: 700;
        }
        .dato-valor {
            font-size: 0.95rem;
            color: #ddd;
            margin-bottom: 0;
        }
        .dato-grupo {
            padding: 12px 0;
            border-bottom: 1px solid #2a2a2a;
        }
        .dato-grupo:last-child { border-bottom: none; }

        .precio-tachado { text-decoration: line-through; color: #555; font-size: 0.9rem; }
        .precio-final   { font-size: 1.8rem; font-weight: 800; color: #09c762; line-height: 1; }
        .descuento-badge {
            background: rgba(192,57,43,0.2);
            border: 1px solid #c0392b;
            color: #e74c3c;
            font-size: 0.75rem;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 700;
        }

        .stock-bajo { color: #e74c3c !important; font-weight: 700; }
        .stock-ok   { color: #09c762 !important; }

        /* ── BOTÓN MENÚ MÓVIL (HAMBURGUESA) ── */
        #sidebarToggleTop.btn-link {
            color: #aaaaaa !important; /* Gris claro para el ícono */
            background-color: transparent !important;
        }

        #sidebarToggleTop.btn-link:hover {
            color: #ffffff !important; /* Blanco al pasar el mouse */
            background-color: #222222 !important; /* Fondo sutil al hacer hover */
        }

        /* Quita la línea de puntos o el aro azul al hacer clic */
        #sidebarToggleTop.btn-link:focus,
        #sidebarToggleTop.btn-link:active {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body id="page-top">
<div id="wrapper">

    <x-admin-sidebar />

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            {{-- TOPBAR --}}
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nombre }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('adminDashBoard/img/undraw_profile.svg') }}">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">

                {{-- ENCABEZADO --}}
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h1 class="h3 mb-0 text-gray-800">
                            <i class="fas fa-box mr-2" style="color:#c0392b;"></i>
                            Detalle del Producto
                        </h1>
                        <small style="color:#666;">
                            <a href="{{ route('admin.productos.index') }}" style="color:#c0392b;">Productos</a>
                            / {{ $producto->nombre }}
                        </small>
                    </div>
                    <div style="display:flex;gap:8px;">
                        <a href="{{ route('admin.productos.index') }}" class="btn btn-sm"
                           style="background:#2a2a2a;border:1px solid #444;color:#aaa;">
                            <i class="fas fa-arrow-left mr-1"></i> Volver
                        </a>
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </a>
                    </div>
                </div>

                {{-- CONTENIDO PRINCIPAL --}}
                <div class="row">

                    {{-- COLUMNA IZQUIERDA: Imagen --}}
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-image mr-2"></i>Imagen
                                </h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                @if($producto->url_imagen)
                                    <img src="{{ $producto->url_imagen }}"
                                         alt="{{ $producto->nombre }}"
                                         class="prod-img-main"
                                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                    <div class="prod-img-placeholder" style="display:none;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @else
                                    <div class="prod-img-placeholder">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- COLUMNA DERECHA: Info --}}
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-info-circle mr-2"></i>Información General
                                </h6>
                            </div>
                            <div class="card-body">

                                {{-- Nombre y marca --}}
                                <div class="dato-grupo">
                                    <div style="font-size:1.4rem;font-weight:800;color:#fff;line-height:1.2;">
                                        {{ $producto->nombre }}
                                    </div>
                                    <div style="color:#666;font-size:0.9rem;margin-top:4px;">
                                        {{ $producto->marca }}
                                    </div>
                                </div>

                                {{-- Precio --}}
                                <div class="dato-grupo">
                                    <div class="dato-label">Precio</div>
                                    @if($producto->porcentaje_descuento > 0)
                                        <div class="precio-tachado">${{ number_format($producto->precio_original, 0, ',', '.') }}</div>
                                    @endif
                                    <div class="d-flex align-items-center" style="gap:10px;">
                                        <span class="precio-final">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                                        @if($producto->porcentaje_descuento > 0)
                                            <span class="descuento-badge">-{{ $producto->porcentaje_descuento }}%</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Fila: Categoría / Consola --}}
                                <div class="dato-grupo">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="dato-label">Categoría</div>
                                            <div class="dato-valor">{{ $producto->categoria->nombre ?? '—' }}</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="dato-label">Consola</div>
                                            <div class="dato-valor">{{ $producto->consola }}</div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fila: Condición / Estado / Stock --}}
                                <div class="dato-grupo">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="dato-label">Condición</div>
                                            <div class="mt-1">
                                                @switch($producto->condicion)
                                                    @case('nuevo')
                                                        <span class="badge badge-condicion-nuevo">Nuevo</span>
                                                        @break
                                                    @case('usado')
                                                        <span class="badge badge-condicion-usado">Usado</span>
                                                        @break
                                                    @case('reacondicionado')
                                                        <span class="badge badge-condicion-reacondicionado">Reacondicionado</span>
                                                        @break
                                                @endswitch
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="dato-label">Estado</div>
                                            <div class="mt-1">
                                                @if($producto->activo)
                                                    <span class="badge badge-activo">Activo</span>
                                                @else
                                                    <span class="badge badge-inactivo">Inactivo</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="dato-label">Stock</div>
                                            <div class="mt-1">
                                                @if($producto->stock == 0)
                                                    <span class="stock-bajo">0</span>
                                                    <small style="color:#e74c3c;display:block;">Sin stock</small>
                                                @elseif($producto->stock <= $producto->stock_bajo)
                                                    <span class="stock-bajo">{{ $producto->stock }}</span>
                                                    <small style="color:#e67e22;display:block;">Stock bajo (mín. {{ $producto->stock_bajo }})</small>
                                                @else
                                                    <span class="stock-ok">{{ $producto->stock }}</span>
                                                    <small style="color:#666;display:block;">Mín. {{ $producto->stock_bajo }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                @if($producto->descripcion)
                                <div class="dato-grupo">
                                    <div class="dato-label">Descripción</div>
                                    <div class="dato-valor" style="line-height:1.6;color:#bbb;white-space:pre-line;">
                                        {{ $producto->descripcion }}
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Catacumbas 2026</span>
                </div>
            </div>
        </footer>
    </div>
</div>

{{-- MODAL LOGOUT --}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog"><div class="modal-content" style="background:#222;color:#fff;">
        <div class="modal-header">
            <h5 class="modal-title">¿Listo para salir?</h5>
            <button class="close text-white" type="button" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">Seleccioná "Cerrar sesión" para terminar tu sesión.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
            </form>
        </div>
    </div></div>
</div>

<script src="{{ asset('adminDashBoard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminDashBoard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminDashBoard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('adminDashBoard/js/sb-admin-2.min.js') }}"></script>
<x-volverArriba />

</body>
</html>