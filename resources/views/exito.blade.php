<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Mensaje enviado - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
         /* ── Fuente pixel art personalizada ──────────────────────
           Usada solo para el nombre de marca "Catacumbas"
           font-display: swap → evita texto invisible al cargar    */
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }
        /* ── Base ────────────────────────────────────────────────
           Fondo negro oscuro, texto blanco, layout vertical
           full-height para poder centrar la card con flex         */
        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #fff;
        }
        /* ── Wrapper ─────────────────────────────────────────────
           - flex: 1 → ocupa todo el alto disponible
           - align-items: center → centrado VERTICAL
           - justify-content: center → centrado HORIZONTAL
           La card queda perfectamente centrada en pantalla        */
        .success-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }
        /* ── Card de confirmación ────────────────────────────────
           - max-width: 480px → más angosta que otras páginas,
             el contenido es breve y no necesita más espacio
           - text-align: center → todo el contenido centrado       */
        .success-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            padding: 48px 44px;
            width: 100%;
            max-width: 480px;
            text-align: center;
        }

        /* ── Ícono de éxito ──────────────────────────────────────
           Círculo verde oscuro con tilde verde (#4caf50).
           - #1a2e1a: fondo verde muy oscuro
           - #2a4a2a: borde verde oscuro
           - bi-check-lg: ícono de tilde grande de Bootstrap Icons  */
        .success-icon-wrap {
            width: 64px;
            height: 64px;
            background: #1a2e1a;
            border: 1px solid #2a4a2a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .success-icon-wrap i {
            font-size: 28px;
            color: #4caf50;
        }

        /* ── Nombre de marca ─────────────────────────────────────
           "Catacumbas" en SystemFont rojo, pequeño (14px).
           Actúa como identificador de marca sin ser el foco       */
        .success-brand {
            font-family: 'SystemFont', monospace;
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c0392b;
            margin-bottom: 16px;
        }

        /* ── Divider ──────────────────────────────────────────── */
        .success-divider {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 24px;
        }

       /* ── Título y cuerpo ─────────────────────────────────────
           - success-title: 20px, gris claro (#eee), semi-bold
           - success-body: 14px, blanco, line-height 1.8           */
        .success-title {
            font-size: 20px;
            font-weight: 600;
            color: #eee;
            margin: 0 0 12px;
        }

        .success-body {
            font-size: 14px;
            color: #ffff;
            line-height: 1.8;
            margin: 0 0 32px;
        }

        /* ── Actions ──────────────────────────────────────────── 
        /* ── Botones de acción ───────────────────────────────────
           Dos botones ubicados  verticalmente (flex-direction: column)*/
        .success-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        /*.btn-home → acción primaria
           - Fondo rojo #c0392b → hover más claro #e74c3c
           - Texto blanco, negrita → máxima legibilidad
           - Redirige al home (/)*/
        .btn-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #c0392b;
            border: none;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.15s;
            letter-spacing: 0.5px;
        }
        .btn-home:hover {
            background: #e74c3c;
            color: #fff;
        }
        /*.btn-back → acción secundaria
           - Transparente con borde gris oscuro (#2e2e2e)
           - Texto gris (#666) → menor jerarquía visual
           - Hover: borde y texto más claros
           - Redirige al formulario de contacto (/contacto)*/
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: transparent;
            border: 1px solid #2e2e2e;
            color: #666;
            font-size: 13px;
            padding: 11px;
            border-radius: 8px;
            text-decoration: none;
            transition: border-color 0.15s, color 0.15s;
        }
        .btn-back:hover {
            border-color: #444;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="success-wrapper">
        <div class="success-card">

             {{-- Ícono ✓ verde: señal visual inmediata de éxito --}}
            <div class="success-icon-wrap">
                <i class="bi bi-check-lg"></i>
            </div>

            {{-- Nombre de marca en fuente pixel art roja --}}
            <p class="success-brand">Catacumbas</p>

            <hr class="success-divider">

            {{-- Mensaje de confirmación --}}
            <h1 class="success-title">¡Mensaje recibido!</h1>
            <p class="success-body">
                Recibimos tu consulta correctamente. Un asesor se comunicará con vos a la brevedad.<br>
                ¡Muchas gracias por escribirnos!
            </p>
            {{-- Dos opciones de navegación post-confirmación --}}
            <div class="success-actions">
                <a href="{{ url('/') }}" class="btn-home">
                    <i class="bi bi-house"></i> Volver al inicio
                </a>
                <a href="{{ url('/contacto') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Volver al formulario
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>