{{-- ============================================================
    PÁGINA: Términos y Condiciones
    Vista estática que muestra los términos legales de uso del sitio.
    No requiere datos del controlador (sin variables Blade).
============================================================ --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap 5.3.2 desde CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Favicon del sitio, generado con asset() para URL absoluta --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Términos y Condiciones - Catacumbas</title>

    {{-- Bootstrap Icons (íconos SVG via CDN) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 
    {{-- Hoja de estilos global del proyecto --}}
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* ── Fuente personalizada pixel art ──────────────────────
           Carga la fuente 'SystemFont' desde /public/fonts/
           font-display: swap → muestra texto con fuente del sistema
           mientras carga la custom (mejor rendimiento/UX)        */
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }

        /* ── Base del documento ───────────────────────────────────
           - min-height: 100vh → ocupa al menos toda la pantalla
           - display flex + flex-direction column → layout vertical
             permite que el contenido principal crezca y el footer
             quede siempre al fondo (sticky footer pattern)
           - color: #ccc → texto gris claro por defecto            */
        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #ccc;
        }

        /* ── Page layout ────────────────────────────────────────
        - flex: 1 → crece para ocupar todo el espacio disponible
             entre navbar y footer
           - align-items / justify-content: center → centra la card horizontal y verticalmente
           - padding: 48px arriba/abajo, 16px laterales            */
        .terms-wrapper {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 16px 64px;
        }

        /* ── Card ─────────────────────────────────────────────── 
         - Borde sutil (#262626) para delimitar sin ser agresivo
           - max-width: 760px → ancho de lectura óptimo para texto Si la subís a max-width: 900px; o 1000px;, la caja se va a ensanchar inmediatamente.
           padding 48px arriba/abajo, 44px a los lados */
        .terms-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            padding: 48px 44px;
            width: 100%;
            max-width: 760px;
        }

        /* ── Brand header ─────────────────────────────────────── 
         Centra logo + nombre + subtítulo verticalmente
           margin-bottom: 36px separa del divisor*/
        .terms-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 36px;
        }
        .terms-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .terms-brand-name {
            font-family: 'SystemFont', monospace;
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c0392b;
            line-height: 1;
        }
        .terms-brand-sub {
            font-size: 12px;
            color: #444;
            margin-top: 20px;
            text-align: center;
            letter-spacing: 0.3px;
        }

        /* ── Divider ──────────────────────────────────────────── 
        Línea horizontal sutil (#222) entre el header y el contenido*/
        .terms-divider {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 36px;
        }

        /* ── Page title ───────────────────────────────────────── 
        - terms-title: 22px, gris claro (#eee), semi-bold
           - terms-date: 12px, gris oscuro (#444) → fecha discreta */
        .terms-title {
            font-size: 22px;
            font-weight: 600;
            color: #eee;
            margin: 0 0 6px;
        }
        .terms-date {
            font-size: 12px;
            color: #444;
            letter-spacing: 0.3px;
            margin-bottom: 36px;
        }

        /* ── Sections ─────────────────────────────────────────── 
        Cada sección tiene:
           - margin/padding-bottom: 28px de separación
           - border-bottom: 1px solid #1e1e1e → divisor entre secciones
           - :last-of-type → la última sección no tiene borde ni margen

           h2: 13px, uppercase, rojo (#c0392b), letter-spacing 1.2px
           p / li: 14px, blanco (#fff), line-height 1.8 para legibilidad*/
        .terms-section {
            margin-bottom: 28px;
            padding-bottom: 28px;
            border-bottom: 1px solid #1e1e1e;
        }
        .terms-section:last-of-type {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .terms-section h2 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #c0392b;
            margin: 0 0 12px;
        }

        /*text-align: justify; es para que quede alineado el texto*/
        .terms-section p {
            font-size: 14px;
            color: #FFFFFF;
            line-height: 1.8;
            margin: 0 0 10px;
            text-align: justify;
        }
        .terms-section p:last-child {
            margin-bottom: 0;
        }

        .terms-section ul {
            padding-left: 18px;
            margin: 0;
        }
        .terms-section ul li {
            font-size: 14px;
            color: #FFFFFF;
            line-height: 1.8;
            margin-bottom: 6px;
        }
        .terms-section ul li:last-child {
            margin-bottom: 0;
        }

        /* ── Disclaimer footer note ───────────────────────────── */
        .terms-note {
            background: #1c1c1c;
            border: 1px solid #252525;
            border-radius: 8px;
            padding: 14px 18px;
            margin-top: 32px;
            font-size: 12px;
            color: #A9A9A9;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <x-navbar/>

    {{-- Wrapper que centra y contiene la card de términos --}}
    <div class="terms-wrapper">
        <div class="terms-card">

            {{-- Brand HEADER DE MARCA: logo + nombre + subtítulo --}} 
            <div class="terms-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas">
                <span class="terms-brand-name">Catacumbas</span>
                <p class="terms-brand-sub">Leé con atención antes de usar el sitio</p>
            </div>

            {{-- Línea divisora entre header y contenido --}}
            <hr class="terms-divider">

            {{-- {{-- Título de la página y fecha de última actualización --}}
            <h1 class="terms-title">Terminos y condiciones de uso</h1>
            <p class="terms-date">Última actualización: abril de 2026</p>

           {{-- ── SECCIONES DE CONTENIDO LEGAL ─────────────────── --}}

            <div class="terms-section">
                <h2>1. Aceptacion de los terminos</h2>
                <p>Al acceder y utilizar la plataforma de Catacumbas (en adelante, "el Sitio"), usted acepta quedar vinculado por los presentes Términos y Condiciones de Uso. Si no está de acuerdo con alguna parte de estos términos, le rogamos que se abstenga de utilizar el Sitio.</p>
            </div>

            <div class="terms-section">
                <h2>2. Descripcion del servicio</h2>
                <p>Catacumbas es una tienda dedicada a la compra y venta de videojuegos, consolas y software del mundo retro. A través del Sitio, los usuarios pueden explorar nuestro catálogo, realizar compras y acceder a contenido relacionado con la cultura del gaming clásico.</p>
                <p>Nos reservamos el derecho de modificar, suspender o discontinuar cualquier aspecto del servicio en cualquier momento y sin previo aviso.</p>
            </div>

            <div class="terms-section">
                <h2>3. Responsabilidades del usuario</h2>
                <p>Al utilizar el Sitio, usted se compromete a:</p>
                <ul>
                    <li>Proporcionar información veraz, completa y actualizada al momento de registrarse o realizar una compra.</li>
                    <li>No utilizar el Sitio con fines ilícitos, fraudulentos o que vulneren derechos de terceros.</li>
                    <li>No intentar acceder a áreas restringidas del sistema ni interferir con su normal funcionamiento.</li>
                    <li>Mantener la confidencialidad de sus credenciales de acceso y notificarnos de inmediato ante cualquier uso no autorizado de su cuenta.</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2>4. Compras y pagos</h2>
                <p>Los precios publicados en el Sitio están sujetos a cambios sin previo aviso. Catacumbas se reserva el derecho de cancelar o rechazar cualquier pedido en caso de errores en la publicación de precios, falta de stock o conducta sospechosa de fraude.</p>
                <p>El usuario es responsable de los impuestos y cargos adicionales que correspondan según su jurisdicción. Todos los pagos deberán realizarse a través de los métodos habilitados en la plataforma.</p>
            </div>

            <div class="terms-section">
                <h2>5. Politica de devoluciones</h2>
                <p>Los productos podrán devolverse dentro de los plazos y condiciones establecidas en nuestra Política de Devoluciones, disponible en el Sitio. Los artículos deberán encontrarse en el mismo estado en que fueron recibidos. Nos reservamos el derecho de rechazar devoluciones que no cumplan con las condiciones establecidas.</p>
            </div>

            <div class="terms-section">
                <h2>6. Propiedad intelectual</h2>
                <p>Todo el contenido del Sitio —incluyendo textos, imágenes, logotipos, gráficos y diseños— es propiedad de Catacumbas o de sus respectivos titulares, y se encuentra protegido por la legislación vigente en materia de propiedad intelectual. Queda prohibida su reproducción total o parcial sin autorización expresa y por escrito.</p>
            </div>

            <div class="terms-section">
                <h2>7. Limitacion de responsabilidad</h2>
                <p>Catacumbas no garantiza la disponibilidad ininterrumpida del Sitio ni la ausencia de errores en su contenido. En la máxima medida permitida por la ley aplicable, Catacumbas y sus colaboradores no serán responsables por daños directos, indirectos, incidentales, especiales o consecuentes derivados del uso o la imposibilidad de uso del Sitio.</p>
                <p>El Sitio puede contener enlaces a sitios de terceros. Catacumbas no se responsabiliza por el contenido, las políticas ni las prácticas de dichos sitios externos.</p>
            </div>

            <div class="terms-section">
                <h2>8. Privacidad y proteccion de datos</h2>
                <p>Catacumbas respeta la privacidad de sus usuarios y trata los datos personales de conformidad con su Política de Privacidad, la cual forma parte integrante de estos Términos y Condiciones. Al utilizar el Sitio, usted presta su consentimiento para la recopilación y tratamiento de sus datos según lo allí descrito.</p>
            </div>

            <div class="terms-section">
                <h2>9. Modificaciones de los terminos</h2>
                <p>Catacumbas se reserva el derecho de modificar estos Términos y Condiciones en cualquier momento. Las modificaciones entrarán en vigor desde su publicación en el Sitio. El uso continuado del Sitio tras la publicación de cambios implica la aceptación de los nuevos términos. Es responsabilidad del usuario revisar periódicamente esta página.</p>
            </div>

            <div class="terms-section">
                <h2>10. Ley aplicable y jurisdiccion</h2>
                <p>Los presentes Términos y Condiciones se rigen por la legislación vigente en la República Argentina. Cualquier controversia que surja en relación con el Sitio o estos términos será sometida a la jurisdicción de los tribunales ordinarios competentes.</p>
            </div>

            {{-- Disclaimer note --}}
            <div class="terms-note">
                Este documento tiene carácter meramente informativo y no constituye asesoramiento legal. Se recomienda consultar con un profesional del derecho para adaptar estos términos a la normativa específica de su jurisdicción y actividad.
            </div>

        </div>
    </div>
    {{-- Botón flotante para volver al inicio de la página --}}
     <x-volverArriba />
     <x-footer/>

     {{-- Bootstrap JS (incluye Popper para modales, dropdowns, etc.) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>