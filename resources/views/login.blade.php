{{-- ============================================================
    PÁGINA: Iniciar Sesión
    Formulario de autenticación de usuarios.
    Incluye validación de campos vacíos en JS vanilla.
    ⚠ Sin conexión a BD aún — el botón simula el login
      con validación básica antes de redirigir al home.
============================================================ --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap 5.3.2, Bootstrap Icons, Font Awesome, estilos globales --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Iniciar Sesión - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* ── Fuente pixel art personalizada ──────────────────────
           Cargada desde /public/fonts/
           font-display: swap → usa fuente del sistema mientras
           carga la custom (evita texto invisible)                 */
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }
         /* ── Base: fondo negro, layout vertical full-height ──────
           flex-direction: column habilita el sticky footer        */
        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── Page layout ──────────────────────────────────────── 
        ── Wrapper: centra la card en pantalla ─────────────────
           - flex: 1 → ocupa todo el espacio entre navbar y fondo
           - align-items: center → centrado VERTICAL (a diferencia
             de privacy/terms que usan flex-start)
           - padding lateral de 16px para móvil                 */
        .login-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        /* ── Card ───────────────────────────────────────────────
        - max-width: 420px → más angosta que privacy/terms
             (760px) ya que solo contiene un formulario simple  */
        .login-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            padding: 40px 36px;
            width: 100%;
            max-width: 420px;
        }

        /* ── Brand header ─────────────────────────────────────── 
        Logo 48x48 + nombre en SystemFont rojo + subtítulo gris */
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

        /* ── Divisor ─────────────────────────────────────────────
           Línea horizontal sutil entre el header y el form        */
        .login-divider {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 28px;
        }

        /* ── Inputs ─────────────────────────────────────────────
        .login-field: wrapper de cada campo (label + input-wrap)
           
           label: 11px, uppercase, letter-spacing → estilo técnico/retro

           .input-wrap: contenedor ícono + input
           - display: flex → ícono y input en fila
           - focus-within: cuando el input tiene foco, el BORDE
             COMPLETO del wrap cambia a rojo (no solo el input)
             → efecto visual más limpio que el outline nativo

           input: fondo transparente (hereda #1c1c1c del wrap),
           sin borde ni outline propios, color texto #ddd  */
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

        /* ── Submit button ──────────────────────────────────────
        - Ancho completo (width: 100%)
           - Fondo rojo #c0392b → hover más claro #e74c3c
           - Usado tanto para <button> real (futuro)
             como para el <a> simulado (actual)                   */
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

        /* ── Register link ────────────────────────────────────── */
        /* ── Link de registro ────────────────────────────────────
           Al pie de la card, separado por border-top sutil
           Link rojo → /signup                                     */
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
    <x-navbar-simplificada/>

    <div class="login-wrapper">
        <div class="login-card">

            {{-- HEADER: logo + nombre + subtítulo --}}
            <div class="login-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas">
                <span class="login-brand-name">Catacumbas</span>
                <p class="login-brand-sub">Ingresá tu cuenta para continuar</p>
            </div>

            <hr class="login-divider">

            {{-- Form --}}
            {{--
                 action="/login" method="POST" → ruta real de Laravel
                 @csrf: token de seguridad obligatorio en forms POST
                 (previene ataques Cross-Site Request Forgery)        --}}
            <form id="loginForm" action="/login" method="POST">
                @csrf

                {{-- CAMPO: Email
                     - value="{{ old('email') }}" → repopula el campo
                       si el form falla (el usuario no pierde lo escrito)
                     - autocomplete="email" → sugiere emails guardados
                     - @error('email'): muestra error de validación
                       del servidor (Laravel) si existe                --}}
                <div class="login-field">
                    <label for="email">Email</label>
                    <div class="input-wrap" id="wrapEmail">
                        <i class="bi bi-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com"
                               value="{{ old('email') }}" autocomplete="email" required>
                    </div>

                    {{-- Error JS (campo vacío): oculto por defecto, visible via JS --}}
                    <small id="emailError" style="color: #c0392b; display: none; font-size: 11px; margin-top: 5px; font-weight: bold;">
                        Por favor, ingresá tu correo.
                    </small>
                    {{-- Error Laravel (credenciales inválidas): viene del servidor --}}
                    @error('email')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>
                {{-- CAMPO: Contraseña
                     - autocomplete="current-password" → sugiere
                       contraseñas guardadas en el gestor del navegador
                     - Sin value (nunca repoblar contraseñas por seguridad)
                     - @error('password'): error del servidor            --}}
                <div class="login-field">
                    <label for="password">Contraseña</label>
                    <div class="input-wrap" id="wrapPassword">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                               autocomplete="current-password" required>
                    </div>
                    <small id="passwordError" style="color: #c0392b; display: none; font-size: 11px; margin-top: 5px; font-weight: bold;">
                        Por favor, ingresá tu contraseña.
                    </small>
                    @error('password')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Link recuperar contraseña → /construccion (en desarrollo) --}}
                <div class="login-forgot">
                    <a href="/construccion">¿Olvidaste tu contraseña?</a>
                </div>

                {{-- botón de iniciar sesión pero para cuando tengamos base de datos 
                <button type="submit" class="btn-login-submit">Iniciar Sesión</button>--}}

                <a href="/" id="btnSimularLogin" class="btn-login-submit text-center text-decoration-none d-block">Iniciar Sesión</a>
            </form>

            {{-- Link al registro para usuarios sin cuenta → /signup --}}
            <div class="login-register">
                ¿No tenés cuenta? <a href="/signup">Registrarse</a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('btnSimularLogin').addEventListener('click', function(event) {
            // Prevenimos que el enlace cambie de página inmediatamente
            // Cancela la navegación inmediata del <a> para validar primero
            event.preventDefault();

            // Obtenemos los valores de los inputs
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            let isValid = true;// Flag: ambos campos deben pasar

            // Validación simple de Email
            // .trim() elimina espacios en blanco al inicio/fin
            // Un campo con solo espacios se considera vacío
            if (emailInput.value.trim() === '') {
                emailError.style.display = 'block';     // Muestra error
                document.getElementById('wrapEmail').style.borderColor = '#c0392b'; // Borde rojo
                isValid = false;
            } else {
                emailError.style.display = 'none';   // Oculta error
                document.getElementById('wrapEmail').style.borderColor = '#2e2e2e'; // Volver al color original
            }

            // Validación simple de Contraseña
            if (passwordInput.value.trim() === '') {
                passwordError.style.display = 'block';
                document.getElementById('wrapPassword').style.borderColor = '#c0392b';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
                document.getElementById('wrapPassword').style.borderColor = '#2e2e2e'; // Volver al color original
            }

             // ── Redirección ───────────────────────────────────────
            // Solo navega si ambos campos tienen contenido.
            // event.target.href obtiene la ruta "/" directamente
            // del atributo href del <a> clickeado
            if (isValid) {
                // event.target.href saca la ruta "/" directamente de la etiqueta <a>
                window.location.href = event.target.href; 
            }
        });
    </script>
</body>
</html>