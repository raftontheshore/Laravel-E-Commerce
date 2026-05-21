<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Catacumbas - Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="fondo-catacumbas">

    <x-navbar-simplificada/>

    <main class="login-wrapper">
        <div class="login-card">

            <div class="login-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Logo Catacumbas">
                <div class="login-brand-name">CATACUMBAS</div>
                <div class="login-brand-sub">Creá tu cuenta para unirte</div>
            </div>

            <hr class="login-divider">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- CAMPO: Nombre --}}
                <div class="login-field">
                    <label>NOMBRE</label>
                    <div class="input-wrap">
                        <i class="bi bi-person"></i>
                        <input type="text" name="nombre" id="regName"
                               placeholder="Tu nombre completo"
                               value="{{ old('nombre') }}" required>
                    </div>
                    @error('nombre')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CAMPO: Email --}}
                <div class="login-field">
                    <label>EMAIL</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" id="regEmail"
                               placeholder="tucorreo@ejemplo.com"
                               value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CAMPO: Contraseña --}}
                <div class="login-field">
                    <label>CONTRASEÑA</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" id="regPassword"
                               placeholder="••••••••" required>
                    </div>
                    @error('password')
                        <div style="font-size:12px; color:#e74c3c; margin-top:5px;">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CAMPO: Repetir contraseña --}}
                <div class="login-field">
                    <label>REPETIR CONTRASEÑA</label>
                    <div class="input-wrap" id="wrapConfirm">
                        <i class="bi bi-shield-lock"></i>
                        <input type="password" name="password_confirmation"
                               id="regPasswordConfirm"
                               placeholder="••••••••" required>
                    </div>
                    <small id="passwordError" style="color:#c0392b; display:none; font-size:11px; margin-top:5px; font-weight:bold;">
                        Las contraseñas no coinciden
                    </small>
                </div>

                {{-- CHECKBOX: Términos --}}
                <div class="d-flex align-items-center mb-4 mt-3" style="gap: 10px;">
                    <input class="form-check-input bg-dark border-secondary mt-0"
                           type="checkbox" id="terminos" style="cursor:pointer;" required>
                    <label for="terminos" style="color:#666; font-size:12px; margin-bottom:0; cursor:pointer;">
                        Acepto los <a href="/terminos" style="color:#c0392b; text-decoration:none; font-weight:600;">Términos y Condiciones</a>
                    </label>
                </div>

                <button type="submit" class="btn-login-submit">Registrarse</button>

                <div class="login-register">
                    ¿Ya tenés una cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a>
                </div>

            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pass        = document.getElementById('regPassword');
            const confirmPass = document.getElementById('regPasswordConfirm');
            const errorMsg    = document.getElementById('passwordError');
            const wrapConfirm = document.getElementById('wrapConfirm');
            const form        = document.querySelector('form');

            function validarContrasenas() {
                if (confirmPass.value.length > 0) {
                    if (pass.value !== confirmPass.value) {
                        errorMsg.style.display = 'block';
                        wrapConfirm.style.borderColor = '#c0392b';
                    } else {
                        errorMsg.style.display = 'none';
                        wrapConfirm.style.borderColor = '#2e2e2e';
                    }
                } else {
                    errorMsg.style.display = 'none';
                    wrapConfirm.style.borderColor = '#2e2e2e';
                }
            }

            pass.addEventListener('input', validarContrasenas);
            confirmPass.addEventListener('input', validarContrasenas);

            form.addEventListener('submit', function(evento) {
                if (pass.value !== confirmPass.value) {
                    evento.preventDefault();
                    errorMsg.style.display = 'block';
                    wrapConfirm.style.borderColor = '#c0392b';
                }
            });
        });
    </script>

    <x-footer />
</body>
</html>