<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap 5.3.2, Bootstrap Icons, estilos globales --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Política de Privacidad - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* ── Fuente pixel art personalizada ──────────────────────
           Misma fuente que en Términos y Condiciones
           font-display: swap → muestra fuente del sistema
           mientras carga la custom (mejor rendimiento)           */
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }
        /* ── Base: fondo negro, layout vertical full-height ──────
           Igual que en terms — sticky footer pattern             */
        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #ddd;
        }

        /* ── Page layout ──────────────────────────────────────── */
        /* ── Wrapper: centra la card en la página ────────────────
           flex:1 → ocupa todo el espacio entre navbar y footer   */
        .privacy-wrapper {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 16px 64px;
        }

        /* ── Card ─────────────────────────────────────────────── */
        /*Idéntica a .terms-card: fondo #161616, borde #262626
           max-width: 760px → ancho óptimo de lectura             */
        .privacy-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            padding: 48px 44px;
            width: 100%;
            max-width: 760px;
        }

        /* ── Brand header ─────────────────────────────────────── */
        .privacy-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 36px;
        }
        .privacy-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .privacy-brand-name {
            font-family: 'SystemFont', monospace;
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c0392b;
            line-height: 1;
        }
        .privacy-brand-sub {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
            text-align: center;
            letter-spacing: 0.3px;
        }
        /* ── Divisor y títulos ───────────────────────────────────
           Misma lógica que terms: línea sutil #222,
           título 22px #eee, fecha 12px #777                      */

        /* ── Divider ──────────────────────────────────────────── */
        .privacy-divider {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 36px;
        }

        /* ── Page title ───────────────────────────────────────── */
        .privacy-title {
            font-size: 22px;
            font-weight: 600;
            color: #eee;
            margin: 0 0 6px;
        }
        .privacy-date {
            font-size: 12px;
            color: #777;
            letter-spacing: 0.3px;
            margin-bottom: 36px;
        }

        /* ── Sections ─────────────────────────────────────────── */
        /* 
           Igual que terms-section:
           - margin/padding-bottom: 28px entre secciones
           - border-bottom: 1px solid #1e1e1e
           - :last-of-type sin borde ni margen

           h2: 13px, rojo #c0392b, uppercase (títulos principales)

           h3: 11px, gris #888, uppercase               
               → SUB-SECCIONES dentro de una sección
               (novedad respecto a Términos y Condiciones)
               Ej: "Datos personales" y "Datos de uso"
               dentro de "Datos que recopilamos"

           p / li: 14px blanco, line-height 1.8              
           strong: color #e0e0e0 para destacar términos clave     */
        .privacy-section {
            margin-bottom: 28px;
            padding-bottom: 28px;
            border-bottom: 1px solid #1e1e1e;
        }
        .privacy-section:last-of-type {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .privacy-section h2 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #c0392b;
            margin: 0 0 12px;
        }

        /* Sub-sección dentro de una sección */
        .privacy-section h3 {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #888;
            margin: 20px 0 8px;
        }

        .privacy-section p {
            font-size: 14px;
            color: #FFFFFF;
            line-height: 1.8;
            margin: 0 0 10px;
        }
        .privacy-section p:last-child {
            margin-bottom: 0;
        }

        .privacy-section ul {
            padding-left: 18px;
            margin: 0 0 10px;
        }
        .privacy-section ul:last-child {
            margin-bottom: 0;
        }
        .privacy-section ul li {
            font-size: 14px;
            color: #FFFFFF;
            line-height: 1.8;
            margin-bottom: 6px;
        }
        .privacy-section ul li:last-child {
            margin-bottom: 0;
        }

        /* ── Cookie type table ────────────────────────────────── */
        /* 
           Tarjetas informativas para cada tipo de cookie.
           Fondo #1c1c1c, borde #252525, border-radius: 8px
           
           Estructura interna de cada bloque:
           .cookie-block-title → nombre de la cookie (12px, #ddd, bold)
           .cookie-block-meta  → tipo + quien la administra (12px, #777)
           .cookie-block-desc  → descripción funcional (13px, #aaa)    */
        .cookie-block {
            background: #1c1c1c;
            border: 1px solid #252525;
            border-radius: 8px;
            padding: 14px 18px;
            margin-bottom: 10px;
        }
        .cookie-block:last-child {
            margin-bottom: 0;
        }
        .cookie-block-title {
            font-size: 12px;
            font-weight: 600;
            color: #ddd;
            margin: 0 0 6px;
        }
        .cookie-block-meta {
            font-size: 12px;
            color: #777;
            margin: 0 0 6px;
        }
        .cookie-block-desc {
            font-size: 13px;
            color: #aaa;
            line-height: 1.7;
            margin: 0;
        }

        /* ── Retention table ──────────────────────────────────── */
        /* 
           Tarjetas para plazos de retención de datos.
           Mismo estilo visual que cookie-block pero con:
           .retention-block-title  → categoría del dato (12px, #ddd)
           .retention-block-detail → plazo de retención (13px, #aaa)  */
        .retention-block {
            background: #1c1c1c;
            border: 1px solid #252525;
            border-radius: 8px;
            padding: 14px 18px;
            margin-bottom: 8px;
        }
        .retention-block:last-child { margin-bottom: 0; }
        .retention-block-title {
            font-size: 12px;
            font-weight: 600;
            color: #ddd;
            margin: 0 0 4px;
        }
        .retention-block-detail {
            font-size: 13px;
            color: #aaa;
            line-height: 1.7;
            margin: 0;
        }

        /* ── Disclaimer footer note ───────────────────────────── */
        /* 
           Idéntica a terms-note: caja gris al pie
           Aclara que el doc es informativo, no asesoramiento legal */
        .privacy-note {
            background: #1c1c1c;
            border: 1px solid #252525;
            border-radius: 8px;
            padding: 14px 18px;
            margin-top: 32px;
            font-size: 12px;
            color: #777;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <x-navbar/>

    <div class="privacy-wrapper">
        <div class="privacy-card">

            {{-- Brand --}}
            {{-- HEADER: logo + "CATACUMBAS" + subtítulo --}}
            <div class="privacy-brand">
                <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas">
                <span class="privacy-brand-name">Catacumbas</span>
                <p class="privacy-brand-sub">Tu privacidad es importante para nosotros</p>
            </div>

            <hr class="privacy-divider">

            {{-- Título y fecha de última actualización --}}
            <h1 class="privacy-title">Politica de privacidad</h1>
            <p class="privacy-date">Última actualización: 08 de abril de 2026</p>

            {{-- Sections --}}

            <div class="privacy-section">
                <h2>Introduccion</h2>
                <p>Esta Política de Privacidad describe nuestras políticas y procedimientos sobre la recopilación, uso y divulgación de tu información cuando utilizás el Servicio, y te informa sobre tus derechos de privacidad y cómo la ley te protege.</p>
                <p>Utilizamos tus Datos Personales para proporcionar y mejorar el Servicio. Al usar el Servicio, aceptás la recopilación y el uso de información de acuerdo con esta Política de Privacidad.</p>
            </div>

            <div class="privacy-section">
                <h2>Interpretacion y definiciones</h2>
                <p>Las palabras cuya letra inicial está en mayúscula tienen significados definidos bajo las siguientes condiciones. Las siguientes definiciones tendrán el mismo significado independientemente de si aparecen en singular o en plural.</p>
                <ul>
                    <li><strong style="color:#e0e0e0;">Cuenta</strong> — una cuenta única creada para que accedas a nuestro Servicio o partes de él.</li>
                    <li><strong style="color:#e0e0e0;">Compañía</strong> — se refiere a Catacumbas, 123 Calle Y, Corrientes, Argentina.</li>
                    <li><strong style="color:#e0e0e0;">Cookies</strong> — pequeños archivos que un sitio web coloca en tu dispositivo con detalles de tu historial de navegación.</li>
                    <li><strong style="color:#e0e0e0;">País</strong> — Argentina.</li>
                    <li><strong style="color:#e0e0e0;">Dispositivo</strong> — cualquier aparato que pueda acceder al Servicio, como una computadora, un teléfono o una tablet.</li>
                    <li><strong style="color:#e0e0e0;">Datos Personales</strong> — cualquier información que se relacione con un individuo identificado o identificable.</li>
                    <li><strong style="color:#e0e0e0;">Servicio</strong> — el sitio web de Catacumbas, accesible desde catacumbas.com.</li>
                    <li><strong style="color:#e0e0e0;">Proveedor de Servicios</strong> — cualquier persona física o jurídica que procesa datos en nombre de la Compañía.</li>
                    <li><strong style="color:#e0e0e0;">Datos de Uso</strong> — datos recopilados automáticamente generados por el uso del Servicio.</li>
                    <li><strong style="color:#e0e0e0;">Vos / Usuario</strong> — el individuo que accede o utiliza el Servicio.</li>
                </ul>
            </div>

            <div class="privacy-section">
                <h2>Datos que recopilamos</h2>

                <h3>Datos personales</h3>
                <p>Al usar nuestro Servicio, podemos pedirte que nos proporciones cierta información de identificación personal, que puede incluir:</p>
                <ul>
                    <li>Dirección de correo electrónico</li>
                    <li>Nombre y apellido</li>
                    <li>Número de teléfono</li>
                    <li>Dirección, provincia, código postal y ciudad</li>
                </ul>

                <h3>Datos de uso</h3>
                <p>Los Datos de Uso se recopilan automáticamente al usar el Servicio. Pueden incluir información como la dirección IP de tu dispositivo, tipo y versión de navegador, las páginas que visitás, la fecha y hora de tu visita, el tiempo que pasás en esas páginas e identificadores únicos de dispositivo.</p>
                <p>Si accedés al Servicio desde un dispositivo móvil, también podemos recopilar automáticamente el tipo de dispositivo, su ID único, sistema operativo y tipo de navegador móvil, entre otros datos de diagnóstico.</p>
            </div>

            <div class="privacy-section">
                <h2>Cookies y tecnologias de rastreo</h2>
                <p>Usamos Cookies y tecnologías de rastreo similares para monitorear la actividad en nuestro Servicio y almacenar determinada información. Las tecnologías que utilizamos incluyen balizas web, etiquetas y scripts.</p>
                <p>Las Cookies pueden ser "Persistentes" o "De sesión". Las persistentes permanecen en tu dispositivo cuando te desconectás; las de sesión se eliminan al cerrar el navegador.</p>
                <p>Utilizamos los siguientes tipos de Cookies:</p>

                <div class="cookie-block">
                    <p class="cookie-block-title">Cookies esenciales</p>
                    <p class="cookie-block-meta">Tipo: Sesión &nbsp;·&nbsp; Administradas por: Nosotros</p>
                    <p class="cookie-block-desc">Son indispensables para brindarte los servicios disponibles en el Sitio y permitirte usar sus funciones. Ayudan a autenticar usuarios y prevenir el uso fraudulento de cuentas.</p>
                </div>

                <div class="cookie-block">
                    <p class="cookie-block-title">Cookies de aceptación de política</p>
                    <p class="cookie-block-meta">Tipo: Persistente &nbsp;·&nbsp; Administradas por: Nosotros</p>
                    <p class="cookie-block-desc">Identifican si los usuarios han aceptado el uso de cookies en el Sitio.</p>
                </div>

                <div class="cookie-block">
                    <p class="cookie-block-title">Cookies de funcionalidad</p>
                    <p class="cookie-block-meta">Tipo: Persistente &nbsp;·&nbsp; Administradas por: Nosotros</p>
                    <p class="cookie-block-desc">Nos permiten recordar las elecciones que hacés al usar el Sitio, como tus datos de inicio de sesión o preferencia de idioma, para brindarte una experiencia más personalizada.</p>
                </div>
            </div>

            <div class="privacy-section">
                <h2>Uso de tus datos personales</h2>
                <p>La Compañía puede usar tus Datos Personales para los siguientes fines:</p>
                <ul>
                    <li><strong style="color:#e0e0e0;">Proveer y mantener el Servicio</strong>, incluyendo el monitoreo de su uso.</li>
                    <li><strong style="color:#e0e0e0;">Gestionar tu Cuenta</strong> y darte acceso a las funcionalidades disponibles para usuarios registrados.</li>
                    <li><strong style="color:#e0e0e0;">Cumplir contratos</strong> de compra de productos o servicios que hayas adquirido.</li>
                    <li><strong style="color:#e0e0e0;">Contactarte</strong> por correo electrónico, SMS u otras formas de comunicación electrónica sobre actualizaciones o comunicaciones relacionadas con el Servicio.</li>
                    <li><strong style="color:#e0e0e0;">Enviarte noticias y ofertas</strong> sobre bienes y servicios similares a los que ya adquiriste, salvo que hayas optado por no recibirlos.</li>
                    <li><strong style="color:#e0e0e0;">Gestionar tus solicitudes</strong> dirigidas a nosotros.</li>
                    <li><strong style="color:#e0e0e0;">Análisis y mejora</strong> del Servicio mediante análisis de datos e identificación de tendencias de uso.</li>
                </ul>

                <p style="margin-top:14px;">Podemos compartir tus Datos Personales en las siguientes situaciones:</p>
                <ul>
                    <li>Con <strong style="color:#e0e0e0;">Proveedores de Servicios</strong> para monitorear y analizar el uso del Servicio.</li>
                    <li>En caso de <strong style="color:#e0e0e0;">transferencias comerciales</strong> como fusiones, adquisiciones o venta de activos.</li>
                    <li>Con <strong style="color:#e0e0e0;">Afiliados</strong>, exigiéndoles que respeten esta Política.</li>
                    <li>Con <strong style="color:#e0e0e0;">socios comerciales</strong> para ofrecerte determinados productos, servicios o promociones.</li>
                    <li>Con <strong style="color:#e0e0e0;">tu consentimiento</strong> explícito para cualquier otro fin.</li>
                </ul>
            </div>

            <div class="privacy-section">
                <h2>Retencion de datos</h2>
                <p>Conservaremos tus Datos Personales únicamente durante el tiempo necesario para los fines establecidos en esta Política. Los plazos máximos son los siguientes:</p>

                <div class="retention-block">
                    <p class="retention-block-title">Información de cuenta</p>
                    <p class="retention-block-detail">Durante la vigencia de tu cuenta más hasta 24 meses tras su cierre.</p>
                </div>
                <div class="retention-block">
                    <p class="retention-block-title">Soporte al cliente</p>
                    <p class="retention-block-detail">Tickets y correspondencia: hasta 24 meses desde el cierre del ticket. Transcripciones de chat: hasta 24 meses.</p>
                </div>
                <div class="retention-block">
                    <p class="retention-block-title">Datos de uso y analítica</p>
                    <p class="retention-block-detail">Hasta 24 meses desde la fecha de recopilación.</p>
                </div>
                <div class="retention-block">
                    <p class="retention-block-title">Registros de servidor</p>
                    <p class="retention-block-detail">Hasta 24 meses para monitoreo de seguridad y solución de problemas.</p>
                </div>

                <p style="margin-top:14px;">Podemos retener datos por más tiempo si existe una obligación legal, una reclamación pendiente, una solicitud explícita tuya o limitaciones técnicas de los sistemas de respaldo.</p>
            </div>

            <div class="privacy-section">
                <h2>Transferencia de datos</h2>
                <p>Tu información, incluyendo Datos Personales, puede transferirse a computadoras ubicadas fuera de tu provincia, país u otra jurisdicción gubernamental donde las leyes de protección de datos pueden diferir de las de tu lugar de residencia.</p>
                <p>Tomaremos todas las medidas razonablemente necesarias para garantizar que tus datos sean tratados de forma segura y conforme a esta Política. No se realizará ninguna transferencia a una organización o país a menos que existan controles adecuados de seguridad.</p>
            </div>

            <div class="privacy-section">
                <h2>Eliminacion de tus datos</h2>
                <p>Tenés el derecho de eliminar o solicitar nuestra asistencia para eliminar los Datos Personales que hayamos recopilado sobre vos.</p>
                <p>Podés actualizar, modificar o eliminar tu información en cualquier momento iniciando sesión en tu Cuenta y accediendo a la configuración de cuenta. También podés contactarnos para solicitar acceso, corrección o eliminación de cualquier Dato Personal que hayas proporcionado.</p>
                <p>Ten en cuenta que podemos necesitar conservar cierta información cuando tengamos una obligación legal o base legítima para hacerlo.</p>
            </div>

            <div class="privacy-section">
                <h2>Divulgacion de datos</h2>
                <p>En determinadas circunstancias, podemos estar obligados a divulgar tus Datos Personales si así lo exige la ley o en respuesta a solicitudes válidas de autoridades públicas. También podemos divulgar datos cuando sea necesario para:</p>
                <ul>
                    <li>Cumplir con una obligación legal.</li>
                    <li>Proteger y defender los derechos o la propiedad de la Compañía.</li>
                    <li>Prevenir o investigar posibles irregularidades en relación con el Servicio.</li>
                    <li>Proteger la seguridad personal de los Usuarios o del público.</li>
                    <li>Protegerse contra responsabilidad legal.</li>
                </ul>
            </div>

            <div class="privacy-section">
                <h2>Seguridad de tus datos</h2>
                <p>La seguridad de tus Datos Personales es importante para nosotros, pero recordá que ningún método de transmisión por Internet ni de almacenamiento electrónico es 100% seguro. Si bien nos esforzamos por utilizar medios comercialmente razonables para proteger tus datos, no podemos garantizar su seguridad absoluta.</p>
            </div>

            <div class="privacy-section">
                <h2>Privacidad de menores</h2>
                <p>Nuestro Servicio no está dirigido a personas menores de 16 años. No recopilamos intencionalmente información de identificación personal de menores de 16 años. Si sos padre, madre o tutor y sabés que tu hijo/a nos proporcionó Datos Personales, por favor contactanos para que podamos tomar las medidas necesarias.</p>
            </div>

            <div class="privacy-section">
                <h2>Enlaces a otros sitios</h2>
                <p>Nuestro Servicio puede contener enlaces a otros sitios web que no son operados por nosotros. Si hacés clic en un enlace de un tercero, serás dirigido al sitio de ese tercero. Te recomendamos revisar la Política de Privacidad de cada sitio que visitás.</p>
                <p>No tenemos control ni asumimos responsabilidad por el contenido, las políticas de privacidad ni las prácticas de sitios o servicios de terceros.</p>
            </div>

            <div class="privacy-section">
                <h2>Cambios a esta politica</h2>
                <p>Podemos actualizar nuestra Política de Privacidad periódicamente. Te notificaremos cualquier cambio publicando la nueva Política en esta página y, cuando corresponda, te avisaremos por correo electrónico o mediante un aviso destacado en el Servicio antes de que el cambio entre en vigencia.</p>
                <p>Te recomendamos revisar esta Política periódicamente. Los cambios son efectivos desde su publicación en esta página.</p>
            </div>

            <div class="privacy-section">
                <h2>Contacto</h2>
                <p>Si tenés alguna pregunta sobre esta Política de Privacidad, podés contactarnos:</p>
                <ul>
                    <li>Por correo electrónico: <a href="mailto:privacidad@catacumbas.com" style="color:#c0392b; text-decoration:none;">privacidad@catacumbas.com</a></li>
                </ul>
            </div>

            {{-- Disclaimer note --}}
            <div class="privacy-note">
                Este documento tiene carácter meramente informativo y no constituye asesoramiento legal. Se recomienda consultar con un profesional del derecho para adaptar esta política a la normativa específica de tu jurisdicción y actividad.
            </div>

        </div> {{-- /.privacy-card --}}
    </div> {{-- /.privacy-wrapper --}}
    <x-volverArriba />
    <x-footer/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>