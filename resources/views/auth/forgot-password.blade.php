<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Recuperar Contraseña - Catacumbas</title>
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
        .login-field {
            margin-bottom: 20px;
        }
        .login-field label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 6px;
        }
        .login-field .input-wrap {
            display: flex;
            align-items: center;
            background: #1c1c1c;
            border: 1px solid #2e2e2e;
            border-radius: 8px;
            padding: 0 12px;
            gap: 10px;
            transition: border-color 0.15s;
        }
        .login-field .input-wrap:focus-within {
            border-color: #c0392b;
        }
        .login-field .input-wrap i {
            color: #444;
            font-size: 13px;
            flex-shrink: 0;
        }
        .login-field .input-wrap input {
            background: transparent;
            border: none;
            outline: none;
            color: #ddd;
            font-size: 14px;
            padding: 12px 0;
            width: 100%;
        }
        .login-field .input-wrap input::placeholder { color: #3a3a3a; }
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
            margin-bottom: 24px;
        }
        .btn-login-submit:hover { background: #e74c3c; }
        .login-register {
            text-align: center;
            font-size: 13px;
            color: #444;
            border-top: 1px solid #1e1e1e;
            padding-top: 20px;
        }
        .login-register a {
            color: #c0392b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.15s;
        }
        .login-register a:hover { color: #e74c3c; }
        .alert-success {
            background: #1a2e1a;
            border: 1px solid #2d5a2d;
            color: #6fcf6f;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <x-navbar-simplificada/>

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas">
                <span class="login-brand-name">Catacumbas</span>
                <p class="login-brand-sub">
                    Ingresá tu email y te enviaremos<br>un link para restablecer tu contraseña.
                </p>
            </div>

            <hr class="login-divider">

            {{-- Mensaje de éxito --}}
            @if (session('status'))
                <div class="alert-success">
                    <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="login-field">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope"></i>
                        <input type="email" id="email" name="email"
                               placeholder="tucorreo@ejemplo.com"
                               value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login-submit">
                    Enviar Link de Recuperación
                </button>
            </form>

            <div class="login-register">
                ¿Recordaste tu contraseña? <a href="{{ route('login') }}">Iniciar Sesión</a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>