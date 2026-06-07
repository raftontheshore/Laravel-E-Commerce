<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Catacumbas - Detalle de Pedido">
    <meta name="author" content="Enzo">

    <title>Catacumbas - Detalle del Pedido #{{ $orden->id }}</title>
    
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

        .btn-outline-light {
            color: #cccccc;
            border-color: #555555;
        }
        .btn-outline-light:hover {
            background-color: #333333;
            color: #ffffff;
            border-color: #aaaaaa;
        }
        
        .info-box {
            background-color: #111111;
            border: 1px solid #333333;
            border-radius: 8px;
            padding: 1.5rem;
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
                    <!-- Igual que en el index -->
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
                            <h1 class="h3 mb-1 text-gray-800">Pedido #{{ $orden->id }}</h1>
                            <p class="mb-0 text-gray-500 small">Creado el {{ $orden->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <a href="{{ route('admin.pedidos.index') }}" class="btn btn-sm btn-outline-light shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver a Pedidos
                        </a>
                    </div>

                    <div class="row">
                        <!-- Información del Cliente -->
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Información del Cliente</h6>
                                </div>
                                <div class="card-body info-box m-3">
                                    <div class="mb-3">
                                        <div class="text-xs font-weight-bold text-gray-500 text-uppercase mb-1">Nombre Completo</div>
                                        <div class="h6 mb-0 text-gray-200">{{ $orden->usuario->nombre ?? 'Usuario eliminado' }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="text-xs font-weight-bold text-gray-500 text-uppercase mb-1">Correo Electrónico</div>
                                        <div class="h6 mb-0 text-gray-200">{{ $orden->usuario->email ?? 'N/A' }}</div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="text-xs font-weight-bold text-gray-500 text-uppercase mb-1">Estado de la Orden</div>
                                        <div class="h6 mb-0 text-gray-200">{{ ucfirst($orden->estado) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detalle de Productos -->
                        <div class="col-lg-8 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Productos Adquiridos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orden->items as $item)
                                                <tr>
                                                    <td class="font-weight-bold text-gray-200">{{ $item->producto->nombre ?? 'Producto Eliminado' }}</td>
                                                    <td class="text-center">{{ $item->cantidad }}</td>
                                                    <td>${{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                                                    <td class="text-primary font-weight-bold">${{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr style="background-color: #111111;">
                                                    <td colspan="3" class="text-right font-weight-bold text-gray-400 text-uppercase">Total General:</td>
                                                    <td class="font-weight-bold text-white h5 mb-0">${{ number_format($orden->total, 0, ',', '.') }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
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