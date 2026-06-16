<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mensajes - Catacumbas">
    <meta name="author" content="Enzo">

    <title>Mensajes - Dashboard Catacumbas</title>
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

    .table { color: #cccccc !important; }
    .table thead th { border-bottom: 2px solid #c0392b !important; color: #aaaaaa !important; }
    .table td, .table th { border-top: 1px solid #333333 !important; }

    .sticky-footer {
        background-color: #111111 !important;
        border-top: 1px solid #c0392b !important;
        color: #aaaaaa !important;
    }

    .text-primary { color: #c0392b !important; }
    .text-gray-800 { color: #ffffff !important; }

    .btn-primary { background-color: #c0392b !important; border-color: #c0392b !important; }
    .btn-primary:hover { background-color: #e74c3c !important; border-color: #e74c3c !important; }

    .dropdown-menu { background-color: #222222 !important; border: 1px solid #333333 !important; }
    .dropdown-item { color: #cccccc !important; }
    .dropdown-item:hover { background-color: #c0392b !important; color: #ffffff !important; }

    /* ── Submenús sidebar ── */
    .nav-item.has-submenu > .nav-link {
        display: flex !important; align-items: center !important; justify-content: space-between !important;
    }
    .nav-item.has-submenu > .nav-link .submenu-arrow {
        font-size: 11px; transition: transform 0.25s ease; color: #888; flex-shrink: 0;
    }
    .nav-item.has-submenu.open > .nav-link .submenu-arrow { transform: rotate(90deg); color: #c0392b; }
    .submenu {
        display: none; list-style: none; padding: 0; margin: 0;
        background-color: rgba(0,0,0,0.2); border-left: 3px solid #c0392b;
        margin-left: 1rem; border-radius: 0 4px 4px 0;
    }
    .nav-item.has-submenu.open > .submenu { display: block; }
    .submenu li a {
        display: flex; align-items: center; gap: 8px;
        padding: 7px 16px 7px 14px; font-size: 12px; color: #aaaaaa !important;
        text-decoration: none; transition: color 0.2s, background-color 0.2s;
        border-radius: 0 4px 4px 0;
    }
    .submenu li a:hover { color: #ffffff !important; background-color: rgba(192,57,43,0.18); }
    .submenu li a.active { color: #e74c3c !important; font-weight: 600; }
    .submenu li a i { font-size: 12px; width: 14px; text-align: center; flex-shrink: 0; }
    .nav-item.has-submenu.open > .nav-link,
    .nav-item.has-submenu.active > .nav-link { color: #ffffff !important; }
    .nav-item.active-page > .nav-link { color: #ffffff !important; font-weight: 700; }

    /* ══════════════════════════════════
       ESTILOS PROPIOS DE MENSAJES
    ══════════════════════════════════ */

    /* Stats */
    .msg-stat {
        background: #222;
        border: 1px solid #333;
        border-radius: 8px;
        padding: 16px 20px;
    }
    .msg-stat-label { font-size: 11px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; color: #666; margin-bottom: 6px; }
    .msg-stat-value { font-size: 26px; font-weight: 700; color: #fff; }
    .msg-stat-value.red   { color: #c0392b; }
    .msg-stat-value.amber { color: #e67e22; }
    .msg-stat-value.green { color: #27ae60; }

    /* Tabs */
    .msg-tabs { display: flex; gap: 0; border-bottom: 1px solid #333; margin-bottom: 20px; }
    .msg-tab {
        padding: 10px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        border: none; background: none; color: #666;
        border-bottom: 2px solid transparent; margin-bottom: -1px;
        transition: color 0.15s; letter-spacing: 0.5px;
    }
    .msg-tab.active { color: #c0392b; border-bottom-color: #c0392b; }
    .msg-tab:hover:not(.active) { color: #ccc; }

    /* Search / filter bar */
    .msg-controls { display: flex; gap: 10px; margin-bottom: 16px; }
    .msg-search {
        flex: 1; display: flex; align-items: center; gap: 8px;
        background: #1c1c1c; border: 1px solid #333; border-radius: 7px;
        padding: 0 12px;
    }
    .msg-search i { color: #555; font-size: 14px; }
    .msg-search input {
        background: transparent; border: none; outline: none;
        color: #ccc; font-size: 13px; padding: 9px 0; width: 100%;
    }
    .msg-search input::placeholder { color: #444; }
    .msg-filter {
        padding: 8px 12px; font-size: 13px;
        border: 1px solid #333; border-radius: 7px;
        background: #1c1c1c; color: #ccc; cursor: pointer;
    }

    /* Card de mensaje */
    .msg-card {
        background: #222;
        border: 1px solid #2e2e2e;
        border-radius: 10px;
        margin-bottom: 8px;
        overflow: hidden;
        transition: border-color 0.15s;
    }
    .msg-card:hover { border-color: #3a3a3a; }

    .msg-card-header {
        display: flex; align-items: center; gap: 12px;
        padding: 14px 16px; cursor: pointer;
    }

    .msg-avatar {
        width: 36px; height: 36px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 13px; font-weight: 700; flex-shrink: 0;
    }
    .msg-avatar.usuario  { background: #1a2a3a; color: #5dade2; }
    .msg-avatar.visitante { background: #2a1a0a; color: #e67e22; }

    .msg-meta { flex: 1; min-width: 0; }
    .msg-nombre { font-size: 14px; font-weight: 600; color: #ddd; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .msg-asunto { font-size: 12px; color: #666; margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    .msg-right { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
    .msg-fecha { font-size: 11px; color: #555; }

    /* Pills de tipo */
    .pill-tipo {
        font-size: 10px; font-weight: 700; padding: 2px 8px;
        border-radius: 20px; letter-spacing: 0.5px; text-transform: uppercase;
    }
    .pill-tipo.usuario   { background: #1a2a3a; color: #5dade2; }
    .pill-tipo.visitante { background: #2a1a0a; color: #e67e22; }

    /* Badges de estado */
    .pill-estado {
        font-size: 11px; font-weight: 600; padding: 3px 9px;
        border-radius: 20px; white-space: nowrap;
    }
    .pill-estado.abierta    { background: #1a2e1a; color: #27ae60; }
    .pill-estado.en_proceso { background: #2e2010; color: #e67e22; }
    .pill-estado.cerrada    { background: #2a2a2a; color: #888; }
    .pill-estado.pendiente  { background: #2e1a1a; color: #c0392b; }
    .pill-estado.leido      { background: #2e2010; color: #e67e22; }
    .pill-estado.respondido { background: #1a2e1a; color: #27ae60; }

    /* Cuerpo expandido */
    .msg-card-body { display: none; padding: 0 16px 16px; border-top: 1px solid #2a2a2a; }
    .msg-card-body.show { display: block; }

    .msg-detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin: 14px 0; }
    .msg-detail-label { font-size: 10px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; color: #555; margin-bottom: 3px; }
    .msg-detail-val { font-size: 13px; color: #bbb; }

    .msg-texto {
        font-size: 13px; color: #bbb; line-height: 1.7;
        background: #1a1a1a; border: 1px solid #2a2a2a;
        border-radius: 7px; padding: 12px 14px; margin-bottom: 14px;
    }

    /* Acciones */
    .msg-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

    .msg-estado-wrap { display: flex; align-items: center; gap: 8px; }
    .msg-estado-label { font-size: 11px; color: #555; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }

    .msg-estado-select {
        font-size: 12px; font-weight: 600; padding: 6px 10px;
        border-radius: 7px; cursor: pointer; border: 1px solid #333;
        background: #1c1c1c; color: #ccc; transition: border-color 0.15s;
    }
    .msg-estado-select:focus { outline: none; border-color: #c0392b; }

    .msg-btn {
        padding: 6px 14px; border-radius: 7px; font-size: 12px; font-weight: 600;
        cursor: pointer; border: 1px solid #333;
        background: #1c1c1c; color: #bbb; transition: background 0.15s, border-color 0.15s;
        text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
    }
    .msg-btn:hover { background: #2a2a2a; border-color: #444; color: #fff; }
    .msg-btn.danger { color: #c0392b; border-color: #3a1a1a; }
    .msg-btn.danger:hover { background: #2e1a1a; }

    .msg-empty { text-align: center; padding: 40px 0; color: #555; font-size: 14px; }
    .msg-empty i { font-size: 36px; display: block; margin-bottom: 10px; color: #333; }

    /* Alert */
    .alert-dark-success {
        background: #1a2e1a; border: 1px solid #27ae60;
        border-radius: 7px; padding: 10px 16px; font-size: 13px;
        color: #27ae60; margin-bottom: 16px;
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

    {{-- SIDEBAR --}}
    <x-admin-sidebar />

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            {{-- TOPBAR --}}
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group" style="background-color:#222;border:1px solid #333;border-radius:7px;overflow:hidden;">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0" style="background:transparent;color:#555;">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Buscar..."
                               style="background-color:transparent;color:#ddd;box-shadow:none;outline:none;">
                    </div>
                </form>

                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
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
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            {{-- CONTENIDO --}}
            <div class="container-fluid">

                {{-- Título --}}
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-0" style="color:#fff;font-weight:700;">Mensajes</h4>
                        <span style="font-size:12px;color:#666;">Consultas de usuarios y contactos de visitantes</span>
                    </div>
                </div>

                {{-- Alert de éxito --}}
                @if(session('success'))
                    <div class="alert-dark-success">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- Stats --}}
                <div class="row mb-4">
                    @php
                        $totalMensajes  = $consultas->count() + $contactos->count();
                        $sinAtender     = $consultas->where('estado','abierta')->count()    + $contactos->where('estado','pendiente')->count();
                        $enProceso      = $consultas->where('estado','en_proceso')->count() + $contactos->where('estado','leido')->count();
                        $resueltos      = $consultas->where('estado','cerrada')->count()    + $contactos->where('estado','respondido')->count();
                    @endphp
                    <div class="col-6 col-md-3 mb-3">
                        <div class="msg-stat">
                            <div class="msg-stat-label">Total mensajes</div>
                            <div class="msg-stat-value">{{ $totalMensajes }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <div class="msg-stat">
                            <div class="msg-stat-label">Sin atender</div>
                            <div class="msg-stat-value red">{{ $sinAtender }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <div class="msg-stat">
                            <div class="msg-stat-label">En proceso</div>
                            <div class="msg-stat-value amber">{{ $enProceso }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <div class="msg-stat">
                            <div class="msg-stat-label">Resueltos</div>
                            <div class="msg-stat-value green">{{ $resueltos }}</div>
                        </div>
                    </div>
                </div>

                {{-- Card principal --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="msg-tabs" id="msgTabs">
                            <button class="msg-tab active" onclick="switchTab('todos', this)">
                                Todos <span style="font-size:11px;background:#2a2a2a;color:#888;border-radius:20px;padding:1px 7px;margin-left:4px;">{{ $totalMensajes }}</span>
                            </button>
                            <button class="msg-tab" onclick="switchTab('consultas', this)">
                                Consultas <span style="font-size:11px;background:#1a2a3a;color:#5dade2;border-radius:20px;padding:1px 7px;margin-left:4px;">{{ $consultas->count() }}</span>
                            </button>
                            <button class="msg-tab" onclick="switchTab('contactos', this)">
                                Contactos <span style="font-size:11px;background:#2a1a0a;color:#e67e22;border-radius:20px;padding:1px 7px;margin-left:4px;">{{ $contactos->count() }}</span>
                            </button>
                        </div>

                        {{-- Barra de búsqueda y filtro --}}
                        <div class="msg-controls mt-2">
                            <div class="msg-search">
                                <i class="bi bi-search"></i>
                                <input type="text" id="msgBuscar" placeholder="Buscar por nombre, asunto o mensaje..." oninput="filtrarMensajes()">
                            </div>
                            <select class="msg-filter" id="msgFiltroEstado" onchange="filtrarMensajes()">
                                <option value="">Todos los estados</option>
                                <option value="abierta">Abierta</option>
                                <option value="en_proceso">En proceso</option>
                                <option value="cerrada">Cerrada</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="leido">Leído</option>
                                <option value="respondido">Respondido</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body" id="msgLista">

                        {{-- ── CONSULTAS (usuarios registrados) ── --}}
                        @foreach($consultas as $c)
                        <div class="msg-card" data-tipo="consultas" data-estado="{{ $c->estado }}"
                             data-texto="{{ strtolower($c->usuario->nombre ?? '') }} {{ strtolower($c->asunto) }} {{ strtolower($c->mensaje) }}">

                            <div class="msg-card-header" onclick="toggleMsg(this)">
                                <div class="msg-avatar usuario">
                                    {{ strtoupper(substr($c->usuario->nombre ?? 'U', 0, 1)) }}{{ strtoupper(substr(strstr($c->usuario->nombre ?? ' X', ' '), 1, 1)) }}
                                </div>
                                <div class="msg-meta">
                                    <div class="msg-nombre">{{ $c->usuario->nombre ?? 'Usuario eliminado' }}</div>
                                    <div class="msg-asunto">{{ $c->asunto }}</div>
                                </div>
                                <div class="msg-right">
                                    <span class="pill-tipo usuario">Usuario</span>
                                    <span class="pill-estado {{ $c->estado }}">
                                        @switch($c->estado)
                                            @case('abierta')    Abierta    @break
                                            @case('en_proceso') En proceso @break
                                            @case('cerrada')    Cerrada    @break
                                        @endswitch
                                    </span>
                                    <span class="msg-fecha">{{ $c->created_at->format('d/m/Y') }}</span>
                                    <i class="bi bi-chevron-down" style="color:#555;font-size:13px;"></i>
                                </div>
                            </div>

                            <div class="msg-card-body">
                                <div class="msg-detail-grid">
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-envelope" style="margin-right:4px;"></i>Email</div>
                                        <div class="msg-detail-val">{{ $c->usuario->email ?? '—' }}</div>
                                    </div>
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-person" style="margin-right:4px;"></i>ID Usuario</div>
                                        <div class="msg-detail-val">#{{ $c->id_usuario }}</div>
                                    </div>
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-calendar" style="margin-right:4px;"></i>Fecha</div>
                                        <div class="msg-detail-val">{{ $c->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-chat-left" style="margin-right:4px;"></i>Tipo</div>
                                        <div class="msg-detail-val">Consulta (usuario registrado)</div>
                                    </div>
                                </div>

                                <div class="msg-texto">{{ $c->mensaje }}</div>

                                <div class="msg-actions">
                                    {{-- Dropdown de estado --}}
                                    <form action="{{ route('dashboard.mensajes.consulta.update', $c->id) }}" method="POST"
                                          class="msg-estado-wrap" style="margin:0;">
                                        @csrf @method('PATCH')
                                        <span class="msg-estado-label">Estado:</span>
                                        <select name="estado" class="msg-estado-select" onchange="this.form.submit()">
                                            <option value="abierta"    {{ $c->estado === 'abierta'    ? 'selected' : '' }}>Abierta</option>
                                            <option value="en_proceso" {{ $c->estado === 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                                            <option value="cerrada"    {{ $c->estado === 'cerrada'    ? 'selected' : '' }}>Cerrada</option>
                                        </select>
                                    </form>

                                    {{-- Eliminar --}}
                                    <form action="{{ route('dashboard.mensajes.consulta.destroy', $c->id) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar esta consulta?')" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="msg-btn danger">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- ── CONTACTOS (visitantes) ── --}}
                        @foreach($contactos as $k)
                        <div class="msg-card" data-tipo="contactos" data-estado="{{ $k->estado }}"
                             data-texto="{{ strtolower($k->nombre) }} {{ strtolower($k->asunto) }} {{ strtolower($k->mensaje) }}">

                            <div class="msg-card-header" onclick="toggleMsg(this)">
                                <div class="msg-avatar visitante">
                                    {{ strtoupper(substr($k->nombre, 0, 1)) }}{{ strtoupper(substr(strstr($k->nombre, ' '), 1, 1)) }}
                                </div>
                                <div class="msg-meta">
                                    <div class="msg-nombre">{{ $k->nombre }}</div>
                                    <div class="msg-asunto">{{ $k->asunto }}</div>
                                </div>
                                <div class="msg-right">
                                    <span class="pill-tipo visitante">Visitante</span>
                                    <span class="pill-estado {{ $k->estado }}">
                                        @switch($k->estado)
                                            @case('pendiente')  Pendiente  @break
                                            @case('leido')      Leído      @break
                                            @case('respondido') Respondido @break
                                        @endswitch
                                    </span>
                                    <span class="msg-fecha">{{ $k->created_at->format('d/m/Y') }}</span>
                                    <i class="bi bi-chevron-down" style="color:#555;font-size:13px;"></i>
                                </div>
                            </div>

                            <div class="msg-card-body">
                                <div class="msg-detail-grid">
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-envelope" style="margin-right:4px;"></i>Email</div>
                                        <div class="msg-detail-val">{{ $k->email }}</div>
                                    </div>
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-telephone" style="margin-right:4px;"></i>Teléfono</div>
                                        <div class="msg-detail-val">{{ $k->telefono ?? '—' }}</div>
                                    </div>
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-calendar" style="margin-right:4px;"></i>Fecha</div>
                                        <div class="msg-detail-val">{{ $k->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                    <div>
                                        <div class="msg-detail-label"><i class="bi bi-person-x" style="margin-right:4px;"></i>Tipo</div>
                                        <div class="msg-detail-val">Contacto (visitante)</div>
                                    </div>
                                </div>

                                <div class="msg-texto">{{ $k->mensaje }}</div>

                                <div class="msg-actions">
                                    {{-- Dropdown de estado --}}
                                    <form action="{{ route('dashboard.mensajes.contacto.update', $k->id) }}" method="POST"
                                          class="msg-estado-wrap" style="margin:0;">
                                        @csrf @method('PATCH')
                                        <span class="msg-estado-label">Estado:</span>
                                        <select name="estado" class="msg-estado-select" onchange="this.form.submit()">
                                            <option value="pendiente"  {{ $k->estado === 'pendiente'  ? 'selected' : '' }}>Pendiente</option>
                                            <option value="leido"      {{ $k->estado === 'leido'      ? 'selected' : '' }}>Leído</option>
                                            <option value="respondido" {{ $k->estado === 'respondido' ? 'selected' : '' }}>Respondido</option>
                                        </select>
                                    </form>

                                    {{-- Eliminar --}}
                                    <form action="{{ route('dashboard.mensajes.contacto.destroy', $k->id) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este contacto?')" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="msg-btn danger">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- Vacío --}}
                        <div class="msg-empty" id="msgVacio" style="display:none;">
                            <i class="bi bi-inbox"></i>
                            No hay mensajes con ese filtro.
                        </div>

                        @if($consultas->isEmpty() && $contactos->isEmpty())
                        <div class="msg-empty">
                            <i class="bi bi-inbox"></i>
                            No hay mensajes registrados aún.
                        </div>
                        @endif

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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">Seleccioná "Cerrar sesión" si estás listo para terminar tu sesión actual.</div>
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

<script>
    // ── Toggle expandir/colapsar card ──
    function toggleMsg(header) {
        var body = header.nextElementSibling;
        var icon = header.querySelector('.bi-chevron-down, .bi-chevron-up');
        var isOpen = body.classList.contains('show');
        // Cerrar todos
        document.querySelectorAll('.msg-card-body.show').forEach(function(b) {
            b.classList.remove('show');
            var ic = b.previousElementSibling.querySelector('i[class*="chevron"]');
            if (ic) { ic.className = ic.className.replace('chevron-up','chevron-down'); }
        });
        if (!isOpen) {
            body.classList.add('show');
            if (icon) icon.className = icon.className.replace('chevron-down','chevron-up');
        }
    }

    // ── Tabs ──
    var tabActual = 'todos';
    function switchTab(tab, btn) {
        tabActual = tab;
        document.querySelectorAll('.msg-tab').forEach(function(t) { t.classList.remove('active'); });
        btn.classList.add('active');
        filtrarMensajes();
    }

    // ── Filtrar por tab + búsqueda + estado ──
    function filtrarMensajes() {
        var q      = document.getElementById('msgBuscar').value.toLowerCase();
        var estado = document.getElementById('msgFiltroEstado').value;
        var cards  = document.querySelectorAll('.msg-card');
        var visible = 0;

        cards.forEach(function(card) {
            var tipo   = card.getAttribute('data-tipo');   // 'consultas' o 'contactos'
            var est    = card.getAttribute('data-estado');
            var texto  = card.getAttribute('data-texto');

            var passTab    = (tabActual === 'todos') || (tipo === tabActual);
            var passEstado = !estado || est === estado;
            var passQ      = !q      || texto.includes(q);

            if (passTab && passEstado && passQ) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('msgVacio').style.display = visible === 0 ? 'block' : 'none';
    }

    // ── Sidebar submenu ──
    function toggleSubmenu(link) {
        var parentLi = link.closest('.has-submenu');
        var isOpen   = parentLi.classList.contains('open');
        document.querySelectorAll('.has-submenu.open').forEach(function(el) {
            if (el !== parentLi) el.classList.remove('open');
        });
        parentLi.classList.toggle('open', !isOpen);
    }
</script>

<x-volverArriba />
</body>
</html>