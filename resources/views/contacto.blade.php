{{-- ============================================================
    PÁGINA: Contacto
    Layout de dos columnas:
    - Izquierda: información de contacto + redes sociales
    - Derecha: formulario de contacto con validación Laravel
    Conectada a un controlador que procesa el POST y redirige
    a la página de confirmación (/contacto-enviado).
============================================================ --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap 5.3.2, Bootstrap Icons, estilos globales --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Contacto - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* ── Fuente pixel art para los headers de cada card ──────
           Usada en .card-header-bar ("Encontranos" / "Escribinos") */
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }
        /* ── Base ────────────────────────────────────────────────
           Fondo negro oscuro, texto gris claro (#ddd),
           layout vertical full-height para sticky footer          */
        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #ddd;
        }

        /* ── Page layout ──────────────────────────────────────── 
         Wrapper principal 
           - flex: 1 → ocupa todo el espacio entre navbar y footer
           - align-items: flex-start → la grid se alinea arriba
             (no se centra verticalmente como en páginas más cortas)
           - padding generoso arriba/abajo para separar del navbar*/
        .contact-wrapper {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 16px 64px;
        }
        /* ── Grid de dos columnas ────────────────────────────────
           CSS Grid nativo (no Bootstrap row/col) para mayor control.
           - 1fr 1fr → ambas columnas de igual ancho
           - gap: 24px → espacio entre columnas
           - max-width: 1000px → limita el ancho total de la página
           - align-items: start → cada card crece según su contenido
             sin estirarse para igualar alturas

                */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            width: 100%;
            max-width: 1000px;
            align-items: start;
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── Shared card base ─────────────────────────────────── */
        /* 
           Ambas columnas (info y form) usan esta clase base.
           overflow: hidden → evita que el border-radius
           sea sobrepasado por los hijos con fondo propio          */
        .contact-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            overflow: hidden;
        }

        /* ── Card header ────────────────────────────────────────
         Franja superior oscura (#1a1a1a) con borde inferior.
           Muestra el título de la card en SystemFont rojo.
           Ej: "Encontranos" (izquierda) / "Escribinos" (derecha)  */
        .card-header-bar {
            background: #1a1a1a;
            border-bottom: 1px solid #262626;
            padding: 18px 28px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card-header-bar span {
            font-family: 'SystemFont', monospace;
            font-size: 14px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #c0392b;
        }

        /* ── Info card body ───────────────────────────────────── */
        /* 
           Grid interno de 2 columnas con los 4 datos de contacto:
           teléfono, email, ubicación, horario                     */
        .info-body {
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        /* ── Item de información individual ─────────────────────
           Mini card centrada con ícono + label + valor.
           Hover: fondo y borde levemente más claros               */
        .info-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
            padding: 20px;
            background: #1a1a1a;
            border: 1px solid #222;
            border-radius: 10px;
            transition: border-color 0.15s, background 0.15s;
        }
        .info-item:hover {
            background: #1f1f1f;
            border-color: #2e2e2e;
        }
        /* ── Ícono del item de información ──────────────────────
           Cuadrado redondeado (no círculo) 38x38px, fondo #222.
           El ícono Bootstrap Icons se muestra en rojo Catacumbas  */
        .info-icon {
            width: 38px;
            height: 38px;
            background: #222;
            border: 1px solid #2e2e2e;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .info-icon i {
            font-size: 15px;
            color: #c0392b;
        }
        /* ── Texto del item de información ──────────────────────
           .info-label: 10px, gris oscuro (#555), uppercase → subtítulo
           .info-value: 13px, gris claro (#bbb) → dato real
           Links en .info-value: misma gris → rojo al hover        */

        .info-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }
        .info-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #555;
            text-align: center;
        }
        .info-value {
            font-size: 13px;
            color: #bbb;
            line-height: 1.6;
            text-align: center;
        }
        .info-value a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.15s;
        }
        .info-value a:hover {
            color: #c0392b;
        }
        /* ── Redes sociales (footer de la card izquierda) ────────
           Fila centrada con 2 botones (Instagram y Facebook).
           Estilos aplicados inline directamente en el HTML
           (onmouseover/onmouseout para el hover de color/borde)   */

        
        /* ── Form card body ─────────────────────────────────────
        padding: 28px → más espacio que info-body
           para que los campos respiren                          */
        .form-body {
            padding: 28px;
        }
         /* ── Fila de dos campos (nombre + apellido) ──────────────
           Grid de 2 columnas solo para la primera fila del form   */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 14px;
        }

        /* ── Campo individual del formulario ─────────────────────
           .form-field: wrapper de label + input-wrap
           label: 11px, gris oscuro (#555), uppercase
           
           .input-wrap: contenedor ícono + input/textarea
           - focus-within: borde completo cambia a rojo al escribir
           - ícono: gris (#444), 13px
           - input/textarea: fondo transparente, sin borde propio
           - placeholder: gris muy oscuro (#3a3a3a)
           
           textarea: altura mínima 110px, resize: none
           El ícono de textarea tiene margin-top para alinearse
           con la primera línea de texto (no con el centro)        */

        .form-field {
            margin-bottom: 14px;
        }
        .form-field:last-of-type {
            margin-bottom: 0;
        }

        .form-field label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 6px;
        }

        .input-wrap {
            display: flex;
            align-items: center;
            background: #1c1c1c;
            border: 1px solid #2e2e2e;
            border-radius: 8px;
            padding: 0 12px;
            gap: 10px;
            transition: border-color 0.15s;
        }
        .input-wrap:focus-within {
            border-color: #c0392b;
        }
        .input-wrap i {
            color: #444;
            font-size: 13px;
            flex-shrink: 0;
        }
        .input-wrap input,
        .input-wrap textarea {
            background: transparent;
            border: none;
            outline: none;
            color: #ddd;
            font-size: 14px;
            padding: 12px 0;
            width: 100%;
            resize: none;
        }
        .input-wrap input::placeholder,
        .input-wrap textarea::placeholder {
            color: #3a3a3a;
        }
        .input-wrap textarea {
            padding: 12px 0;
            min-height: 110px;
        }

        
        /* ── Botón de envío ──────────────────────────────────────
           Ancho completo, rojo Catacumbas → hover más claro.
           Flex interno para ícono de avión (bi-send) + texto      */
        .btn-contact-submit {
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
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-contact-submit:hover {
            background: #e74c3c;
        }

        /* ── Alertas de estado (éxito / error) ───────────────────
           Mostradas encima del form si hay mensajes de sesión.
           .success → borde verde, texto verde (#4caf50)
           .error   → borde rojo oscuro, texto rojo (#e74c3c)      */
        .alert-dark {
            background: #1c1c1c;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            color: #bbb;
            margin-bottom: 20px;
        }
        .alert-dark.success { border-color: #1a3a1a; color: #4caf50; }
        .alert-dark.error   { border-color: #3a1a1a; color: #e74c3c; }
    </style>
</head>
<body>
    <x-navbar/>

    <div class="contact-wrapper">
        <div class="contact-grid">

            {{-- ── Left column: info ── --}}
            {{-- Header de la card --}}
            <div class="contact-card">
                <div class="card-header-bar">
                    <span>Encontranos</span>
                </div>

                {{-- Grid 2x2 con los 4 datos de contacto --}}
                <div class="info-body">

                    {{-- Teléfono: link tel: para llamar directo en móvil --}}
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-telephone"></i></div>
                        <div class="info-text">
                            <span class="info-label">Teléfono</span>
                            <span class="info-value">
                                <a href="tel:+5493794000000">+54 379 4246721</a>
                            </span>
                        </div>
                    </div>

                    {{-- Email: texto plano (sin mailto) --}}
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-envelope"></i></div>
                        <div class="info-text">
                            <span class="info-label">Email</span>
                            <span class="info-value">
                               <p> info@catacumbas.com </p>
                            </span>
                        </div>
                    </div>

                     {{-- Ubicación: dirección física de la tienda --}}
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                        <div class="info-text">
                            <span class="info-label">Ubicación</span>
                            <span class="info-value">
                                123 Calle Y, Corrientes, Argentina
                            </span>
                        </div>
                    </div>

                    {{-- Horario: días y horas de atención --}}
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-clock"></i></div>
                        <div class="info-text">
                            <span class="info-label">Horario de atención</span>
                            <span class="info-value">
                                Lunes a Viernes<br>
                                09:00 a 18:00 hs
                            </span>
                        </div>
                    </div>

                </div>

                {{-- Social links footer --}}

                {{-- - target="_blank": abre en nueva pestaña
                     - onmouseover/out: hover de color y borde via JS inline    (sin clase CSS para mantener los estilos en línea)   --}}
                <div style="padding: 16px 20px; border-top: 1px solid #1e1e1e; display: flex; gap: 10px; justify-content: center;">
                    <a href="https://www.instagram.com/" target="_blank" style="display:flex;align-items:center;gap:6px;font-size:12px;color:#555;text-decoration:none;padding:7px 12px;background:#1a1a1a;border:1px solid #222;border-radius:6px;transition:color 0.15s,border-color 0.15s;"
                       onmouseover="this.style.color='#c0392b';this.style.borderColor='#c0392b'"
                       onmouseout="this.style.color='#555';this.style.borderColor='#222'">
                        <i class="bi bi-instagram"></i> @catacumbas
                    </a>
                    <a href="https://www.facebook.com/" target="_blank" style="display:flex;align-items:center;gap:6px;font-size:12px;color:#555;text-decoration:none;padding:7px 12px;background:#1a1a1a;border:1px solid #222;border-radius:6px;transition:color 0.15s,border-color 0.15s;"
                       onmouseover="this.style.color='#c0392b';this.style.borderColor='#c0392b'"
                       onmouseout="this.style.color='#555';this.style.borderColor='#222'">
                        <i class="bi bi-facebook"></i> Catacumbas
                    </a>
                </div>
            </div>

            
            {{--COLUMNA DERECHA: Formulario de contacto--}}
            <div class="contact-card">
                <div class="card-header-bar">
                    <span>Escribinos</span>
                </div>

                <div class="form-body">

                    {{-- ALERTA DE ÉXITO
                         session('success'): mensaje enviado por el controlador
                         tras procesar correctamente el formulario POST        --}}
                    @if(session('success'))
                        <div class="alert-dark success">{{ session('success') }}</div>
                    @endif
                    {{-- ALERTA DE ERRORES DE VALIDACIÓN
                         $errors->any(): true si Laravel encontró errores
                         $errors->all(): array con todos los mensajes de error --}}
                    @if($errors->any())
                        <div class="alert-dark error">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    {{-- FORMULARIO DE CONTACTO
                         action="{{ url('/contacto') }}" → POST a la ruta /contacto
                         @csrf: token de seguridad obligatorio en Laravel        --}}
                    <form action="{{ url('/contacto') }}" method="POST">
                        @csrf

                        {{-- FILA: Nombre + Apellido (grid 2 columnas)
                             - Nombre: required → campo obligatorio
                             - Apellido: sin required → opcional
                             - old(): repobla el valor si el form falla          --}}
                        <div class="form-row">
                            <div class="form-field">
                                <label for="nombre">Nombre</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" id="nombre" name="nombre"
                                           placeholder="Tu nombre"
                                           value="{{ old('nombre') }}" required>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="apellido">Apellido</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" id="apellido" name="apellido"
                                           placeholder="Tu apellido"
                                           value="{{ old('apellido') }}">
                                </div>
                            </div>
                        </div>

                        {{-- CAMPO: Email (required, type email) --}}
                        <div class="form-field">
                            <label for="email">Correo electrónico</label>
                            <div class="input-wrap">
                                <i class="bi bi-envelope"></i>
                                <input type="email" id="email" name="email"
                                       placeholder="tucorreo@ejemplo.com"
                                       value="{{ old('email') }}"
                                       required
                                      pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                                      title="Ingresá un correo válido: ejemplo@dominio.com">
                            </div>
                        </div>

                        {{-- CAMPO: Asunto --}}
                        <div class="form-field">
                            <label for="asunto">Asunto</label>
                            <div class="input-wrap">
                                <i class="bi bi-chat-left-text"></i>
                                <input type="text" id="asunto" name="asunto"
                                       placeholder="¿En qué te podemos ayudar?"
                                       value="{{ old('asunto') }}"
                                       required>
                            </div>
                        </div>

                        {{-- CAMPO: Mensaje (textarea, required)
                             - align-items: flex-start en el wrap para que el ícono quede arriba (no centrado en el textarea)
                             - margin-top en el ícono para alinearlo con la
                               primera línea de texto
                             - old('mensaje'): repobla el textarea si falla    --}}
                        <div class="form-field">
                            <label for="mensaje">Mensaje</label>
                            <div class="input-wrap" style="align-items: flex-start; padding-top: 2px;">
                                <i class="bi bi-pencil" style="margin-top: 14px;"></i>
                                <textarea id="mensaje" name="mensaje"
                                          placeholder="Escribí tu consulta acá..." required>{{ old('mensaje') }}</textarea>
                            </div>
                        </div>

                        {{-- Botón de envío real (POST al controlador) --}}
                        <button type="submit" class="btn-contact-submit">
                            <i class="bi bi-send"></i> Enviar mensaje
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <x-volverArriba />
    <x-footer /> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
