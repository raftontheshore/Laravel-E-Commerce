<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Catacumbas - Pedidos">
    <meta name="author" content="Enzo">

    <title>Catacumbas - Gestión de Pedidos</title>
    
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
        .card .text-gray-800, .card .h5 { color: #ffffff !important; }
        .card .text-gray-500, .card .text-xs { color: #aaaaaa !important; }

        .table { color: #cccccc !important; }
        .table thead th {
            border-bottom: 2px solid #c0392b !important;
            color: #aaaaaa !important;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            font-weight: 700;
        }
        .table td, .table th { border-top: 1px solid #2a2a2a !important; vertical-align: middle !important; }
        .table-hover tbody tr:hover { background-color: #2a2a2a !important; }
        .table-bordered { border: 1px solid #333333 !important; }

        .btn-primary { background-color: #c0392b !important; border-color: #c0392b !important; }
        .btn-primary:hover { background-color: #e74c3c !important; border-color: #e74c3c !important; }
        .btn-outline-light { color: #cccccc; border-color: #555555; }
        .btn-outline-light:hover { background-color: #333333; color: #ffffff; border-color: #aaaaaa; }

        .text-primary { color: #c0392b !important; }
        .sticky-footer {
            background-color: #111111 !important;
            border-top: 1px solid #c0392b !important;
            color: #aaaaaa !important;
        }

        /* ── BADGES DE ESTADO ── */
.badge-pendiente  { background-color: #7a4a10; color: #fff; }
.badge-confirmado { background-color: #5a4a00; color: #fff; }
.badge-pagado     { background-color: #0a5c30; color: #fff; }
.badge-enviado    { background-color: #0a3a6a; color: #fff; }
.badge-entregado  { background-color: #4a1a6a; color: #fff; }
.badge-cancelado  { background-color: #6a1010; color: #fff; }

        /* ── FILTROS PILL ── */
        .filtro-pill {
            border-radius: 20px !important;
            font-size: 0.78rem !important;
            padding: 4px 14px !important;
            font-weight: 600;
            transition: all 0.15s;
            text-decoration: none !important;
        }
        .filtro-pill:hover { opacity: 0.85; }

        /* ── SELECT DE ESTADO ── */
        .estado-select {
            background-color: #1a1a1a;
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 0.82rem;
            cursor: pointer;
            outline: none;
            width: 100%;
            transition: border-color 0.2s;
        }
        .estado-select option { background-color: #1a1a1a; }

        /* ── PAGINACIÓN ── */
        .pagination .page-link {
            background-color: #222 !important;
            border-color: #333 !important;
            color: #ccc !important;
        }
        .pagination .page-link:hover {
            background-color: #c0392b !important;
            border-color: #c0392b !important;
            color: #fff !important;
        }
        .pagination .page-item.active .page-link {
            background-color: #c0392b !important;
            border-color: #c0392b !important;
        }
        .pagination .page-item.disabled .page-link { color: #555 !important; }

        /* ── INPUT DARK ── */
        .input-dark {
            background-color: #1a1a1a !important;
            border: 1px solid #444444 !important;
            color: #ffffff !important;
        }
        .input-dark:focus {
            background-color: #1a1a1a !important;
            border-color: #c0392b !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 0.15rem rgba(192,57,43,0.25) !important;
        }
        .input-dark option { background-color: #222222; color: #ffffff; }

        /* ── EMPTY STATE ── */
        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: #555;
        }
        .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; color: #333; }
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nombre ?? 'Admin' }}</span>

                                    @php
                                        $nombreCompleto = auth()->user()->nombre ?? '';
                                        $partes = explode(' ', trim($nombreCompleto));
                                        $iniciales = strtoupper(
                                            substr($partes[0], 0, 1) . (isset($partes[1]) ? substr($partes[1], 0, 1) : '')
                                        );
                                    @endphp

                                    <div style="width:36px; height:36px; border-radius:50%; background:#c0392b;
                                                border:2px solid #3a0a0a; display:flex; align-items:center;
                                                justify-content:center; font-size:13px; font-weight:700;
                                                color:#fff; cursor:pointer; letter-spacing:0.5px; flex-shrink:0;">
                                        {{ $iniciales }}
                                    </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown"
                                style="background-color:#222;border:1px solid #333;">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"
                                style="color:#ccc;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
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
                                <i class="fas fa-shopping-bag mr-2" style="color:#c0392b;"></i>Pedidos
                            </h1>
                            <small style="color:#666;">Gestión y seguimiento de órdenes de la tienda.</small>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert" style="background-color: rgba(9,199,98,0.1); border-color: #09c762; color: #09c762;">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- FILTROS PILL --}}
                    @php
                      $estadosInfo = [
    'pendiente'  => ['badge' => 'badge-pendiente',  'bg' => '#7a4a10', 'label' => 'Pendiente'],
    'confirmado' => ['badge' => 'badge-confirmado', 'bg' => '#5a4a00', 'label' => 'Confirmado'],
    'pagado'     => ['badge' => 'badge-pagado',     'bg' => '#0a5c30', 'label' => 'Pagado'],
    'enviado'    => ['badge' => 'badge-enviado',    'bg' => '#0a3a6a', 'label' => 'Enviado'],
    'entregado'  => ['badge' => 'badge-entregado',  'bg' => '#4a1a6a', 'label' => 'Entregado'],
    'cancelado'  => ['badge' => 'badge-cancelado',  'bg' => '#6a1010', 'label' => 'Cancelado'],
];
                    @endphp

                 <div class="mb-3 d-flex flex-wrap" style="gap: 8px;">
    <a href="{{ route('admin.pedidos.index') }}"
       class="filtro-pill btn btn-sm"
       style="
           border: 1px solid {{ !request('estado') ? '#c0392b' : '#444' }};
           color: {{ !request('estado') ? '#fff' : '#888' }};
           background-color: {{ !request('estado') ? '#c0392b' : 'transparent' }};
       ">
        Todos
    </a>
    @foreach($estadosInfo as $slug => $info)
    <a href="{{ route('admin.pedidos.index', ['estado' => $slug]) }}"
       class="filtro-pill btn btn-sm"
       style="
           background-color: {{ request('estado') === $slug ? '#c0392b' : 'transparent' }};
           border: 1px solid {{ request('estado') === $slug ? '#c0392b' : '#444' }};
           color: {{ request('estado') === $slug ? '#fff' : '#888' }};
       ">
        {{ $info['label'] }}
    </a>
    @endforeach
</div>

                    {{-- TABLA --}}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-list mr-2"></i>Listado general
                                @if(request('estado'))
                                    <span class="ml-2" style="font-size:0.8rem;color:#888;font-weight:400;">
                                        — {{ $estadosInfo[request('estado')]['label'] ?? '' }}
                                    </span>
                                @endif
                            </h6>
                            <span style="color:#666;font-size:0.8rem;">{{ $ordenes->total() }} pedido(s)</span>
                        </div>

                        <div class="card-body p-0">
                            @if($ordenes->isEmpty())
                                <div class="empty-state">
                                    <i class="fas fa-box-open"></i>
                                    <p class="mb-1" style="color:#666;font-size:1rem;">No hay pedidos registrados.</p>
                                </div>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>N° Pedido</th>
                                            <th>Cliente</th>
                                            <th>Total</th>
                                            <th class="text-center">Estado Actual</th>
                                            <th>Modificar Estado</th>
                                            <th class="text-center">Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ordenes as $orden)
                                        <tr>
                                            <td class="font-weight-bold" style="color:#fff;">#{{ $orden->id }}</td>
                                            <td style="color:#ccc;">{{ $orden->usuario->nombre ?? 'N/A' }}</td>
                                            <td style="color:#09c762;font-weight:700;">${{ number_format($orden->total, 0, ',', '.') }}</td>

                                            <td class="text-center">
                                                @php $info = $estadosInfo[$orden->estado] ?? null; @endphp
                                                @if($info)
                                                    <span class="badge {{ $info['badge'] }}">{{ $info['label'] }}</span>
                                                @else
                                                    <span class="badge" style="background:#555;color:#fff;">{{ ucfirst($orden->estado) }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form method="POST" action="{{ route('admin.pedidos.estado', $orden->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    @php $colorActual = $estadosInfo[$orden->estado]['bg'] ?? '#aaa'; @endphp
                                                    <select name="estado" onchange="this.form.submit()"
    class="estado-select input-dark"
    style="border: 1px solid #444; color: #ccc;">
    @foreach($estadosInfo as $slug => $info)
        <option value="{{ $slug }}"
            {{ $orden->estado === $slug ? 'selected' : '' }}>
            {{ $info['label'] }}
        </option>
    @endforeach
</select>
                                                </form>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.pedidos.show', $orden->id) }}" class="btn btn-sm btn-outline-light">
                                                    <i class="fas fa-eye mr-1"></i> Ver Detalle
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>

                        @if($ordenes->hasPages())
                        <div class="card-footer" style="background:#1e1e1e;border-top:1px solid #2a2a2a;">
                            <div class="d-flex justify-content-between align-items-center">
                                <small style="color:#555;">
                                    Página {{ $ordenes->currentPage() }} de {{ $ordenes->lastPage() }}
                                </small>
                                {{ $ordenes->appends(request()->query())->links() }}
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
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
    {{-- MODAL LOGOUT --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="background:#222;color:#fff;">
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
            </div>
        </div>
    </div>

    <script src="{{ asset('adminDashBoard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/js/sb-admin-2.min.js') }}"></script>
</body>
</html>