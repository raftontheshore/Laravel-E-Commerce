<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar Producto - Catacumbas</title>

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
        .border-left-info     { border-left: 4px solid #c0392b !important; }
        .border-left-warning  { border-left: 4px solid #e67e22 !important; }

        .table { color: #cccccc !important; }
        .table thead th { border-bottom: 2px solid #c0392b !important; color: #aaaaaa !important; }
        .table td, .table th { border-top: 1px solid #333333 !important; }
        .table-bordered { border: 1px solid #333333 !important; }

        .progress { background-color: #333333 !important; }

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

        /* ── FORMULARIO ── */
        .input-dark {
            background-color: #1a1a1a !important;
            border: 1px solid #444444 !important;
            color: #ffffff !important;
            transition: border-color .2s;
        }
        .input-dark:focus {
            background-color: #1a1a1a !important;
            border-color: #c0392b !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 0.15rem rgba(192,57,43,0.25) !important;
        }
        .input-dark::placeholder { color: #666666 !important; }
        .input-dark option { background-color: #222222; color: #ffffff; }

        .input-dark-addon {
            background-color: #2a2a2a !important;
            border: 1px solid #444444 !important;
            color: #aaaaaa !important;
        }

        .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #c0392b !important;
            border-color: #c0392b !important;
        }

        #imagen-preview-wrapper {
            width: 100%;
            height: 180px;
            background: #1a1a1a;
            border: 2px dashed #c0392b;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: pointer;
            transition: background .2s, border-color .2s;
        }
        #imagen-preview-wrapper:hover {
            background: #222222 !important;
            border-color: #e74c3c !important;
        }

        label.input-label {
            color: #aaaaaa;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 4px;
        }

        .alert-error-custom {
            background-color: rgba(192,57,43,0.15) !important;
            border-left: 4px solid #c0392b !important;
            border-color: #c0392b !important;
            color: #f5b7b1 !important;
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

    {{-- ══ CONTENT WRAPPER ══ --}}
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
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            {{-- ══ CONTENIDO PRINCIPAL ══ --}}
            <div class="container-fluid">

                {{-- Encabezado --}}
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fas fa-plus-circle mr-2" style="color:#c0392b;"></i>
                        Agregar Producto
                    </h1>
                    <a href="#" class="btn btn-sm btn-secondary shadow-sm">
                        <i class="fas fa-arrow-left fa-sm mr-1"></i> Volver al listado
                    </a>
                </div>

                {{-- Errores de validación --}}
                @if ($errors->any())
                    <div class="alert alert-error-custom mb-4">
                        <ul class="mb-0 pl-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- ── COLUMNA IZQUIERDA ── --}}
                        <div class="col-lg-8">

                            {{-- Card: Info General --}}
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-gamepad mr-2"></i>Información General
                                    </h6>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="input-label">Nombre del Producto <span class="text-danger">*</span></label>
                                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                                            class="form-control input-dark @error('nombre') is-invalid @enderror"
                                            placeholder="Ej: Super Mario Bros 3" maxlength="150" required>
                                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="input-label">Descripción</label>
                                        <textarea name="descripcion" rows="4"
                                            class="form-control input-dark @error('descripcion') is-invalid @enderror"
                                            placeholder="Descripción detallada del producto...">{{ old('descripcion') }}</textarea>
                                        @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="input-label">Marca <span class="text-danger">*</span></label>
                                                <input type="text" name="marca" value="{{ old('marca') }}"
                                                    class="form-control input-dark @error('marca') is-invalid @enderror"
                                                    placeholder="Ej: Nintendo, Sega, Sony..." maxlength="255" required>
                                                @error('marca')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="input-label">Consola <span class="text-danger">*</span></label>
                                                <input type="text" name="consola" value="{{ old('consola') }}"
                                                    class="form-control input-dark @error('consola') is-invalid @enderror"
                                                    placeholder="Ej: SNES, Game Boy, PS1..." maxlength="255" required>
                                                @error('consola')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Tipo, Categoría y Condición en la misma fila --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="input-label">Tipo de Producto <span class="text-danger">*</span></label>
                                                <select name="tipo_producto"
                                                    class="form-control input-dark @error('tipo_producto') is-invalid @enderror" required>
                                                    <option value="">-- Seleccionar --</option>
                                                    <option value="videojuego" {{ old('tipo_producto') === 'videojuego' ? 'selected' : '' }}>Videojuego</option>
                                                    <option value="consola"    {{ old('tipo_producto') === 'consola'    ? 'selected' : '' }}>Consola</option>
                                                    <option value="periferico" {{ old('tipo_producto') === 'periferico' ? 'selected' : '' }}>Periférico</option>
                                                </select>
                                                @error('tipo_producto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="input-label">Categoría <span class="text-danger">*</span></label>
                                                <select name="id_categoria"
                                                    class="form-control input-dark @error('id_categoria') is-invalid @enderror" required>
                                                    <option value="">-- Seleccionar --</option>
                                                    @foreach($categorias as $cat)
                                                        <option value="{{ $cat->id }}" {{ old('id_categoria') == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="input-label">Condición <span class="text-danger">*</span></label>
                                                <select name="condicion"
                                                    class="form-control input-dark @error('condicion') is-invalid @enderror" required>
                                                    <option value="">-- Seleccionar --</option>
                                                    <option value="nuevo"           {{ old('condicion') === 'nuevo'           ? 'selected' : '' }}>Nuevo</option>
                                                    <option value="usado"           {{ old('condicion') === 'usado'           ? 'selected' : '' }}>Usado</option>
                                                    <option value="reacondicionado" {{ old('condicion') === 'reacondicionado' ? 'selected' : '' }}>Reacondicionado</option>
                                                </select>
                                                @error('condicion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Card: Precios --}}
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-dollar-sign mr-2"></i>Precios y Descuento
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="input-label">Precio Original <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-dark-addon">$</span>
                                                    </div>
                                                    <input type="number" name="precio_original" id="precio_original"
                                                        value="{{ old('precio_original') }}"
                                                        class="form-control input-dark @error('precio_original') is-invalid @enderror"
                                                        placeholder="0.00" step="0.01" min="0" required>
                                                    @error('precio_original')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="input-label">% Descuento</label>
                                                <div class="input-group">
                                                    <input type="number" name="porcentaje_descuento" id="porcentaje_descuento"
                                                        value="{{ old('porcentaje_descuento', 0) }}"
                                                        class="form-control input-dark @error('porcentaje_descuento') is-invalid @enderror"
                                                        placeholder="0" min="0" max="100">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text input-dark-addon">%</span>
                                                    </div>
                                                    @error('porcentaje_descuento')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="input-label">Precio Final <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-dark-addon">$</span>
                                                    </div>
                                                    <input type="number" name="precio" id="precio"
                                                        value="{{ old('precio') }}"
                                                        class="form-control input-dark @error('precio') is-invalid @enderror"
                                                        placeholder="0.00" step="0.01" min="0" required>
                                                    @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                                <small style="color:#666;">Se calcula automáticamente.</small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- ── COLUMNA DERECHA ── --}}
                        <div class="col-lg-4">

                            {{-- Card: Stock --}}
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-boxes mr-2"></i>Stock
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="input-label">Cantidad en Stock <span class="text-danger">*</span></label>
                                        <input type="number" name="stock" value="{{ old('stock', 1) }}"
                                            class="form-control input-dark @error('stock') is-invalid @enderror"
                                            min="0" required>
                                        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="input-label">Alerta Stock Bajo <span class="text-danger">*</span></label>
                                        <input type="number" name="stock_bajo" value="{{ old('stock_bajo', 3) }}"
                                            class="form-control input-dark @error('stock_bajo') is-invalid @enderror"
                                            min="0" required>
                                        <small style="color:#666;">Alertar cuando baje de este número.</small>
                                        @error('stock_bajo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Card: Imagen --}}
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-image mr-2"></i>Imagen del Producto
                                    </h6>
                                </div>
                                <div class="card-body">

                                    <div class="text-center mb-3" id="imagen-preview-wrapper"
                                        onclick="document.getElementById('imagen_file').click()">
                                        <img id="imagen-preview" src="#" alt="Preview"
                                            style="max-width:100%;max-height:180px;display:none;object-fit:contain;">
                                        <div id="imagen-placeholder" class="text-center">
                                            <i class="fas fa-cloud-upload-alt fa-3x mb-2 d-block" style="color:#c0392b;"></i>
                                            <span class="small" style="color:#666;">Clic para subir imagen</span>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="input-label">Subir Imagen</label>
                                        <input type="file" name="imagen" id="imagen_file"
                                            class="form-control-file @error('imagen') is-invalid @enderror"
                                            accept="image/*" style="color:#aaa;">
                                        @error('imagen')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="text-center my-2" style="color:#555;">— o —</div>

                                    <div class="form-group mb-0">
                                        <label class="input-label">URL de Imagen</label>
                                        <input type="url" name="url_imagen" id="url_imagen"
                                            value="{{ old('url_imagen') }}"
                                            class="form-control input-dark @error('url_imagen') is-invalid @enderror"
                                            placeholder="https://...">
                                        @error('url_imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                </div>
                            </div>

                            {{-- Card: Estado --}}
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-toggle-on mr-2"></i>Estado
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="activo"
                                            name="activo" value="1"
                                            {{ old('activo', '1') == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="activo"
                                            style="color:#cccccc;">Producto Activo</label>
                                    </div>
                                    <small style="color:#666;display:block;margin-top:6px;">
                                        Los productos inactivos no se muestran en la tienda.
                                    </small>
                                </div>
                            </div>

                            {{-- Botones --}}
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary btn-block font-weight-bold mb-2">
                                        <i class="fas fa-save mr-2"></i>Guardar Producto
                                    </button>
                                    <a href="#" class="btn btn-secondary btn-block">
                                        <i class="fas fa-times mr-2"></i>Cancelar
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            {{-- /container-fluid --}}

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

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* Auto-cálculo precio final */
    const elOriginal   = document.getElementById('precio_original');
    const elDescuento  = document.getElementById('porcentaje_descuento');
    const elFinal      = document.getElementById('precio');

    function calcularPrecio() {
        const original  = parseFloat(elOriginal.value)  || 0;
        const descuento = parseFloat(elDescuento.value) || 0;
        const final     = original - (original * descuento / 100);
        elFinal.value   = final > 0 ? final.toFixed(2) : '';
    }

    elOriginal.addEventListener('input',  calcularPrecio);
    elDescuento.addEventListener('input', calcularPrecio);

    /* Preview imagen — archivo */
    document.getElementById('imagen_file').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (ev) {
            document.getElementById('imagen-preview').src = ev.target.result;
            document.getElementById('imagen-preview').style.display = 'block';
            document.getElementById('imagen-placeholder').style.display = 'none';
        };
        reader.readAsDataURL(file);
    });

    /* Preview imagen — URL */
    document.getElementById('url_imagen').addEventListener('input', function () {
        const url = this.value.trim();
        if (url) {
            document.getElementById('imagen-preview').src = url;
            document.getElementById('imagen-preview').style.display = 'block';
            document.getElementById('imagen-placeholder').style.display = 'none';
        }
    });
});
</script>

</body>
</html>