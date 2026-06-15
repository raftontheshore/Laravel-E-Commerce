<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Catacumbas">
    <meta name="author" content="Enzo">

    <title>Catacumbas - Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('adminDashBoard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('adminDashBoard/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    
{{-- FORZAMOS LA FUENTE Y EL ESTILO DIRECTAMENTE AQUÍ --}}
    <style>
        
    @font-face {
        font-family: 'SystemFont';
        src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
        font-display: swap;
    }

    .catacumbas-logo-text {
        font-family: 'SystemFont', monospace !important;
        font-size: 20px !important;
        letter-spacing: 2px !important;
        color: #ffffff !important;
        text-align: center !important;
        line-height: 1.2 !important;
    }

    .catacumbas-logo-sub {
        font-family: 'SystemFont', monospace !important;
        font-size: 11px !important;
        letter-spacing: 1px !important;
        margin-top: 2px !important;
    }

    /* ── FONDO GENERAL ── */
    body, #content-wrapper, #content {
        background-color: #1a1a1a !important;
    }

    /* ── SIDEBAR ── */
    .sidebar-dark.bg-gradient-primary,
    .bg-gradient-primary {
        background: linear-gradient(180deg, #111111 0%, #1a1a1a 100%) !important;
        border-right: 1px solid #c0392b !important;
    }

    /* ── TOPBAR ── */
    .topbar.navbar-light.bg-white,
    nav.navbar {
        background-color: #111111 !important;
        border-bottom: 1px solid #c0392b !important;
    }
    .topbar .text-gray-600,
    .navbar-nav .nav-link {
        color: #cccccc !important;
    }

    /* ── CARDS ── */
    .card {
        background-color: #222222 !important;
        border: 1px solid #333333 !important;
        color: #ffffff !important;
    }
    .card-header {
        background-color: #2a2a2a !important;
        border-bottom: 1px solid #c0392b !important;
    }
    .card .text-gray-800,
    .card .h5 {
        color: #ffffff !important;
    }
    .card .text-gray-500,
    .card .text-xs {
        color: #aaaaaa !important;
    }

    /* ── BORDES IZQUIERDOS DE CARDS (acento rojo) ── */
    .border-left-primary { border-left: 4px solid #c0392b !important; }
    .border-left-success { border-left: 4px solid #09c762 !important; }
    .border-left-info    { border-left: 4px solid #c0392b !important; }
    .border-left-warning { border-left: 4px solid #e67e22 !important; }

    /* ── TABLAS ── */
    .table {
        color: #cccccc !important;
    }
    .table thead th {
        border-bottom: 2px solid #c0392b !important;
        color: #aaaaaa !important;
    }
    .table td, .table th {
        border-top: 1px solid #333333 !important;
    }
    .table-bordered {
        border: 1px solid #333333 !important;
    }

    /* ── PROGRESS BARS ── */
    .progress {
        background-color: #333333 !important;
    }

    /* ── FOOTER ── */
    .sticky-footer {
        background-color: #111111 !important;
        border-top: 1px solid #c0392b !important;
        color: #aaaaaa !important;
    }

    /* ── TÍTULO DASHBOARD ── */
    .text-gray-800 {
        color: #ffffff !important;
    }

    /* ── DROPDOWN MENÚ ── */
    .dropdown-menu {
        background-color: #222222 !important;
        border: 1px solid #333333 !important;
    }
    .dropdown-item {
        color: #cccccc !important;
    }
    .dropdown-item:hover {
        background-color: #c0392b !important;
        color: #ffffff !important;
    }

    /* ── BOTONES ── */
    .btn-primary {
        background-color: #c0392b !important;
        border-color: #c0392b !important;
    }
    .btn-primary:hover {
        background-color: #e74c3c !important;
        border-color: #e74c3c !important;
    }

    /* ── TEXTO PRIMARIO (títulos de cards) ── */
    .text-primary {
        color: #c0392b !important;
    }

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
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                    
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                         </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">

                {{-- ENCABEZADO --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
                </div>

                {{-- ALERTA --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" style="background:#1e4d2b;color:#fff;border:1px solid #2ecc71;">
                        {{ session('success') }}
                        <button type="button" class="close text-white" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                {{-- AGREGÁ ESTO --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" style="background:#4d1e1e;color:#fff;border:1px solid #c0392b;">
                        {{ session('error') }}
                        <button type="button" class="close text-white" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                {{-- BUSCADOR --}}
                {{-- BUSCADOR --}}
                <form method="GET" action="{{ route('admin.usuarios') }}" class="mb-4">
                    <div class="input-group" style="max-width: 400px; background-color: #222; border: 1px solid #333; border-radius: 7px; overflow: hidden;">
                        
                        <div class="input-group-prepend">
                            <button class="btn border-0" type="submit" style="background: transparent; color: #555; box-shadow: none; padding-left: 15px; padding-right: 10px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        
                        <input type="text" name="buscar" class="form-control border-0" placeholder="Buscar usuario..." value="{{ $buscar ?? '' }}" style="background-color: transparent; color: #ddd; box-shadow: none; outline: none;">
                        
                    </div>
                </form>

                <div class="row">

                    {{-- CLIENTES --}}
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Clientes registrados
                                    <span class="badge" style="background:#c0392b;color:white;border-radius:10px;padding:2px 8px;">{{ $clientes->count() }}</span>
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                @forelse($clientes as $user)
                                    <div class="d-flex align-items-center justify-content-between px-4 py-3" style="border-bottom:1px solid #333;">
                                        <div>
                                            <div class="font-weight-bold">{{ $user->nombre }}</div>
                                            <div class="text-xs" style="color:#aaa;">{{ $user->email }}</div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <form method="POST" action="{{ route('admin.usuarios.rol', $user) }}">
                                                @csrf @method('PATCH')
                                                <button class="btn btn-sm btn-outline-light" title="Hacer Admin">
                                                    <i class="fas fa-arrow-up"></i> Admin
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.usuarios.destroy', $user) }}" onsubmit="return confirm('¿Eliminar usuario?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger ml-1">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-4 py-3 text-center" style="color:#aaa;">No hay clientes registrados.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- ADMINISTRADORES --}}
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Administradores
                                    <span class="badge" style="background:#c0392b;color:white;border-radius:10px;padding:2px 8px;">{{ $admins->count() }}</span>
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                @forelse($admins as $user)
                                    <div class="d-flex align-items-center justify-content-between px-4 py-3" style="border-bottom:1px solid #333;">
                                        <div>
                                            <div class="font-weight-bold">{{ $user->nombre }}</div>
                                            <div class="text-xs" style="color:#aaa;">{{ $user->email }}</div>
                                        </div>
                                        <div class="d-flex">
                                            <form method="POST" action="{{ route('admin.usuarios.rol', $user) }}">
                                                @csrf @method('PATCH')
                                                <button class="btn btn-sm btn-outline-light" title="Hacer Cliente">
                                                    <i class="fas fa-arrow-down"></i> Cliente
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.usuarios.destroy', $user) }}" onsubmit="return confirm('¿Eliminar administrador?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger ml-1">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-4 py-3 text-center" style="color:#aaa;">No hay administradores.</div>
                                @endforelse
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
        <div class="modal-header"><h5 class="modal-title">¿Listo para salir?</h5>
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
<script src="{{ asset('adminDashBoard/js/sb-admin-2.min.js') }}"></script>
<x-volverArriba />
</body>
</html>