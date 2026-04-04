<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Iniciar Sesión - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

<<<<<<< HEAD
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

        /* ── Page layout ──────────────────────────────────────── */
        .login-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }
=======
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        {{-- iconos de google y eso --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="text-white fondo-catacumbas">

         <nav class="navbar navbar-expand-lg navbar-dark py-2 catacumbas-nav">
            <div class="container-fluid">
                
                <a class="navbar-brand" href="/">
                    {{-- aca agregamo el nombre y la imag>en de la nav bar --}}
                    <img src="{{ asset('images/favicon.png') }}" alt="logo" height="42" class="me-2">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                
            </div>
        </nav>
>>>>>>> a489ee816a48e97d1a125b525365e51223fa2136

        /* ── Card ─────────────────────────────────────────────── */
        .login-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            padding: 40px 36px;
            width: 100%;
            max-width: 420px;
        }

        /* ── Brand header ─────────────────────────────────────── */
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
            margin-top: 20px;
            text-align: center;
            letter-spacing: 0.3px;
        }

        /* ── Divider ──────────────────────────────────────────── */
        .login-divider {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 28px;
        }

        /* ── Inputs ───────────────────────────────────────────── */
        .login-field {
            margin-bottom: 14px;
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

        /* ── Forgot password ──────────────────────────────────── */
        .login-forgot {
            text-align: right;
            margin-bottom: 24px;
        }
        .login-forgot a {
            font-size: 12px;
            color: #444;
            text-decoration: none;
            transition: color 0.15s;
        }
        .login-forgot a:hover { color: #aaa; }

        /* ── Submit button ────────────────────────────────────── */
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

<<<<<<< HEAD
        /* ── Social login ─────────────────────────────────────── */
        .social-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .social-divider::before,
        .social-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #222;
        }
        .social-divider span {
            font-size: 11px;
            color: #3a3a3a;
            white-space: nowrap;
            letter-spacing: 0.5px;
        }
        .social-btns {
            display: flex;
            gap: 10px;
            margin-bottom: 28px;
        }
        .btn-social {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #1c1c1c;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            color: #888;
            font-size: 13px;
            padding: 10px;
            text-decoration: none;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            cursor: pointer;
        }
        .btn-social:hover {
            background: #222;
            color: #ddd;
            border-color: #444;
        }
=======
                           <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-catacumbas btn-lg px-5" type="submit">Login</button>
>>>>>>> a489ee816a48e97d1a125b525365e51223fa2136

        /* ── Register link ────────────────────────────────────── */
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
    </style>
</head>
<body>
    <x-navbar />

    <div class="login-wrapper">
        <div class="login-card">

<<<<<<< HEAD
            {{-- Brand --}}
            <div class="login-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas">
                <span class="login-brand-name">Catacumbas</span>
                <p class="login-brand-sub">Ingresá tu cuenta para continuar</p>
            </div>
=======
                            <div>
                            <p class="mb-0">¿No Tienes una cuenta? <a href="/signup" class="text-white-50 fw-bold">Registrarse</a>
                            </p>
                            </div>
>>>>>>> a489ee816a48e97d1a125b525365e51223fa2136

            <hr class="login-divider">

            {{-- Form --}}
            <form action="/login" method="POST">
                @csrf

                <div class="login-field">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com"
                               value="{{ old('email') }}" autocomplete="email">
                    </div>
                    @error('email')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>
<<<<<<< HEAD
=======
                </section>
            
            {{-- Scripts de JS --}}
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        {{-- el footer es la sección que se encuentra en la parte más baja de una página web, --}}
          <x-footer />
    </body>
>>>>>>> a489ee816a48e97d1a125b525365e51223fa2136

                <div class="login-field">
                    <label for="password">Contraseña</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                               autocomplete="current-password">
                    </div>
                    @error('password')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="login-forgot">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-login-submit">Iniciar Sesión</button>
            </form>

            {{-- Social --}}
            <div class="social-divider"><span>o continuá con</span></div>
            <div class="social-btns">
                <a href="#" class="btn-social">
                    <i class="fab fa-google"></i> Google
                </a>
                <a href="#" class="btn-social">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
            </div>

            {{-- Register --}}
            <div class="login-register">
                ¿No tenés cuenta? <a href="/register">Registrarse</a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>