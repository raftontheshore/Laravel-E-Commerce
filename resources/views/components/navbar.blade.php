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
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }

        /* ── Navbar ─────────────────────────────────────────────── */
        .catacumbas-nav {
            background-color: #0d0d0d;
            border-bottom: 1px solid #2a2a2a;
        }

        /* Brand */
        .catacumbas-nav .navbar-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .catacumbas-nav .brand-name {
            font-family: 'SystemFont', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #c0392b;
            line-height: 1;
            margin-top: 4px;
            text-align: center;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease, margin-top 0.3s ease;
        }
        .catacumbas-nav .navbar-brand:hover .brand-name {
            max-height: 20px;
            opacity: 1;
            margin-top: 4px;
        }

        /* Nav links */
        .catacumbas-nav .nav-link {
            position: relative;
            color: #b0b0b0 !important;
            transition: color 0.15s;
        }
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

        /* Ocultar flecha nativa de Bootstrap */
        .catacumbas-nav .nav-link.dropdown-toggle::after {
            display: none !important;
        }

        /* Underline rojo para dropdown-toggle usando ::before */
        .catacumbas-nav .nav-link.dropdown-toggle {
            position: relative;
        }
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

        /* Search */
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

        /* Log in */
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

        /* Sign up */
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

        /* ── Navbar Drop Down ─────────────────────────────── */
        .catacumbas-nav .dropdown-menu {
    background-color: #1a1c20;
    border: 1px solid #2a2a2a;
    border-radius: 4px;
    margin-top: 16px; /* antes era 8px, subilo hasta que quede bien */
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

        @media (min-width: 992px) {
    .catacumbas-nav .dropdown:hover > .dropdown-menu {
        display: block;
        margin-top: 16px !important; /* mismo valor */
    }
            .catacumbas-nav .dropdown-menu::before {
                content: '';
                position: absolute;
                top: -15px;
                left: 0;
                width: 100%;
                height: 15px;
            }
        }

        .catacumbas-nav .dropdown:hover .nav-link {
            color: #ffffff !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark py-2 catacumbas-nav">
    <div class="container-fluid px-4">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/favicon.png') }}" alt="logo" height="36">
            <span class="brand-name">Catacumbas</span>
        </a>

        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3" style="gap: 4px;">

                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('tienda*') ? 'active' : '' }}" href="/tienda">Tienda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('explorar*') ? 'active' : '' }}" href="/explorar">Explorar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fs-6 {{ request()->is('nosotros*') ? 'active' : '' }}" href="/nosotros">Nosotros</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link fs-6 dropdown-toggle {{ request()->is('ayuda*') ? 'active' : '' }}"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Soporte
                    </a>
                    <ul class="dropdown-menu border-0 shadow-lg">
                        <li><a class="dropdown-item" href="/contacto">Contacto</a></li>
                        <li><a class="dropdown-item" href="/faq">FAQ</a></li>
                    </ul>
                </li>

            </ul>

            <div class="d-flex align-items-center ms-auto gap-3">
                <div class="search-wrapper">
                    <i class="bi bi-search"></i>
                    <input type="search" placeholder="Buscar" aria-label="Search">
                </div>
                <a href="/login" class="btn-login">Log in</a>
                <a href="/signup" class="btn btn-signup">Sign up</a>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>