<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Verificar Email - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }
        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .login-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }
        .login-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            padding: 40px 36px;
            width: 100%;
            max-width: 420px;
        }
        .login-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 32px;
        }
        .login-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            margin-bottom: 8px;
        }
        .login-brand-name {
            font-family: 'SystemFont', monospace;
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c0392b;
            line-height: 1;
        }
        .login-brand-sub {
            font-size: 12px;
            color: #444;
            margin-top: 12px;
            text-align: center;
            letter-spacing: 0.3px;
            line-height: 1.6;
        }
        .login-divider {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 28px;
        }
        .btn-login-submit {
            width: 100%;
            background: #c0392b;
            border: none;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.5px;
        }
        .btn-login-submit:hover { background: #e74c3c; }
        .alert-success {
            background: #1a2e1a;
            border: 1px solid #2d5a2d;
            color: #6fcf6f;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }
        .icon-wrapper {
            width: 64px;
            height: 64px;
            background: #1c1c1c;
            border: 1px solid #2e2e2e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .icon-wrapper i {
            font-size: 28px;
            color: #c0392b;
        }
        .info-text {
            font-size: 13px;
            color: #555;
            text-align: center;
            line-height: 1.7;
            margin-bottom: 28px;
        }
        .btn-logout {
            background: none;
            border: 1px solid #333;
            color: #555;
            font-size: 13px;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: color 0.15s, border-color 0.15s;
            width: 100%;
            margin-top: 12px;
        }
        .btn-logout:hover { color: #aaa; border-color: #555; }
    </style>
</head>
<body>
    <x-navbar-simplificada/>

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas">
                <span class="login-brand-name">Catacumbas</span>
            </div>

            <hr class="login-divider">

            {{-- Ícono de email --}}
            <div class="icon-wrapper">
                <i class="bi bi-envelope-check"></i>
            </div>

            <p class="info-text">
                ¡Gracias por registrarte! Antes de continuar, verificá tu dirección de email
                haciendo clic en el link que te enviamos. Si no lo recibiste, podemos enviarte otro.
            </p>

            {{-- Mensaje de éxito al reenviar --}}
            @if (session('status') == 'verification-link-sent')
                <div class="alert-success">
                    <i class="bi bi-check-circle me-2"></i>
                    Se envió un nuevo link de verificación a tu email.
                </div>
            @endif

            {{-- Botón reenviar verificación --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-login-submit">
                    <i class="bi bi-send me-2"></i>Reenviar Email de Verificación
                </button>
            </form>

            {{-- Botón cerrar sesión --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                </button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>