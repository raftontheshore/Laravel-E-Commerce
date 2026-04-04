<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }

        .catacumbas-nav-auth {
            background-color: #0d0d0d;
            border-bottom: 1px solid #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 10px 24px;
            position: relative;
            min-height: 57px;
        }

        /* Back link — left side */
        .catacumbas-nav-auth .back-link {
            position: absolute;
            left: 24px;
            font-size: 13px;
            color: #555;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.15s;
        }
        .catacumbas-nav-auth .back-link:hover { color: #aaa; }
        .catacumbas-nav-auth .back-link i { font-size: 12px; }
    </style>
</head>
<body>

<nav class="catacumbas-nav-auth">
    <a href="/tienda" class="back-link">
        <i class="bi bi-arrow-left"></i> Volver a la tienda
    </a>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>