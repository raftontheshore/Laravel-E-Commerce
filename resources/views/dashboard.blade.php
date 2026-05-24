<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Catacumbas">
    <meta name="author" content="Enzo">

    <title>SB Admin 2 - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('adminDashBoard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('adminDashBoard/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

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

    /* ── BORDES IZQUIERDOS DE CARDS ── */
    .border-left-primary { border-left: 4px solid #c0392b !important; }
    .border-left-success { border-left: 4px solid #09c762 !important; }
    .border-left-info    { border-left: 4px solid #c0392b !important; }
    .border-left-warning { border-left: 4px solid #e67e22 !important; }

    /* ── TABLAS ── */
    .table { color: #cccccc !important; }
    .table thead th {
        border-bottom: 2px solid #c0392b !important;
        color: #aaaaaa !important;
    }
    .table td, .table th { border-top: 1px solid #333333 !important; }
    .table-bordered { border: 1px solid #333333 !important; }

    /* ── PROGRESS BARS ── */
    .progress { background-color: #333333 !important; }

    /* ── FOOTER ── */
    .sticky-footer {
        background-color: #111111 !important;
        border-top: 1px solid #c0392b !important;
        color: #aaaaaa !important;
    }

    /* ── TEXTOS ── */
    .text-gray-800 { color: #ffffff !important; }

    /* ── DROPDOWN MENÚ ── */
    .dropdown-menu {
        background-color: #222222 !important;
        border: 1px solid #333333 !important;
    }
    .dropdown-item { color: #cccccc !important; }
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

    /* ── TEXTO PRIMARIO ── */
    .text-primary { color: #c0392b !important; }

    /* ══════════════════════════════════════
       SIDEBAR SUBMENÚS — estilos propios
    ══════════════════════════════════════ */

    /* Ítem padre con submenú */
    .nav-item.has-submenu > .nav-link {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }

    /* Flecha indicadora */
    .nav-item.has-submenu > .nav-link .submenu-arrow {
        font-size: 11px;
        transition: transform 0.25s ease;
        color: #888;
        flex-shrink: 0;
    }

    /* Rotar flecha cuando está abierto */
    .nav-item.has-submenu.open > .nav-link .submenu-arrow {
        transform: rotate(90deg);
        color: #c0392b;
    }

    /* Contenedor del submenú */
    .submenu {
        display: none;
        list-style: none;
        padding: 0;
        margin: 0;
        background-color: rgba(0,0,0,0.2);
        border-left: 3px solid #c0392b;
        margin-left: 1rem;
        border-radius: 0 4px 4px 0;
    }

    .nav-item.has-submenu.open > .submenu {
        display: block;
    }

    /* Ítems del submenú */
    .submenu li a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 7px 16px 7px 14px;
        font-size: 12px;
        color: #aaaaaa !important;
        text-decoration: none;
        transition: color 0.2s, background-color 0.2s;
        border-radius: 0 4px 4px 0;
    }

    .submenu li a:hover {
        color: #ffffff !important;
        background-color: rgba(192, 57, 43, 0.18);
    }

    .submenu li a.active {
        color: #e74c3c !important;
        font-weight: 600;
    }

    .submenu li a i {
        font-size: 12px;
        width: 14px;
        text-align: center;
        flex-shrink: 0;
    }

    /* Estado activo del ítem padre */
    .nav-item.has-submenu.open > .nav-link,
    .nav-item.has-submenu.active > .nav-link {
        color: #ffffff !important;
    }

    /* Ítem normal activo (sin submenú) */
    .nav-item.active-page > .nav-link {
        color: #ffffff !important;
        font-weight: 700;
    }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        {{-- ════════════════════════════════════
             SIDEBAR
        ════════════════════════════════════ --}}
        <x-admin-sidebar />

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                {{-- ════════ TOPBAR ════════ --}}
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group" style="background-color: #222; border: 1px solid #333; border-radius: 7px; overflow: hidden;">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0" style="background: transparent; color: #555;">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Buscar..." style="background-color: transparent; color: #ddd; box-shadow: none; outline: none;">
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nombre }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('adminDashBoard/img/undraw_profile.svg') }}">
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

                {{-- ════════ CONTENIDO ════════ --}}
                <div class="container-fluid">

                    {{-- Fila de cards de métricas --}}
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pedidos Pendientes
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ \App\Models\Orden::where('estado', 'pendiente')->count() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Dinero Recaudado
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                ${{ number_format(\App\Models\Orden::where('estado', 'pagado')->sum('total'), 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Usuarios Registrados
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ \App\Models\User::count() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pedidos Entregados
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ \App\Models\Orden::where('estado', 'entregado')->count() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Fila principal: últimos pedidos + top productos --}}
                    <div class="row">

                        <div class="col-lg-7 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Últimos Pedidos</h6>
                                    <a href="#" class="btn btn-sm btn-primary">Ver todos</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Pedido</th>
                                                    <th>Cliente</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(\App\Models\Orden::with('user')->latest()->take(5)->get() as $orden)
                                                <tr>
                                                    <td>#{{ $orden->id }}</td>
                                                    <td>{{ $orden->user->nombre ?? 'N/A' }}</td>
                                                    <td>${{ number_format($orden->total, 0, ',', '.') }}</td>
                                                    <td>
                                                        @switch($orden->estado)
                                                            @case('pendiente')
                                                                <span class="badge badge-warning">Pendiente</span>
                                                                @break
                                                            @case('pagado')
                                                                <span class="badge badge-success">Pagado</span>
                                                                @break
                                                            @case('enviado')
                                                                <span class="badge badge-info">Enviado</span>
                                                                @break
                                                            @case('entregado')
                                                                <span class="badge badge-primary">Entregado</span>
                                                                @break
                                                            @case('cancelado')
                                                                <span class="badge badge-danger">Cancelado</span>
                                                                @break
                                                            @default
                                                                <span class="badge badge-secondary">{{ $orden->estado }}</span>
                                                        @endswitch
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 5 Productos Vendidos</h6>
                                </div>
                                <div class="card-body">
                                    @php
                                        $topProductos = \App\Models\ItemOrden::select('id_producto', \Illuminate\Support\Facades\DB::raw('SUM(cantidad) as total_vendido'))
                                            ->groupBy('id_producto')
                                            ->orderByDesc('total_vendido')
                                            ->take(5)
                                            ->with('producto')
                                            ->get();
                                    @endphp

                                    @forelse($topProductos as $index => $item)
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="mr-3">
                                                <span class="badge badge-primary">{{ $index + 1 }}</span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-gray-800">
                                                    {{ $item->producto->nombre ?? 'Producto eliminado' }}
                                                </div>
                                                <div class="text-xs text-gray-500">Ranking #{{ $index + 1 }}</div>
                                            </div>
                                            <div class="ml-auto font-weight-bold text-gray-800">
                                                {{ $item->total_vendido }} uds.
                                            </div>
                                        </div>
                                        @if(!$loop->last)<hr style="border-color: #2a3a5c;">@endif
                                    @empty
                                        <p class="text-center text-gray-500 mb-0">No hay ventas registradas aún.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Últimas Consultas --}}
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Últimas Consultas</h6>
                                    <a href="#" class="btn btn-sm btn-primary">Ver todas</a>
                                </div>
                                <div class="card-body p-0">
                                    @forelse(\App\Models\Consulta::with('user')->latest()->take(5)->get() as $consulta)
                                        <div class="d-flex align-items-start px-4 py-3" style="border-bottom: 1px solid #2a3a5c;">
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <span class="font-weight-bold small text-gray-800">
                                                        {{ $consulta->user->nombre ?? 'Usuario eliminado' }}
                                                    </span>
                                                    <span class="text-xs text-gray-500">
                                                        {{ $consulta->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                <div class="small font-weight-bold text-primary mt-1">
                                                    {{ $consulta->asunto }}
                                                </div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ \Illuminate\Support\Str::limit($consulta->mensaje, 60) }}
                                                </div>
                                                <div class="mt-1">
                                                    @switch($consulta->estado)
                                                        @case('abierta')
                                                            <span class="badge badge-success">Abierta</span>
                                                            @break
                                                        @case('en_proceso')
                                                            <span class="badge badge-warning">En proceso</span>
                                                            @break
                                                        @case('cerrada')
                                                            <span class="badge badge-secondary">Cerrada</span>
                                                            @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="px-4 py-3 text-center text-gray-500">
                                            No hay consultas registradas aún.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- FIN container-fluid --}}

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Catacumbas 2026</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- Modal Logout --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar sesión" abajo si estás listo para terminar tu sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('adminDashBoard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('adminDashBoard/js/demo/chart-pie-demo.js') }}"></script>

    <script>
        function toggleSubmenu(link) {
            var parentLi = link.closest('.has-submenu');
            var isOpen   = parentLi.classList.contains('open');

            // Cerrar todos los abiertos excepto el actual
            document.querySelectorAll('.has-submenu.open').forEach(function(el) {
                if (el !== parentLi) el.classList.remove('open');
            });

            parentLi.classList.toggle('open', !isOpen);
        }
    </script>

    <x-volverArriba />
</body>
</html>