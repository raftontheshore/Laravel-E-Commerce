{{--
    ============================================================
    COMPONENTE: Barra de Navegación principal (catacumbas-nav)
    ------------------------------------------------------------
    Navbar principal del sitio. Incluye:
      - Logo + nombre de marca
      - Links de navegación con indicador de página activa
      - Bloque de autenticación (Ingresar / Registrarse)
    En móvil colapsa en un menú hamburguesa (Bootstrap).
    ============================================================
--}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* Fuente retro local, usada en el nombre de la marca */
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap; /* Muestra fallback mientras carga, evita texto invisible */
        }

        /* --- Contenedor principal de la navbar ---
           Fondo casi negro con borde inferior sutil para separar
           visualmente la nav del contenido de la página. */
        .catacumbas-nav {
            background-color: #0d0d0d;
            border-bottom: 1px solid #2a2a2a;
        }

        /* --- Bloque de marca (logo + nombre) ---
           flex-direction: column apila el logo arriba y el nombre abajo,
           ambos centrados horizontalmente. */
        .catacumbas-nav .navbar-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Nombre en fuente retro, rojo de marca, todo en mayúsculas */
        .catacumbas-nav .brand-name {
            font-family: 'SystemFont', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #c0392b;
            line-height: 1;
            margin-top: 4px;
            text-align: center;
        }
        /* El nombre se mantiene visible en hover (previsto para animación futura) */
        .catacumbas-nav .navbar-brand:hover .brand-name {
            max-height: 20px;
            opacity: 1;
            margin-top: 4px;
        }

        /* --- Links de navegación ---
           Color gris por defecto; blanco en hover/activo.
           El subrayado rojo se anima con scaleX para crecer desde el centro. */
        .catacumbas-nav .nav-link {
            position: relative; /* Necesario para posicionar el ::after */
            color: #b0b0b0 !important;
            transition: color 0.15s;
        }
        /* Línea roja inferior animada: empieza en scaleX(0) (invisible)
           y crece a scaleX(1) en hover y en el link activo. */
        .catacumbas-nav .nav-link::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: -2px;
            height: 2px;
            background: #c0392b;
            border-radius: 1px;
            transform: scaleX(0);
            transition: transform 0.2s ease;
        }
        .catacumbas-nav .nav-link:hover,
        .catacumbas-nav .nav-link.active { color: #ffffff !important; }
        .catacumbas-nav .nav-link:hover::after,
        .catacumbas-nav .nav-link.active::after { transform: scaleX(1); }

        /* --- Dropdown: flecha nativa de Bootstrap ---
           Se oculta para usar un subrayado propio en su lugar
           (Bootstrap usa ::after para la flecha, entonces el subrayado
           se reimplementa con ::before para no colisionar). */
        .catacumbas-nav .nav-link.dropdown-toggle::after {
            display: none !important;
        }
        .catacumbas-nav .nav-link.dropdown-toggle {
            position: relative;
        }
        /* Subrayado rojo para el dropdown-toggle, usando ::before
           ya que ::after está reservado para la flecha nativa (aunque oculta). */
        .catacumbas-nav .nav-link.dropdown-toggle::before {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: -2px;
            height: 2px;
            background: #c0392b;
            border-radius: 1px;
            transform: scaleX(0);
            transition: transform 0.2s ease;
        }
        .catacumbas-nav .nav-link.dropdown-toggle:hover::before,
        .catacumbas-nav .nav-link.dropdown-toggle.active::before,
        .catacumbas-nav .dropdown:hover .nav-link.dropdown-toggle::before {
            transform: scaleX(1);
        }

        /* --- Buscador (actualmente desactivado) ---
           Diseñado para activarse fácilmente cuando se necesite.
           :focus-within ilumina el borde cuando el input está enfocado. */
        .catacumbas-nav .search-wrapper {
            display: flex;
            align-items: center;
            background: #1c1c1c;
            border: 1px solid #2e2e2e;
            border-radius: 6px;
            padding: 0 10px;
            gap: 8px;
            transition: border-color 0.15s;
        }
        .catacumbas-nav .search-wrapper:focus-within { border-color: #555; }
        .catacumbas-nav .search-wrapper i { color: #555; font-size: 13px; }
        .catacumbas-nav .search-wrapper input {
            background: transparent;
            border: none;
            outline: none;
            color: #ccc;
            font-size: 13px;
            padding: 6px 0;
            width: 180px;
        }
        .catacumbas-nav .search-wrapper input::placeholder { color: #555; }

        /* --- Botón Ingresar (outline pill) ---
           Estilo discreto con borde redondeado; aclara en hover. */
        .catacumbas-nav .btn-login {
            color: #aaa;
            font-size: 13px;
            text-decoration: none;
            padding: 6px 14px;
            border: 1px solid #333;
            border-radius: 20px;
            transition: color 0.15s, border-color 0.15s;
            white-space: nowrap;
        }
        .catacumbas-nav .btn-login:hover { color: #fff; border-color: #555; }

        /* --- Botón Registrarse (relleno, rojo de marca) ---
           CTA principal de autenticación. white-space: nowrap evita
           que el texto se rompa en dos líneas en viewports intermedios. */
        .catacumbas-nav .btn-signup {
            background-color: #c0392b;
            border: none;
            color: #fff;
            font-size: 13px;
            padding: 7px 18px;
            border-radius: 20px;
            white-space: nowrap;
            transition: background-color 0.15s;
        }
        .catacumbas-nav .btn-signup:hover { background-color: #e74c3c; color: #fff; }

        /* --- Dropdown menu ---
           Fondo oscuro con sombra pronunciada para flotar sobre el contenido.
           margin-top crea separación entre el trigger y el panel. */
        .catacumbas-nav .dropdown-menu {
            background-color: #1a1c20;
            border: 1px solid #2a2a2a;
            border-radius: 4px;
            margin-top: 16px;
            padding: 8px 0;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }
        .catacumbas-nav .dropdown-item {
            color: #b0b0b0;
            font-size: 13px;
            padding: 8px 20px;
            transition: background-color 0.15s ease, color 0.15s ease;
        }
        .catacumbas-nav .dropdown-item:hover,
        .catacumbas-nav .dropdown-item:focus {
            background-color: #2a2d33;
            color: #ffffff;
        }
        .catacumbas-nav .dropdown-divider {
            border-top-color: #2a2a2a;
            margin: 4px 0;
        }

        /* --- Dropdown hover en desktop (≥ 992px) ---
           Bootstrap solo abre dropdowns con click; este bloque agrega
           apertura con hover en pantallas grandes.
           El ::before invisible actúa como "puente": cubre el gap de 15px
           entre el trigger y el panel para que el mouse no cierre el menú
           al cruzar ese espacio. */
        @media (min-width: 992px) {
            .catacumbas-nav .dropdown:hover > .dropdown-menu {
                display: block;
                margin-top: 16px !important;
            }
            .catacumbas-nav .dropdown-menu::before {
                content: '';
                position: absolute;
                top: -15px;
                left: 0;
                width: 100%;
                height: 15px; /* Igual al margin-top del panel */
            }
        }

        .catacumbas-nav .dropdown:hover .nav-link {
            color: #ffffff !important;
        }

        /* --- Ajustes responsivos (móvil, < 992px) ---
           El buscador y los botones de auth se estiran al ancho completo
           del menú colapsado para ser más fáciles de tocar. */
        @media (max-width: 991px) {
            .catacumbas-nav .search-wrapper { width: 100%; }
            .catacumbas-nav .search-wrapper input { width: 100%; }
            .catacumbas-nav .btn-login  { flex: 1; text-align: center; }
            .catacumbas-nav .btn-signup { flex: 1; text-align: center; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark py-2 catacumbas-nav">
    <div class="container-fluid px-4">

        {{-- Logo + nombre de marca. Enlaza a la home. --}}
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/favicon.png') }}" alt="logo" height="36">
            <span class="brand-name">Catacumbas</span>
        </a>

        {{-- Botón hamburguesa (visible solo en móvil, < 992px).
             data-bs-target apunta al id del menú colapsable. --}}
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menú colapsable. En desktop se muestra siempre;
             en móvil se oculta y se abre con el botón hamburguesa. --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Links principales. request()->is() marca el link como 'active'
                 si la URL actual coincide con el patrón dado.
                 ⚠️ "Principal" usa '/*' en lugar de '/' — esto lo marca como
                 activo en TODAS las rutas. Corregir a request()->is('/') --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3" style="gap: 4px;">
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('/*') ? 'active' : '' }}" href="/">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('tienda*') ? 'active' : '' }}" href="/tienda">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('nosotros*') ? 'active' : '' }}" href="/nosotros">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('faq*') ? 'active' : '' }}" href="/faq">Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('contacto*') ? 'active' : '' }}" href="/contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('términos*') ? 'active' : '' }}" href="/terminos">Términos De Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('privacidad*') ? 'active' : '' }}" href="/privacidad">Política De Privacidad</a>
                </li>
            </ul>

            {{-- Bloque derecho: buscador (desactivado) + botones de auth.
                 flex-column en móvil → flex-row en desktop (flex-lg-row).
                 mt-3 mt-lg-0 agrega margen superior solo en el menú colapsado. --}}
            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center ms-auto gap-2 mt-3 mt-lg-0">

                {{-- ── Buscador de texto (actualmente desactivado) ──────────────
                --}}
                <!--
                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input type="search" placeholder="Buscar" aria-label="Search">
                </div>
                -->

                {{-- Botones de autenticación: Ingresar (outline) y Registrarse (relleno rojo) --}}
                <div class="d-flex gap-2 justify-content-center">
                    <a href="/login" class="btn-login">Ingresar</a>
                    <a href="/signup" class="btn btn-signup">Registrarse</a>
                </div>
            </div>

        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>