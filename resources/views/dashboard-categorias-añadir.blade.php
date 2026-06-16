<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Categorías - Catacumbas</title>

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
        .sidebar-dark.bg-gradient-primary, .bg-gradient-primary {
            background: linear-gradient(180deg, #111111 0%, #1a1a1a 100%) !important;
            border-right: 1px solid #c0392b !important;
        }
        .topbar.navbar-light.bg-white, nav.navbar {
            background-color: #111111 !important;
            border-bottom: 1px solid #c0392b !important;
        }
        .topbar .text-gray-600, .navbar-nav .nav-link { color: #cccccc !important; }
        .card { background-color: #222222 !important; border: 1px solid #333333 !important; color: #ffffff !important; }
        .card-header { background-color: #2a2a2a !important; border-bottom: 1px solid #c0392b !important; }
        .card .text-gray-800, .card .h5 { color: #ffffff !important; }
        .card .text-gray-500, .card .text-xs { color: #aaaaaa !important; }
        .border-left-primary { border-left: 4px solid #c0392b !important; }
        .table { color: #cccccc !important; }
        .table thead th { border-bottom: 2px solid #c0392b !important; color: #aaaaaa !important; }
        .table td, .table th { border-top: 1px solid #333333 !important; vertical-align: middle !important; }
        .table-bordered { border: 1px solid #333333 !important; }
        .sticky-footer { background-color: #111111 !important; border-top: 1px solid #c0392b !important; color: #aaaaaa !important; }
        .text-gray-800 { color: #ffffff !important; }
        .dropdown-menu { background-color: #222222 !important; border: 1px solid #333333 !important; }
        .dropdown-item { color: #cccccc !important; }
        .dropdown-item:hover { background-color: #c0392b !important; color: #ffffff !important; }
        .btn-primary { background-color: #c0392b !important; border-color: #c0392b !important; }
        .btn-primary:hover { background-color: #e74c3c !important; border-color: #e74c3c !important; }
        .text-primary { color: #c0392b !important; }

        /* ── MODALES ── */
        .modal-content {
            background-color: #222222 !important;
            border: 1px solid #333333 !important;
            color: #ffffff !important;
        }
        .modal-header {
            background-color: #2a2a2a !important;
            border-bottom: 1px solid #c0392b !important;
        }
        .modal-footer {
            background-color: #2a2a2a !important;
            border-top: 1px solid #333333 !important;
        }
        .modal-title { color: #ffffff !important; }
        .close { color: #ffffff !important; text-shadow: none !important; }

        /* ── INPUTS ── */
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
        .input-dark::placeholder { color: #666666 !important; }

        /* ── SWITCH ── */
        .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #c0392b !important;
            border-color: #c0392b !important;
        }

        /* ── BADGES ── */
        .badge-activo   { background-color: #09c762; color: #fff; padding: 4px 10px; border-radius: 10px; }
        .badge-inactivo { background-color: #555555; color: #fff; padding: 4px 10px; border-radius: 10px; }

        /* ── ALERT ── */
        .alert-success-custom {
            background-color: rgba(9,199,98,0.15) !important;
            border-left: 4px solid #09c762 !important;
            color: #a9f5c8 !important;
        }
        .alert-error-custom {
            background-color: rgba(192,57,43,0.15) !important;
            border-left: 4px solid #c0392b !important;
            color: #f5b7b1 !important;
        }

        /* ── BUSCADOR ── */
        .search-dark {
            background-color: #1a1a1a !important;
            border: 1px solid #444 !important;
            color: #fff !important;
        }
        .search-dark:focus {
            background-color: #1a1a1a !important;
            border-color: #c0392b !important;
            color: #fff !important;
            box-shadow: none !important;
        }
        .search-dark::placeholder { color: #666 !important; }

        /* ── FILAS HOVER ── */
        .table-hover tbody tr:hover {
            background-color: #2a2a2a !important;
        }

        label {
            color: #aaaaaa;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 4px;
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


    {{-- ══ CONTENT ══ --}}
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
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">

                {{-- Encabezado --}}
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fas fa-tags mr-2" style="color:#c0392b;"></i>Categorías
                    </h1>
                    <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalCrear">
                        <i class="fas fa-plus fa-sm mr-1"></i> Nueva Categoría
                    </button>
                </div>

                {{-- Alertas --}}
               @if(session('success'))
    <div class="alert alert-error-custom alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error-custom alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle mr-2"></i>{{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

                {{-- Buscador --}}
                <div class="mb-4" style="max-width:360px;">
                    <div class="input-group">
                        <input type="text" id="buscador" class="form-control search-dark"
                            placeholder="Buscar categoría...">
                        <div class="input-group-append">
                            <span class="input-group-text" style="background:#1a1a1a;border:1px solid #444;color:#aaa;">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Tabla --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Listado de Categorías
                            <span class="badge ml-2" style="background:#c0392b;color:white;border-radius:10px;padding:2px 8px;">
                                {{ $categorias->count() }}
                            </span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tablaCategorias" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th style="width:100px;">Estado</th>
                                        <th style="width:130px;">Acciones</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    @forelse($categorias as $categoria)
                                        <tr>
                                            {{-- 1. ID --}}
                                            <td>{{ $categoria->id }}</td>
                                            
                                            {{-- 2. Nombre --}}
                                            <td class="font-weight-bold">{{ $categoria->nombre }}</td>
                                            
                                            {{-- 3. Descripción --}}
                                            <td style="color:#aaa;">
                                                {{ $categoria->descripcion ?? '—' }}
                                            </td>
                                            
                                            {{-- 4. Estado --}}
                                            <td>
                                                @if($categoria->activo)
                                                    <span class="badge-activo">Activa</span>
                                                @else
                                                    <span class="badge-inactivo">Inactiva</span>
                                                @endif
                                            </td>
                                            
                                            {{-- 5. Acciones (Los botones con el nuevo diseño) --}}
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- Editar --}}
                                                    <button class="btn btn-sm btn-editar mr-1 shadow-sm"
                                                        data-id="{{ $categoria->id }}"
                                                        data-nombre="{{ $categoria->nombre }}"
                                                        data-descripcion="{{ $categoria->descripcion }}"
                                                        data-activo="{{ $categoria->activo }}"
                                                        data-toggle="modal" data-target="#modalEditar"
                                                        title="Editar"
                                                        style="background-color: #3b4252; border-color: #3b4252; color: #ffffff;">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    
                                                    {{-- Eliminar --}}
                                                    <form method="POST"
                                                        action="{{ route('admin.categorias.destroy', $categoria) }}"
                                                        style="display:inline; margin: 0;"
                                                        onsubmit="return confirm('¿Eliminar la categoría \'{{ $categoria->nombre }}\'?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm" title="Eliminar" 
                                                            style="background-color: #c0392b; border-color: #c0392b;">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center" style="color:#666;padding:30px 0;">
                                                No hay categorías registradas aún.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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

{{-- ══ MODAL: CREAR ══ --}}
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2" style="color:#c0392b;"></i>Nueva Categoría
                </h5>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('admin.categorias.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="form-control input-dark @error('nombre') is-invalid @enderror"
                            placeholder="Ej: Acción, RPG, Plataformas..." maxlength="15" required>
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" rows="3"
                            class="form-control input-dark @error('descripcion') is-invalid @enderror"
                            placeholder="Descripción opcional...">{{ old('descripcion') }}</textarea>
                        @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="activo_crear"
                            name="activo" value="1" checked>
                        <label class="custom-control-label" for="activo_crear"
                            style="color:#cccccc;font-size:.85rem;text-transform:none;letter-spacing:0;">
                            Categoría activa
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══ MODAL: EDITAR ══ --}}
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit mr-2" style="color:#c0392b;"></i>Editar Categoría
                </h5>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" id="formEditar" action="">
                @csrf
                @method('PATCH')
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" id="edit_nombre"
                            class="form-control input-dark" maxlength="15" required>
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" id="edit_descripcion" rows="3"
                            class="form-control input-dark"
                            placeholder="Descripción opcional..."></textarea>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="activo_editar" name="activo" value="1">
                        <label class="custom-control-label" for="activo_editar"
                            style="color:#cccccc;font-size:.85rem;text-transform:none;letter-spacing:0;">
                            Categoría activa
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ══ MODAL: LOGOUT ══ --}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">¿Listo para salir?</h5>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
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
    // ── Cargar datos en modal Editar ──
    document.querySelectorAll('.btn-editar').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id          = this.dataset.id;
            const nombre      = this.dataset.nombre;
            const descripcion = this.dataset.descripcion;
            const activo      = this.dataset.activo;

            document.getElementById('edit_nombre').value      = nombre;
            document.getElementById('edit_descripcion').value = descripcion !== 'null' ? descripcion : '';
            document.getElementById('activo_editar').checked  = activo === '1';

            const base = "{{ url('admin/categorias') }}";
            document.getElementById('formEditar').action = base + '/' + id;
        });
    });

    // ── Buscador en tiempo real ──
    document.getElementById('buscador').addEventListener('input', function() {
        const filtro = this.value.toLowerCase();
        document.querySelectorAll('#tablaCategorias tbody tr').forEach(function(fila) {
            const texto = fila.textContent.toLowerCase();
            fila.style.display = texto.includes(filtro) ? '' : 'none';
        });
    });

    // ── Si hay errores de validación, reabrir modal crear ──
    @if ($errors->any())
        $('#modalCrear').modal('show');
    @endif
</script>

</body>
</html>