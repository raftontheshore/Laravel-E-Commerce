{{--
    COMPONENTE: resources/views/components/admin-sidebar.blade.php
    USO: <x-admin-sidebar />
--}}

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

    /* ── SIDEBAR ── */
    .sidebar-dark.bg-gradient-primary,
    .bg-gradient-primary {
        background: linear-gradient(180deg, #111111 0%, #1a1a1a 100%) !important;
        border-right: 1px solid #c0392b !important;
    }

    /* ── SUBMENÚS ── */
    .nav-item.has-submenu > .nav-link {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }

    .nav-item.has-submenu > .nav-link .submenu-arrow {
        font-size: 11px;
        transition: transform 0.25s ease;
        color: #888;
        flex-shrink: 0;
    }

    .nav-item.has-submenu.open > .nav-link .submenu-arrow {
        transform: rotate(90deg);
        color: #c0392b;
    }

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

    .nav-item.has-submenu.open > .nav-link,
    .nav-item.has-submenu.active > .nav-link {
        color: #ffffff !important;
    }

    .nav-item.active-page > .nav-link {
        color: #ffffff !important;
        font-weight: 700;
    }

    /* ── RESPONSIVE MÓVIL ── */
    @media (max-width: 768px) {
        .sidebar {
            width: 6.5rem !important;
        }

        .sidebar .nav-item .nav-link span,
        .sidebar .nav-item .submenu-arrow,
        .catacumbas-logo-sub,
        .submenu {
            display: none !important;
        }

        .catacumbas-logo-text {
            font-size: 10px !important;
            letter-spacing: 1px !important;
        }

        .sidebar .nav-item .nav-link {
            justify-content: center !important;
            padding: 0.75rem 1rem;
        }

        .sidebar .nav-item .nav-link i {
            margin: 0 !important;
            font-size: 1.1rem;
        }

        .sidebar-brand-text {
            text-align: center !important;
        }

        #content-wrapper {
            margin-left: 0 !important;
        }
    }
</style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Logo --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center h-auto py-4" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-text mx-3 catacumbas-logo-text">
            CATACUMBAS
            <div class="catacumbas-logo-sub">PANEL DE CONTROL</div>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    {{-- Dashboard --}}
    <li class="nav-item {{ request()->is('dashboard') ? 'active-page' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">

    {{-- Productos --}}
    <li class="nav-item has-submenu {{ request()->routeIs('admin.productos.*') ? 'open active' : '' }}">
        <a class="nav-link" href="#" onclick="toggleSubmenu(this); return false;">
            <span>
                <i class="fas fa-fw fa-box"></i>
                <span>Productos</span>
            </span>
            <i class="fas fa-chevron-right submenu-arrow"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{ route('admin.productos.index') }}"
                   class="{{ request()->routeIs('admin.productos.index') ? 'active' : '' }}">
                    <i class="fas fa-eye"></i> Ver todos
                </a>
            </li>
            <li>
                <a href="{{ route('admin.productos.create') }}"
                   class="{{ request()->routeIs('admin.productos.create', 'admin.productos.edit') ? 'active' : '' }}">
                    <i class="fas fa-plus"></i> Añadir producto
                </a>
            </li>
        </ul>
    </li>

   {{-- Usuarios --}}
<li class="nav-item {{ request()->routeIs('admin.usuarios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.usuarios') }}">
        <i class="fas fa-fw fa-users"></i><span>Usuarios</span>
    </a>
</li>

    {{-- Categorías --}}
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.categorias.index') }}">
        <i class="fas fa-fw fa-tags"></i><span>Categorías</span>
    </a>
</li>


    {{-- Consultas --}}
    <li class="nav-item {{ request()->routeIs('dashboard.mensajes') ? 'active-page' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.mensajes') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Consultas</span>
        </a>
    </li>
    
    {{-- Pedidos --}}
    <li class="nav-item has-submenu {{ request()->routeIs('admin.pedidos*') ? 'open active' : '' }}">
        <a class="nav-link" href="#" onclick="toggleSubmenu(this); return false;">
            <span>
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Pedidos</span>
            </span>
            <i class="fas fa-chevron-right submenu-arrow"></i>
        </a>
        <ul class="submenu">
            <li>
                <!-- Ver todos: se activa si estamos en index y NO hay un filtro de estado -->
                <a href="{{ route('admin.pedidos.index') }}" class="{{ request()->routeIs('admin.pedidos.index') && !request()->has('estado') ? 'active' : '' }}">
                    <i class="fas fa-list"></i> Ver todos
                </a>
            </li>
            <li>
                <!-- Pendientes: envía una variable por la URL (?estado=pendiente) y se activa si existe esa variable -->
                <a href="{{ route('admin.pedidos.index', ['estado' => 'pendiente']) }}" class="{{ request()->input('estado') == 'pendiente' ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Pendientes
                </a>
            </li>
        </ul>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

</ul>

{{-- Script del sidebar — se incluye una sola vez con @once --}}
@once
<script>
    function toggleSubmenu(link) {
        var parentLi = link.closest('.has-submenu');
        var isOpen   = parentLi.classList.contains('open');

        document.querySelectorAll('.has-submenu.open').forEach(function(el) {
            if (el !== parentLi) el.classList.remove('open');
        });

        parentLi.classList.toggle('open', !isOpen);
    }
</script>
@endonce