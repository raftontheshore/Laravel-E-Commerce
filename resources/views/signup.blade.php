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
        
                <form>
                    <div class="login-field">
                        <label>NOMBRE</label>
                        <div class="input-wrap">
                            <i class="bi bi-person"></i>
                            <input type="text" id="regName" placeholder="Tu nombre completo" required>
                        </div>
                    </div>
        
                    <div class="login-field">
                        <label>EMAIL</label>
                        <div class="input-wrap">
                            <i class="bi bi-envelope"></i>
                            <input type="email" id="regEmail" placeholder="tucorreo@ejemplo.com" required>
                        </div>
                    </div>
        
                    <div class="login-field">
                        <label>CONTRASEÑA</label>
                        <div class="input-wrap">
                            <i class="bi bi-lock"></i>
                            <input type="password" id="regPassword" placeholder="••••••••" required>
                        </div>
                    </div>
        
                    <div class="login-field">
                        <label>REPETIR CONTRASEÑA</label>
                        <div class="input-wrap" id="wrapConfirm">
                            <i class="bi bi-shield-lock"></i>
                            <input type="password" id="regPasswordConfirm" placeholder="••••••••" required>
                        </div>
                        <small id="passwordError" style="color: #c0392b; display: none; font-size: 11px; margin-top: 5px; font_weight: bold;">
                            Las contraseñas no coinciden
                        </small>
                    </div>
        
                    <div class="d-flex align-items-center mb-4 mt-3" style="gap: 10px;">
                        <input class="form-check-input bg-dark border-secondary mt-0" type="checkbox" id="terminos" style="cursor: pointer;" required>
                        <label for="terminos" style="color: #666; font-size: 12px; margin-bottom: 0; cursor: pointer;">
                            Acepto los <a href="#!" style="color: #c0392b; text-decoration: none; font-weight: 600;">Términos y Condiciones</a>
                        </label>
                    </div>
        
                    <button type="submit" class="btn-login-submit">Registrarse</button>
        
                    <div class="login-register">
                        ¿Ya tenés una cuenta? <a href="/login">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </main>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        {{-- SCRIPT PARA VALIDAR CONTRASEÑAS --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pass = document.getElementById('regPassword');
                const confirmPass = document.getElementById('regPasswordConfirm');
                const errorMsg = document.getElementById('passwordError');
                const wrapConfirm = document.getElementById('wrapConfirm');
                const form = document.querySelector('form'); // Selecciona tu formulario

                // Función que revisa si son iguales
                function validarContrasenas() {
                    // Solo validar si ya escribieron algo en el segundo campo
                    if (confirmPass.value.length > 0) {
                        if (pass.value !== confirmPass.value) {
                            errorMsg.style.display = 'block'; // Muestra el texto rojo
                            wrapConfirm.style.borderColor = '#c0392b'; // Pinta el borde de rojo
                        } else {
                            errorMsg.style.display = 'none'; // Oculta el texto
                            wrapConfirm.style.borderColor = '#2e2e2e'; // Vuelve al color gris
                        }
                    } else {
                        errorMsg.style.display = 'none';
                        wrapConfirm.style.borderColor = '#2e2e2e';
                    }
                }

                // Ejecutar la función cada vez que el usuario teclea algo
                pass.addEventListener('input', validarContrasenas);
                confirmPass.addEventListener('input', validarContrasenas);

                // Evitar que el formulario se envíe si las contraseñas están mal
                form.addEventListener('submit', function(evento) {
                    if (pass.value !== confirmPass.value) {
                        evento.preventDefault(); // Frena el envío
                        errorMsg.style.display = 'block';
                        wrapConfirm.style.borderColor = '#c0392b';
                    }
                });
            });
        </script>
      
      
        <x-footer />
    </body>
</html>