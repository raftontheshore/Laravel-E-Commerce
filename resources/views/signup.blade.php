<!DOCTYPE html>
<html lang="es">
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- Bootstrap 5.3.2 CSS desde CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        {{-- Favicon del sitio --}}
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <title>Catacumbas - Registro</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        {{-- Hoja de estilos global del proyecto --}}
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
     </head>
     
     <body class="fondo-catacumbas">
        
        {{-- 
        Navbar simplificada (sin menú completo).
        Variante reducida para páginas de auth (login/registro)
        donde no se necesita navegación completa.
         --}}
        <x-navbar-simplificada/>

        {{-- ── CONTENIDO PRINCIPAL ─────────────────────────────────
         login-wrapper: centra la card en la pantalla (flex)
         login-card: card blanca/oscura con el formulario        --}}
        <main class="login-wrapper">
            <div class="login-card">
                {{-- ── HEADER DE MARCA ─────────────────────────────
                 Logo + nombre + subtítulo, igual que en login  --}}
                <div class="login-brand">
                    <img src="{{ asset('images/favicon.png') }}" alt="Logo Catacumbas">
                    <div class="login-brand-name">CATACUMBAS</div>
                    <div class="login-brand-sub">Creá tu cuenta para unirte</div>
                </div>
                
                <hr class="login-divider">
        
                <form>
                    {{-- CAMPO: Nombre completo
                     - login-field: clase del proyecto para cada campo
                     - input-wrap: contenedor ícono + input
                     - bi-person: ícono de Bootstrap Icons          --}}
                    <div class="login-field">
                        <label>NOMBRE</label>
                        <div class="input-wrap">
                            <i class="bi bi-person"></i>
                            <input type="text" id="regName" placeholder="Tu nombre completo" required>
                        </div>
                    </div>
                    {{-- CAMPO: Email
                     - type="email": validación nativa del navegador
                     - bi-envelope: ícono de sobre/correo             --}}
                    <div class="login-field">
                        <label>EMAIL</label>
                        <div class="input-wrap">
                            <i class="bi bi-envelope"></i>
                            <input type="email" id="regEmail" placeholder="tucorreo@ejemplo.com" required>
                        </div>
                    </div>
                    {{-- CAMPO: Contraseña
                     - type="password": oculta los caracteres escritos
                     - bi-lock: ícono de candado                      --}}
                    <div class="login-field">
                        <label>CONTRASEÑA</label>
                        <div class="input-wrap">
                            <i class="bi bi-lock"></i>
                            <input type="password" id="regPassword" placeholder="••••••••" required>
                        </div>
                    </div>
                    
                     {{-- CAMPO: Repetir contraseña
                     - id="wrapConfirm": referenciado por JS para cambiar
                       el borde a rojo si las contraseñas no coinciden
                     - #passwordError: mensaje de error oculto por defecto
                       (display:none) que se muestra via JS             --}}
                    <div class="login-field">
                        <label>REPETIR CONTRASEÑA</label>
                        <div class="input-wrap" id="wrapConfirm">
                            <i class="bi bi-shield-lock"></i>
                            <input type="password" id="regPasswordConfirm" placeholder="••••••••" required>
                        </div>
                        {{-- Mensaje de error: solo visible si las contraseñas no coinciden --}}
                        <small id="passwordError" style="color: #c0392b; display: none; font-size: 11px; margin-top: 5px; font_weight: bold;">
                            Las contraseñas no coinciden
                        </small>
                    </div>

                    {{-- CHECKBOX: Aceptar Términos y Condiciones
                     - required: no se puede enviar el form sin tildarlo
                     - Link a /terminos abre la página de T&C             --}}
        
                    <div class="d-flex align-items-center mb-4 mt-3" style="gap: 10px;">
                        <input class="form-check-input bg-dark border-secondary mt-0" type="checkbox" id="terminos" style="cursor: pointer;" required>
                        <label for="terminos" style="color: #666; font-size: 12px; margin-bottom: 0; cursor: pointer;">
                            Acepto los <a href="/terminos" style="color: #c0392b; text-decoration: none; font-weight: 600;">Términos y Condiciones</a>
                        </label>
                    </div>
                    {{-- boton para cuando tengamos base de datos  
                    <button type="submit" class="btn-login-submit">Registrarse</button>--}}

                     <a href="/" id="btnSimularLogin" class="btn-login-submit text-center text-decoration-none d-block">Registrarse</a>
                    
                     {{-- Link para usuarios que ya tienen cuenta → /login --}}
                    <div class="login-register">
                        ¿Ya tenés una cuenta? <a href="/login">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </main>

        {{-- Bootstrap JS (local, desde /vendor) --}}
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        {{-- SCRIPT PARA VALIDAR CONTRASEÑAS --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Referencias a los elementos del DOM necesarios
                const pass           = document.getElementById('regPassword');        // Campo contraseña
                const confirmPass    = document.getElementById('regPasswordConfirm'); // Campo repetir contraseña
                const errorMsg       = document.getElementById('passwordError');      // Mensaje de error rojo
                const wrapConfirm    = document.getElementById('wrapConfirm');        // Contenedor del 2do campo
                const form           = document.querySelector('form');                // Formulario completo

                 // ── Función de validación ─────────────────────────────
                // Compara ambos campos y actualiza UI en consecuencia.
                // Solo actúa si el usuario ya escribió algo en el 2do campo
                // (evita mostrar error antes de que el usuario llegue al campo)
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
                // ── Event Listeners ───────────────────────────────────
                 // Valida cada vez que el usuario escribe en cualquiera de los dos campos
                // Ejecutar la función cada vez que el usuario teclea algo
                pass.addEventListener('input', validarContrasenas);
                confirmPass.addEventListener('input', validarContrasenas);

                // Evitar que el formulario se envíe si las contraseñas están mal
                // - preventDefault() cancela el envío
               // - Muestra el error visual por si el usuario lo había ignorado
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