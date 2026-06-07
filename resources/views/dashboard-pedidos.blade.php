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

        /* ── FONDO GENERAL ── */
        body, #content-wrapper, #content { background-color: #1a1a1a !important; }

        /* ── SIDEBAR & TOPBAR ── */
        .sidebar-dark.bg-gradient-primary, .bg-gradient-primary {
            background: linear-gradient(180deg, #111111 0%, #1a1a1a 100%) !important;
            border-right: 1px solid #c0392b !important;
        }
        .topbar.navbar-light.bg-white, nav.navbar {
            background-color: #111111 !important;
            border-bottom: 1px solid #c0392b !important;
        }
        .topbar .text-gray-600, .navbar-nav .nav-link { color: #cccccc !important; }

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
        .card .text-gray-800, .card .h5 { color: #ffffff !important; }

        /* ── TABLAS ── */
        .table { color: #cccccc !important; vertical-align: middle; }
        .table thead th {
            border-bottom: 2px solid #c0392b !important;
            color: #aaaaaa !important;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }
        .table td, .table th { 
            border-top: 1px solid #333333 !important; 
            vertical-align: middle !important;
        }
        .table-bordered { border: 1px solid #333333 !important; }

        /* ── FORMULARIOS OSCUROS ── */
        .form-control-dark {
            background-color: #111111 !important;
            border: 1px solid #333333 !important;
            color: #cccccc !important;
        }
        .form-control-dark:focus {
            background-color: #1a1a1a !important;
            border-color: #c0392b !important;
            box-shadow: 0 0 0 0.2rem rgba(192, 57, 43, 0.25) !important;
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
        .btn-outline-light {
            color: #cccccc;
            border-color: #555555;
        }
        .btn-outline-light:hover {
            background-color: #333333;
            color: #ffffff;
            border-color: #aaaaaa;
        }

        .text-primary { color: #c0392b !important; }
        .sticky-footer {
            background-color: #111111 !important;
            border-top: 1px solid #c0392b !important;
            color: #aaaaaa !important;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <x-admin-sidebar />

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Buscador topbar -->
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nombre ?? 'Admin' }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('adminDashBoard/img/undraw_profile.svg') }}">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h1 class="h3 mb-1 text-gray-800">Pedidos</h1>
                            <p class="mb-0 text-gray-500 small">Gestión y seguimiento de órdenes de la tienda.</p>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" style="background-color: rgba(9, 199, 98, 0.1); border-color: #09c762; color: #09c762;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listado general</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
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
                                        @forelse($ordenes as $orden)
                                        <tr>
                                            <td class="font-weight-bold">#{{ $orden->id }}</td>
                                            <td>{{ $orden->usuario->nombre ?? 'N/A' }}</td>
                                            <td>${{ number_format($orden->total, 0, ',', '.') }}</td>
                                            
                                            <td class="text-center">
                                                @php
                                                    $colores = [
                                                        'pendiente' => ['bg' => 'rgba(230,126,34,.15)', 'color' => '#e67e22'],
                                                        'pagado'    => ['bg' => 'rgba(9,199,98,.15)', 'color' => '#09c762'],
                                                        'enviado'   => ['bg' => 'rgba(52,152,219,.15)', 'color' => '#3498db'],
                                                        'entregado' => ['bg' => 'rgba(155,89,182,.15)', 'color' => '#9b59b6'],
                                                        'cancelado' => ['bg' => 'rgba(231,76,60,.15)', 'color' => '#e74c3c'],
                                                    ];
                                                    $c = $colores[$orden->estado] ?? $colores['pendiente'];
                                                @endphp
                                                <span class="badge px-2 py-1" style="background-color: {{ $c['bg'] }}; color: {{ $c['color'] }}; border: 1px solid {{ $c['color'] }};">
                                                    {{ ucfirst($orden->estado) }}
                                                </span>
                                            </td>

                                            <td>
                                                <form method="POST" action="{{ route('admin.pedidos.estado', $orden->id) }}">
                                                    @csrf 
                                                    @method('PATCH')
                                                    <select name="estado" class="form-control form-control-sm form-control-dark" onchange="this.form.submit()">
                                                        @foreach(['pendiente', 'pagado', 'enviado', 'entregado', 'cancelado'] as $e)
                                                            <option value="{{ $e }}" {{ $orden->estado == $e ? 'selected' : '' }}>
                                                                {{ ucfirst($e) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.pedidos.show', $orden->id) }}" class="btn btn-sm btn-outline-light">
                                                    Ver Detalle
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-gray-500 py-4">
                                                <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                                                No hay pedidos registrados.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                {{ $ordenes->links() }}
                            </div>

                        </div>
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

    <script src="{{ asset('adminDashBoard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('adminDashBoard/js/sb-admin-2.min.js') }}"></script>
</body>
</html>