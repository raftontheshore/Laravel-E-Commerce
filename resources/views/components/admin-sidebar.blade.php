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

    .sidebar-dark.bg-gradient-primary,
    .bg-gradient-primary {
        background: linear-gradient(180deg, #111111 0%, #1a1a1a 100%) !important;
        border-right: 1px solid #c0392b !important;
    }

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

    .nav-item.has-submenu.open > .submenu { display: block; }

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

    .submenu li a:hover { color: #ffffff !important; background-color: rgba(192,57,43,.18); }
    .submenu li a.active { color: #e74c3c !important; font-weight: 600; }
    .submenu li a i { font-size: 12px; width: 14px; text-align: center; flex-shrink: 0; }

    .nav-item.has-submenu.open > .nav-link,
    .nav-item.has-submenu.active > .nav-link { color: #ffffff !important; }
    .nav-item.active-page > .nav-link { color: #ffffff !important; font-weight: 700; }

    @media (max-width: 768px) {
        #accordionSidebar { display: none !important; }
    }

    /* ── OFFCANVAS MÓVIL ── */
    #adminOffcanvas {
        position: fixed;
        top: 0;
        left: -260px;
        width: 260px;
        height: 100vh;
        z-index: 9999;
        background: #111111;
        border-right: 1px solid #c0392b;
        transition: left 0.3s ease;
        overflow-y: auto;
    }
    #adminOffcanvas.show { left: 0; }

    #offcanvas-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        z-index: 9998;
    }
    #offcanvas-overlay.show { display: block; }

    .admin-offcanvas-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid #1e1e1e;
    }

    .admin-offcanvas-close {
        background: none;
        border: none;
        color: #aaaaaa;
        font-size: 20px;
        cursor: pointer;
        line-height: 1;
        padding: 0;
    }
    .admin-offcanvas-close:hover { color: #ffffff; }

    .sidebar-nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        color: #aaaaaa;
        text-decoration: none;
        font-size: 14px;
        border-bottom: 1px solid #1e1e1e;
        transition: color .15s, background .15s;
    }

    .sidebar-nav-link:hover,
    .sidebar-nav-link.active { color: #fff; background: rgba(192,57,43,.15); }

    .sidebar-nav-link i { width: 18px; text-align: center; color: #666; }

    .sidebar-section {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: #444;
        padding: 14px 20px 6px;
    }

    .sidebar-sub-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 20px 9px 40px;
        color: #888;
        text-decoration: none;
        font-size: 13px;
        transition: color .15s, background .15s;
        border-bottom: 1px solid #1a1a1a;
    }

    .sidebar-sub-link:hover { color: #fff; background: rgba(192,57,43,.1); }
    .sidebar-sub-link.active { color: #e74c3c; font-weight: 600; }
</style>

{{-- ═══════════════════════════════
     SIDEBAR DESKTOP (≥769px)
═══════════════════════════════ --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center h-auto py-4" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-text mx-3 catacumbas-logo-text">
            CATACUMBAS
            <div class="catacumbas-logo-sub">PANEL DE CONTROL</div>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('dashboard') ? 'active-page' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">

    {{-- Productos --}}
    <li class="nav-item has-submenu {{ request()->routeIs('admin.productos.*') ? 'open active' : '' }}">
        <a class="nav-link" href="#" onclick="toggleSubmenu(this); event.preventDefault();">
            <i class="fas fa-fw fa-box"></i>
            <span>Productos</span>
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
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span>
        </a>
    </li>

    {{-- Categorías --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categorias.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Categorías</span>
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
        <a class="nav-link" href="#" onclick="toggleSubmenu(this); event.preventDefault();">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pedidos</span>
            <i class="fas fa-chevron-right submenu-arrow"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{ route('admin.pedidos.index') }}"
                   class="{{ request()->routeIs('admin.pedidos.index') && !request()->has('estado') ? 'active' : '' }}">
                    <i class="fas fa-list"></i> Ver todos
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pedidos.index', ['estado' => 'pendiente']) }}"
                   class="{{ request()->input('estado') == 'pendiente' ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Pendientes
                </a>
            </li>
        </ul>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>

{{-- ═══════════════════════════════
     OVERLAY + OFFCANVAS MÓVIL
═══════════════════════════════ --}}
<div id="offcanvas-overlay"></div>

<div id="adminOffcanvas">
    <div class="admin-offcanvas-header">
        <div class="catacumbas-logo-text" style="font-size:16px;">
            CATACUMBAS
            <div class="catacumbas-logo-sub">PANEL DE CONTROL</div>
        </div>
        <button class="admin-offcanvas-close" id="offcanvasCloseBtn">&#x2715;</button>
    </div>

    <a href="{{ url('/dashboard') }}"
       class="sidebar-nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>

    <div class="sidebar-section">Productos</div>
    <a href="{{ route('admin.productos.index') }}"
       class="sidebar-sub-link {{ request()->routeIs('admin.productos.index') ? 'active' : '' }}">
        <i class="fas fa-eye"></i> Ver todos
    </a>
    <a href="{{ route('admin.productos.create') }}"
       class="sidebar-sub-link {{ request()->routeIs('admin.productos.create', 'admin.productos.edit') ? 'active' : '' }}">
        <i class="fas fa-plus"></i> Añadir producto
    </a>

    <a href="{{ route('admin.usuarios') }}"
       class="sidebar-nav-link {{ request()->routeIs('admin.usuarios*') ? 'active' : '' }}">
        <i class="fas fa-users"></i> Usuarios
    </a>

    <a href="{{ route('admin.categorias.index') }}" class="sidebar-nav-link">
        <i class="fas fa-tags"></i> Categorías
    </a>

    <a href="{{ route('dashboard.mensajes') }}"
       class="sidebar-nav-link {{ request()->routeIs('dashboard.mensajes') ? 'active' : '' }}">
        <i class="fas fa-comments"></i> Consultas
    </a>

    <div class="sidebar-section">Pedidos</div>
    <a href="{{ route('admin.pedidos.index') }}"
       class="sidebar-sub-link {{ request()->routeIs('admin.pedidos.index') && !request()->has('estado') ? 'active' : '' }}">
        <i class="fas fa-list"></i> Ver todos
    </a>
    <a href="{{ route('admin.pedidos.index', ['estado' => 'pendiente']) }}"
       class="sidebar-sub-link {{ request()->input('estado') == 'pendiente' ? 'active' : '' }}">
        <i class="fas fa-clock"></i> Pendientes
    </a>
</div>

@once
<script>
    // ── Submenús desktop ──
    function toggleSubmenu(link) {
        var parentLi = link.closest('.has-submenu');
        var isOpen   = parentLi.classList.contains('open');
        document.querySelectorAll('.has-submenu.open').forEach(function(el) {
            if (el !== parentLi) el.classList.remove('open');
        });
        parentLi.classList.toggle('open', !isOpen);
    }

    // ── Offcanvas móvil ──
    document.addEventListener('DOMContentLoaded', function () {
        var offcanvas = document.getElementById('adminOffcanvas');
        var overlay   = document.getElementById('offcanvas-overlay');
        var toggleBtn = document.getElementById('sidebarToggleTop');
        var closeBtn  = document.getElementById('offcanvasCloseBtn');

        function openOffcanvas() {
            offcanvas.classList.add('show');
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeOffcanvas() {
            offcanvas.classList.remove('show');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        if (toggleBtn) toggleBtn.addEventListener('click', function () {
            offcanvas.classList.contains('show') ? closeOffcanvas() : openOffcanvas();
        });

        if (closeBtn)  closeBtn.addEventListener('click', closeOffcanvas);
        if (overlay)   overlay.addEventListener('click', closeOffcanvas);

        // Cerrar al navegar
        offcanvas.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', closeOffcanvas);
        });
    });
</script>
@endonce