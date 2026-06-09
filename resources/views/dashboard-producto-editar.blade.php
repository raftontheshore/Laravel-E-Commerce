<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar {{ $producto->nombre }} - Catacumbas Admin</title>

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
        .sticky-footer { background-color: #111111 !important; border-top: 1px solid #c0392b !important; color: #aaaaaa !important; }
        .btn-primary { background-color: #c0392b !important; border-color: #c0392b !important; }
        .btn-primary:hover { background-color: #e74c3c !important; border-color: #e74c3c !important; }
        .text-primary { color: #c0392b !important; }
        .dropdown-menu { background-color: #222222 !important; border: 1px solid #333333 !important; }
        .dropdown-item { color: #cccccc !important; }
        .dropdown-item:hover { background-color: #c0392b !important; color: #ffffff !important; }

        /* ── IMAGEN ── */
        .prod-img-main {
            width: 100%; max-height: 260px; object-fit: contain;
            background: #111; border-radius: 10px; border: 1px solid #333; padding: 12px;
        }
        .prod-img-placeholder {
            width: 100%; height: 220px; background: #1a1a1a;
            border: 2px dashed #333; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: #333; font-size: 56px;
        }

        /* ── INPUTS ── */
        .input-dark {
            background-color: #1a1a1a !important; border: 1px solid #444444 !important;
            color: #ffffff !important; border-radius: 6px;
        }
        .input-dark:focus {
            background-color: #1a1a1a !important; border-color: #c0392b !important;
            color: #ffffff !important; box-shadow: 0 0 0 0.15rem rgba(192,57,43,0.25) !important;
        }
        .input-dark::placeholder { color: #555 !important; }
        .input-dark option { background-color: #222222; color: #ffffff; }

        /* ── LABELS / SECCIONES ── */
        .campo-label {
            font-size: 0.68rem; text-transform: uppercase; letter-spacing: .07em;
            color: #666; margin-bottom: 4px; font-weight: 700; display: block;
        }
        .campo-grupo { margin-bottom: 14px; }
        .seccion-titulo {
            font-size: 0.72rem; text-transform: uppercase; letter-spacing: .08em;
            color: #c0392b; font-weight: 700; padding-bottom: 6px;
            border-bottom: 1px solid #2a2a2a; margin-bottom: 14px; margin-top: 20px;
        }
        .seccion-titulo:first-of-type { margin-top: 0; }

        /* ── VALIDACIÓN ── */
        .is-invalid { border-color: #c0392b !important; }
        .invalid-feedback { color: #e74c3c; font-size: 0.78rem; }
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
                            <i class="fas fa-edit mr-2" style="color:#c0392b;"></i>Editar Producto
                        </h1>
                        <small style="color:#666;">
                            <a href="{{ route('admin.productos.index') }}" style="color:#c0392b;">Productos</a>
                            / <a href="{{ route('admin.productos.show', $producto->id) }}" style="color:#888;">{{ $producto->nombre }}</a>
                            / Editar
                        </small>
                    </div>
                    <a href="{{ route('admin.productos.show', $producto->id) }}" class="btn btn-sm"
                       style="background:#2a2a2a;border:1px solid #444;color:#aaa;">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                </div>

                {{-- ALERTAS --}}
                @if($errors->any())
                <div class="alert mb-4" style="background:rgba(192,57,43,0.15);border:1px solid #c0392b;color:#e74c3c;border-radius:6px;">
                    <i class="fas fa-exclamation-circle mr-2"></i><strong>Corregí los siguientes errores:</strong>
                    <ul class="mb-0 mt-1 pl-3">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="alert mb-4" style="background:rgba(9,199,98,0.15);border:1px solid #09c762;color:#09c762;border-radius:6px;">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
                @endif

                {{-- FORMULARIO --}}
                <form method="POST" action="{{ route('admin.productos.update', $producto->id) }}"
                      id="form-editar" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- ══ COLUMNA IZQUIERDA: Imagen ══ --}}
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-image mr-2"></i>Imagen del Producto
                                    </h6>
                                </div>
                                <div class="card-body">

                                    {{-- Imagen actual / Vista previa --}}
                                    <div id="img-actual-wrap" class="mb-4">
                                        @if($producto->url_imagen)
                                            <img src="{{ $producto->url_imagen }}"
                                                 alt="{{ $producto->nombre }}"
                                                 class="prod-img-main"
                                                 id="img-preview">
                                        @else
                                            <img src="" alt="Preview" class="prod-img-main" id="img-preview" style="display:none;">
                                            <div class="prod-img-placeholder" id="img-placeholder">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Zona interactiva de subida --}}
                                    <div id="upload-zone"
                                         onclick="document.getElementById('imagen').click()"
                                         style="width:100%; min-height:130px; background:#1a1a1a; border:2px dashed #c0392b; border-radius:8px; display:flex; flex-direction:column; align-items:center; justify-content:center; cursor:pointer; transition:background .2s, border-color .2s; margin-bottom:15px;"
                                         onmouseover="this.style.background='#222';this.style.borderColor='#e74c3c';"
                                         onmouseout="this.style.background='#1a1a1a';this.style.borderColor='#c0392b';">
                                        <i class="fas fa-cloud-upload-alt fa-3x mb-2" style="color:#c0392b;"></i>
                                        <span style="color:#888; font-size:0.9rem;">Clic para subir imagen</span>
                                    </div>

                                    {{-- Input Nativo de Archivo (Visible) --}}
                                    <div class="campo-grupo">
                                        <label class="campo-label">SUBIR IMAGEN</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" style="color:#ccc;">
                                        @error('imagen')
                                            <div style="color:#e74c3c;font-size:0.78rem;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Separador Visual --}}
                                    <div class="text-center my-3" style="color:#555;">
                                        <span style="display:inline-block; width:40px; border-top:1px solid #444; vertical-align:middle;"></span>
                                        <span class="mx-2" style="font-size:0.85rem;">— o —</span>
                                        <span style="display:inline-block; width:40px; border-top:1px solid #444; vertical-align:middle;"></span>
                                    </div>

                                    {{-- Input de URL --}}
                                    <div class="campo-grupo">
                                        <label class="campo-label" for="url_imagen">URL DE IMAGEN</label>
                                        <input type="url" name="url_imagen" id="url_imagen"
                                               class="form-control input-dark @error('url_imagen') is-invalid @enderror"
                                               value="{{ old('url_imagen', $producto->url_imagen) }}"
                                               placeholder="https://ejemplo.com/imagen.jpg">
                                        @error('url_imagen')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small style="color:#555;font-size:0.7rem;margin-top:6px;display:block;line-height:1.3;">
                                            Completá solo una opción. Si dejás ambas vacías, se mantendrá la imagen actual en Catacumbas.
                                        </small>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- ══ COLUMNA DERECHA: Datos ══ --}}
                        <div class="col-lg-8 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-info-circle mr-2"></i>Información General
                                    </h6>
                                </div>
                                <div class="card-body">

                                    {{-- ── Identificación ── --}}
                                    <div class="seccion-titulo">
                                        <i class="fas fa-tag mr-1"></i>Identificación
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="nombre">Nombre *</label>
                                                <input type="text" name="nombre" id="nombre"
                                                       class="form-control input-dark @error('nombre') is-invalid @enderror"
                                                       value="{{ old('nombre', $producto->nombre) }}"
                                                       placeholder="Ej: Resident Evil Director's Cut" required>
                                                @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="marca">Marca *</label>
                                                <input type="text" name="marca" id="marca"
                                                       class="form-control input-dark @error('marca') is-invalid @enderror"
                                                       value="{{ old('marca', $producto->marca) }}"
                                                       placeholder="Ej: Capcom" required>
                                                @error('marca')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="id_categoria">Categoría *</label>
                                                <select name="id_categoria" id="id_categoria"
                                                        class="form-control input-dark @error('id_categoria') is-invalid @enderror"
                                                        required>
                                                    <option value="">— Seleccioná —</option>
                                                    @foreach($categorias as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ old('id_categoria', $producto->id_categoria) == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="tipo_producto">Tipo *</label>
                                                <select name="tipo_producto" id="tipo_producto"
                                                        class="form-control input-dark @error('tipo_producto') is-invalid @enderror"
                                                        required>
                                                    <option value="videojuego"  {{ old('tipo_producto', $producto->tipo_producto) === 'videojuego'  ? 'selected' : '' }}>Videojuego</option>
                                                    <option value="consola"     {{ old('tipo_producto', $producto->tipo_producto) === 'consola'     ? 'selected' : '' }}>Consola</option>
                                                    <option value="periferico"  {{ old('tipo_producto', $producto->tipo_producto) === 'periferico'  ? 'selected' : '' }}>Periférico</option>
                                                </select>
                                                @error('tipo_producto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="consola">Consola *</label>
                                                <input type="text" name="consola" id="consola"
                                                       class="form-control input-dark @error('consola') is-invalid @enderror"
                                                       value="{{ old('consola', $producto->consola) }}"
                                                       placeholder="Ej: PS1, SNES..." required>
                                                @error('consola')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Precio ── --}}
                                    <div class="seccion-titulo">
                                        <i class="fas fa-dollar-sign mr-1"></i>Precio
                                    </div>

                                    <div class="row align-items-end">
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="precio_original">Precio Original *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="background:#111;border-color:#444;color:#666;">$</span>
                                                    </div>
                                                    <input type="number" name="precio_original" id="precio_original"
                                                           class="form-control input-dark @error('precio_original') is-invalid @enderror"
                                                           value="{{ old('precio_original', $producto->precio_original) }}"
                                                           min="0" step="1" required>
                                                </div>
                                                @error('precio_original')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="porcentaje_descuento">Descuento (%)</label>
                                                <div class="input-group">
                                                    <input type="number" name="porcentaje_descuento" id="porcentaje_descuento"
                                                           class="form-control input-dark @error('porcentaje_descuento') is-invalid @enderror"
                                                           value="{{ old('porcentaje_descuento', $producto->porcentaje_descuento) }}"
                                                           min="0" max="100" step="1" placeholder="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" style="background:#111;border-color:#444;color:#666;">%</span>
                                                    </div>
                                                </div>
                                                @error('porcentaje_descuento')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="precio">Precio Final *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="background:#111;border-color:#444;color:#666;">$</span>
                                                    </div>
                                                    <input type="number" name="precio" id="precio"
                                                           class="form-control input-dark @error('precio') is-invalid @enderror"
                                                           value="{{ old('precio', $producto->precio) }}"
                                                           min="0" step="1" required>
                                                </div>
                                                @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                <small style="color:#555;font-size:0.7rem;margin-top:3px;display:block;">
                                                    Se calcula automáticamente con el descuento.
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Stock y Estado ── --}}
                                    <div class="seccion-titulo">
                                        <i class="fas fa-cubes mr-1"></i>Stock y Estado
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="stock">Stock *</label>
                                                <input type="number" name="stock" id="stock"
                                                       class="form-control input-dark @error('stock') is-invalid @enderror"
                                                       value="{{ old('stock', $producto->stock) }}"
                                                       min="0" step="1" required>
                                                @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="stock_bajo">Stock Mínimo *</label>
                                                <input type="number" name="stock_bajo" id="stock_bajo"
                                                       class="form-control input-dark @error('stock_bajo') is-invalid @enderror"
                                                       value="{{ old('stock_bajo', $producto->stock_bajo) }}"
                                                       min="0" step="1" required>
                                                @error('stock_bajo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="condicion">Condición *</label>
                                                <select name="condicion" id="condicion"
                                                        class="form-control input-dark @error('condicion') is-invalid @enderror"
                                                        required>
                                                    <option value="nuevo"           {{ old('condicion', $producto->condicion) === 'nuevo'           ? 'selected' : '' }}>Nuevo</option>
                                                    <option value="usado"           {{ old('condicion', $producto->condicion) === 'usado'           ? 'selected' : '' }}>Usado</option>
                                                    <option value="reacondicionado" {{ old('condicion', $producto->condicion) === 'reacondicionado' ? 'selected' : '' }}>Reacondicionado</option>
                                                </select>
                                                @error('condicion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="campo-grupo">
                                                <label class="campo-label" for="activo">Estado</label>
                                                <select name="activo" id="activo"
                                                        class="form-control input-dark @error('activo') is-invalid @enderror">
                                                    <option value="1" {{ old('activo', $producto->activo) == 1 ? 'selected' : '' }}>Activo</option>
                                                    <option value="0" {{ old('activo', $producto->activo) == 0 ? 'selected' : '' }}>Inactivo</option>
                                                </select>
                                                @error('activo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Descripción ── --}}
                                    <div class="seccion-titulo">
                                        <i class="fas fa-align-left mr-1"></i>Descripción
                                    </div>

                                    <div class="campo-grupo">
                                        <label class="campo-label" for="descripcion">Descripción</label>
                                        <textarea name="descripcion" id="descripcion" rows="4"
                                                  class="form-control input-dark @error('descripcion') is-invalid @enderror"
                                                  placeholder="Descripción del producto...">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                        @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                </div>

                                {{-- FOOTER BOTONES --}}
                                <div class="card-footer" style="background:#1e1e1e;border-top:1px solid #2a2a2a;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('admin.productos.show', $producto->id) }}"
                                           class="btn btn-sm"
                                           style="background:#2a2a2a;border:1px solid #444;color:#aaa;">
                                            <i class="fas fa-times mr-1"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-sm px-4">
                                            <i class="fas fa-save mr-1"></i> Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

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

<script>
    // ── GESTIÓN DE VISTA PREVIA E INPUTS ───────────────────────
    const urlInput = document.getElementById('url_imagen');
    const fileInput = document.getElementById('imagen');
    const previewImg = document.getElementById('img-preview');
    const placeholder = document.getElementById('img-placeholder');
    const originalUrl = "{{ $producto->url_imagen }}";

    // Si escribe una URL, limpia el archivo y muestra el preview
    urlInput.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            fileInput.value = ''; // Vaciar archivo
            previewImg.src = this.value;
            previewImg.style.display = 'block';
            if (placeholder) placeholder.style.display = 'none';
        } else if (!fileInput.value && originalUrl) {
            previewImg.src = originalUrl; // Restaurar original si borra
        }
    });

    // Si elige un archivo, limpia la URL y muestra el preview
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            urlInput.value = ''; // Vaciar URL
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        } else if (!urlInput.value && originalUrl) {
            previewImg.src = originalUrl; // Restaurar original si cancela
        }
    });

    // Si la URL que puso está rota, oculta la imagen y muestra el icono de placeholder
    previewImg.addEventListener('error', function() {
        this.style.display = 'none';
        if (placeholder) placeholder.style.display = 'flex';
    });

    // ── CÁLCULO PRECIO FINAL ───────────────────────────────────
    const precioOriginalInput = document.getElementById('precio_original');
    const porcentajeInput     = document.getElementById('porcentaje_descuento');
    const precioFinalInput    = document.getElementById('precio');

    function calcularPrecioFinal() {
        const original  = parseFloat(precioOriginalInput.value) || 0;
        const descuento = parseFloat(porcentajeInput.value) || 0;
        if (original > 0) {
            precioFinalInput.value = Math.round(original - (original * descuento / 100));
        }
    }
    
    precioOriginalInput.addEventListener('input', calcularPrecioFinal);
    porcentajeInput.addEventListener('input', calcularPrecioFinal);
</script>

</body>
</html>