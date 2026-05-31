<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos - Catacumbas Admin</title>

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

        body, #content-wrapper, #content { background-color: #1a1a1a !important; }

        .sidebar-dark.bg-gradient-primary,
        .bg-gradient-primary {
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

        .border-left-primary { border-left: 4px solid #c0392b !important; }
        .border-left-success  { border-left: 4px solid #09c762 !important; }
        .border-left-warning  { border-left: 4px solid #e67e22 !important; }
        .border-left-info     { border-left: 4px solid #3498db !important; }

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

        .sticky-footer {
            background-color: #111111 !important;
            border-top: 1px solid #c0392b !important;
            color: #aaaaaa !important;
        }

        .text-gray-800 { color: #ffffff !important; }

        .dropdown-menu { background-color: #222222 !important; border: 1px solid #333333 !important; }
        .dropdown-item { color: #cccccc !important; }
        .dropdown-item:hover { background-color: #c0392b !important; color: #ffffff !important; }

        .btn-primary { background-color: #c0392b !important; border-color: #c0392b !important; }
        .btn-primary:hover { background-color: #e74c3c !important; border-color: #e74c3c !important; }
        .text-primary { color: #c0392b !important; }

        /* ── FILTROS ── */
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
        .input-dark::placeholder { color: #555 !important; }
        .input-dark option { background-color: #222222; color: #ffffff; }

        /* ── BADGES ── */
        .badge-condicion-nuevo         { background-color: #09c762; color: #fff; }
        .badge-condicion-usado         { background-color: #e67e22; color: #fff; }
        .badge-condicion-reacondicionado { background-color: #3498db; color: #fff; }

        .badge-activo   { background-color: rgba(9,199,98,0.15); color: #09c762; border: 1px solid #09c762; }
        .badge-inactivo { background-color: rgba(192,57,43,0.15); color: #e74c3c; border: 1px solid #e74c3c; }

        /* ── IMAGEN MINIATURA ── */
        .prod-thumb {
            width: 44px;
            height: 44px;
            object-fit: contain;
            background: #111;
            border-radius: 6px;
            border: 1px solid #333;
            padding: 2px;
        }
        .prod-thumb-placeholder {
            width: 44px;
            height: 44px;
            background: #1a1a1a;
            border: 1px dashed #444;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #444;
            font-size: 18px;
        }

        /* ── ACCIONES ── */
        .btn-accion {
            width: 30px;
            height: 30px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            font-size: 13px;
            transition: background .15s, transform .1s;
        }
        .btn-accion:hover { transform: scale(1.1); }
        .btn-edit  { background-color: #2c3e50; border: 1px solid #3d5166; color: #aaa; }
        .btn-edit:hover  { background-color: #3d5166; color: #fff; }
        .btn-del   { background-color: rgba(192,57,43,0.15); border: 1px solid #c0392b; color: #c0392b; }
        .btn-del:hover   { background-color: #c0392b; color: #fff; }
        .btn-view  { background-color: rgba(52,152,219,0.15); border: 1px solid #3498db; color: #3498db; }
        .btn-view:hover  { background-color: #3498db; color: #fff; }

        /* ── STOCK BAJO ── */
        .stock-bajo { color: #e74c3c !important; font-weight: 700; }
        .stock-ok   { color: #09c762 !important; }

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

        /* ── STATS CARDS ── */
        .stat-value { font-size: 1.6rem; font-weight: 800; line-height: 1; }
        .stat-label { font-size: 0.68rem; text-transform: uppercase; letter-spacing: .07em; color: #888; margin-top: 4px; }

        /* ── FILTROS PANEL ── */
        .filter-panel {
            background: #1e1e1e;
            border: 1px solid #2d2d2d;
            border-radius: 8px;
            padding: 16px 20px;
            margin-bottom: 20px;
        }

        /* ── PRECIO TACHADO ── */
        .precio-original-tachado {
            text-decoration: line-through;
            color: #555;
            font-size: 0.78rem;
        }
        .precio-final { font-weight: 700; color: #09c762; }

        /* ── EMPTY STATE ── */
        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: #555;
        }
        .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; color: #333; }
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
                            <i class="fas fa-box mr-2" style="color:#c0392b;"></i>Productos
                        </h1>
                        <small style="color:#666;">{{ $productos->total() }} productos en total</small>
                    </div>
                    <a href="{{ route('admin.productos.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm mr-1"></i> Nuevo Producto
                    </a>
                </div>

                {{-- STATS RÁPIDAS --}}
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="stat-label">Total Productos</div>
                                        <div class="stat-value text-white">{{ $totalProductos }}</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-box fa-2x" style="color:#333;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="stat-label">Activos</div>
                                        <div class="stat-value" style="color:#09c762;">{{ $totalActivos }}</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-check-circle fa-2x" style="color:#333;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="stat-label">Stock Bajo</div>
                                        <div class="stat-value" style="color:#e67e22;">{{ $stockBajo }}</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-exclamation-triangle fa-2x" style="color:#333;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="stat-label">Sin Stock</div>
                                        <div class="stat-value" style="color:#e74c3c;">{{ $sinStock }}</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-times-circle fa-2x" style="color:#333;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- FILTROS --}}
                <div class="filter-panel">
                    <form method="GET" action="{{ route('admin.productos.index') }}" id="filtros-form">
                        <div class="row align-items-end">

                            {{-- Búsqueda --}}
                            <div class="col-lg-3 col-md-6 mb-2">
                                <label style="color:#888;font-size:0.72rem;text-transform:uppercase;letter-spacing:.05em;font-weight:700;">Buscar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background:#111;border-color:#444;color:#555;">
                                            <i class="fas fa-search fa-sm"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="q" value="{{ request('q') }}"
                                        class="form-control input-dark"
                                        placeholder="Nombre, marca, consola...">
                                </div>
                            </div>

                            {{-- Categoría --}}
                            <div class="col-lg-2 col-md-6 mb-2">
                                <label style="color:#888;font-size:0.72rem;text-transform:uppercase;letter-spacing:.05em;font-weight:700;">Categoría</label>
                                <select name="categoria" class="form-control input-dark">
                                    <option value="">Todas</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Condición --}}
                            <div class="col-lg-2 col-md-4 mb-2">
                                <label style="color:#888;font-size:0.72rem;text-transform:uppercase;letter-spacing:.05em;font-weight:700;">Condición</label>
                                <select name="condicion" class="form-control input-dark">
                                    <option value="">Todas</option>
                                    <option value="nuevo"           {{ request('condicion') === 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                                    <option value="usado"           {{ request('condicion') === 'usado' ? 'selected' : '' }}>Usado</option>
                                    <option value="reacondicionado" {{ request('condicion') === 'reacondicionado' ? 'selected' : '' }}>Reacondicionado</option>
                                </select>
                            </div>

                            {{-- Estado --}}
                            <div class="col-lg-2 col-md-4 mb-2">
                                <label style="color:#888;font-size:0.72rem;text-transform:uppercase;letter-spacing:.05em;font-weight:700;">Estado</label>
                                <select name="activo" class="form-control input-dark">
                                    <option value="">Todos</option>
                                    <option value="1" {{ request('activo') === '1' ? 'selected' : '' }}>Activos</option>
                                    <option value="0" {{ request('activo') === '0' ? 'selected' : '' }}>Inactivos</option>
                                </select>
                            </div>

                            {{-- Ordenar --}}
                            <div class="col-lg-2 col-md-4 mb-2">
                                <label style="color:#888;font-size:0.72rem;text-transform:uppercase;letter-spacing:.05em;font-weight:700;">Ordenar por</label>
                                <select name="orden" class="form-control input-dark">
                                    <option value="reciente"  {{ request('orden', 'reciente') === 'reciente'  ? 'selected' : '' }}>Más reciente</option>
                                    <option value="nombre"    {{ request('orden') === 'nombre'    ? 'selected' : '' }}>Nombre A-Z</option>
                                    <option value="precio_asc" {{ request('orden') === 'precio_asc' ? 'selected' : '' }}>Precio ↑</option>
                                    <option value="precio_desc"{{ request('orden') === 'precio_desc'? 'selected' : '' }}>Precio ↓</option>
                                    <option value="stock"     {{ request('orden') === 'stock'     ? 'selected' : '' }}>Stock ↑</option>
                                </select>
                            </div>

                            {{-- Botones --}}
                            <div class="col-lg-1 col-md-12 mb-2 d-flex gap-2" style="gap:8px;">
                                <button type="submit" class="btn btn-primary btn-block" title="Filtrar">
                                    <i class="fas fa-filter"></i>
                                </button>
                                <a href="{{ route('admin.productos.index') }}" class="btn btn-block"
                                   style="background:#2a2a2a;border:1px solid #444;color:#aaa;" title="Limpiar">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>

                {{-- TABLA --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-list mr-2"></i>Listado de Productos
                        </h6>
                        <span style="color:#666;font-size:0.8rem;">
                            Mostrando {{ $productos->firstItem() }}–{{ $productos->lastItem() }} de {{ $productos->total() }}
                        </span>
                    </div>

                    <div class="card-body p-0">
                        @if($productos->isEmpty())
                            <div class="empty-state">
                                <i class="fas fa-box-open"></i>
                                <p class="mb-1" style="color:#666;font-size:1rem;">No se encontraron productos</p>
                                <small style="color:#444;">Probá ajustando los filtros o <a href="{{ route('admin.productos.create') }}" style="color:#c0392b;">agregá uno nuevo</a>.</small>
                            </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:56px;">Img</th>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th>Consola</th>
                                        <th>Condición</th>
                                        <th>Precio</th>
                                        <th style="width:80px;">Stock</th>
                                        <th style="width:80px;">Estado</th>
                                        <th style="width:110px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        {{-- Imagen --}}
                                        <td>
                                            @if($producto->url_imagen)
                                                <img src="{{ $producto->url_imagen }}"
                                                     alt="{{ $producto->nombre }}"
                                                     class="prod-thumb"
                                                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                                <div class="prod-thumb-placeholder" style="display:none;">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @else
                                                <div class="prod-thumb-placeholder">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                        </td>

                                        {{-- Nombre + marca --}}
                                        <td>
                                            <div style="font-weight:600;color:#fff;font-size:0.88rem;line-height:1.3;">
                                                {{ $producto->nombre }}
                                            </div>
                                            <div style="color:#666;font-size:0.75rem;">{{ $producto->marca }}</div>
                                        </td>

                                        {{-- Categoría --}}
                                        <td>
                                            <span style="color:#aaa;font-size:0.82rem;">
                                                {{ $producto->categoria->nombre ?? '—' }}
                                            </span>
                                        </td>

                                        {{-- Consola --}}
                                        <td>
                                            <span style="background:#1a1a1a;border:1px solid #333;border-radius:4px;padding:2px 8px;font-size:0.75rem;color:#bbb;">
                                                {{ $producto->consola }}
                                            </span>
                                        </td>

                                        {{-- Condición --}}
                                        <td>
                                            @switch($producto->condicion)
                                                @case('nuevo')
                                                    <span class="badge badge-condicion-nuevo">Nuevo</span>
                                                    @break
                                                @case('usado')
                                                    <span class="badge badge-condicion-usado">Usado</span>
                                                    @break
                                                @case('reacondicionado')
                                                    <span class="badge badge-condicion-reacondicionado">Reac.</span>
                                                    @break
                                            @endswitch
                                        </td>

                                        {{-- Precio --}}
                                        <td>
                                            @if($producto->porcentaje_descuento > 0)
                                                <div class="precio-original-tachado">${{ number_format($producto->precio_original, 0, ',', '.') }}</div>
                                            @endif
                                            <div class="precio-final">${{ number_format($producto->precio, 0, ',', '.') }}</div>
                                            @if($producto->porcentaje_descuento > 0)
                                                <div style="font-size:0.7rem;color:#c0392b;">-{{ $producto->porcentaje_descuento }}%</div>
                                            @endif
                                        </td>

                                        {{-- Stock --}}
                                        <td class="text-center">
                                            @if($producto->stock == 0)
                                                <span class="stock-bajo">0</span>
                                                <div style="font-size:0.65rem;color:#e74c3c;">Sin stock</div>
                                            @elseif($producto->stock <= $producto->stock_bajo)
                                                <span class="stock-bajo">{{ $producto->stock }}</span>
                                                <div style="font-size:0.65rem;color:#e67e22;">Stock bajo</div>
                                            @else
                                                <span class="stock-ok">{{ $producto->stock }}</span>
                                            @endif
                                        </td>

                                        {{-- Estado --}}
                                        <td class="text-center">
                                            @if($producto->activo)
                                                <span class="badge badge-activo">Activo</span>
                                            @else
                                                <span class="badge badge-inactivo">Inactivo</span>
                                            @endif
                                        </td>

                                        {{-- Acciones --}}
                                        <td>
                                            <div class="d-flex" style="gap:5px;">
                                                {{-- Ver --}}
                                                <a href="{{ route('admin.productos.show', $producto->id) }}" 
                                                class="btn btn-info btn-sm" title="Ver detalle">
                                                <i class="fas fa-eye"></i>
                                                </a>
                                                {{-- Editar --}}
                                                <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                                   class="btn-accion btn-edit" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- Eliminar --}}
                                                <button type="button"
                                                    class="btn-accion btn-del"
                                                    title="Eliminar"
                                                    onclick="confirmarEliminar({{ $producto->id }}, '{{ addslashes($producto->nombre) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>

                    {{-- PAGINACIÓN --}}
                    @if($productos->hasPages())
                    <div class="card-footer" style="background:#1e1e1e;border-top:1px solid #2a2a2a;">
                        <div class="d-flex justify-content-between align-items-center">
                            <small style="color:#555;">
                                Página {{ $productos->currentPage() }} de {{ $productos->lastPage() }}
                            </small>
                            {{ $productos->appends(request()->query())->links() }}
                        </div>
                    </div>
                    @endif
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

{{-- MODAL ELIMINAR --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="background:#222;color:#fff;border:1px solid #c0392b;">
            <div class="modal-header" style="border-bottom:1px solid #333;">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle mr-2" style="color:#c0392b;"></i>
                    Eliminar Producto
                </h5>
                <button class="close text-white" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p style="color:#ccc;margin-bottom:4px;">¿Eliminás el producto?</p>
                <strong id="delete-nombre" style="color:#fff;"></strong>
                <p class="mt-2 mb-0" style="color:#888;font-size:0.8rem;">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer" style="border-top:1px solid #333;">
                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <form id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash mr-1"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
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

<script>
    function confirmarEliminar(id, nombre) {
        document.getElementById('delete-nombre').textContent = nombre;
        document.getElementById('delete-form').action = '/admin/productos/' + id;
        $('#deleteModal').modal('show');
    }

    // Auto-submit filtros al cambiar selects
    document.querySelectorAll('#filtros-form select').forEach(function(el) {
        el.addEventListener('change', function() {
            document.getElementById('filtros-form').submit();
        });
    });
</script>

</body>
</html>