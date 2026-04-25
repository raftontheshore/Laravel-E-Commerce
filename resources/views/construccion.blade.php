<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- X-UA-Compatible: fuerza el modo de renderizado más modernoen Internet Explorer (ignorado por navegadores modernos)   --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>En Construcción - Catacumbas</title>

    {{-- Favicon e íconos. Bootstrap se carga desde /vendor (local)
         en lugar de CDN, a diferencia de otras páginas del proyecto --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    {{-- Press Start 2P: fuente pixel art de Google Fonts
         Usada para el título "EN CONSTRUCCION" para reforzar
         la estética retro de la página de espera               --}}
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        /* ── Base ────────────────────────────────────────────────
           Fondo negro casi puro (#0a0a0a), texto gris claro.
           !important garantiza que no sea sobreescrito por Bootstrap */
        body, html {
            background-color: #0a0a0a !important;
            color: #e0e0e0;
        }


        /* ── Tipografía pixel art ─────────────────────────────────
           .fuente-retro: aplica Press Start 2P con color rojo
           y text-shadow de 3px negra sólida → efecto clásico 8-bit  */
        .fuente-retro {
            font-family: 'Press Start 2P', cursive;
            color: #c02a2a;
            text-shadow: 3px 3px 0px #000000;
        }

       /* ── Botón rojo del proyecto ─────────────────────────────
           .btn-catacumbas: botón rojo con borde oscuro.
           !important sobreescribe estilos de Bootstrap.
           Hover: rojo más claro + glow rojo via box-shadow         */
        .btn-catacumbas {
            background-color: #c0392b !important;
            color: white !important;
            border: 1px solid #8a1f1f !important;
            font-weight: bold;
            transition: 0.3s;
            z-index: 0;
        }

        .btn-catacumbas:hover {
            background-color: #e63946 !important;
            color: white !important;
            box-shadow: 0 0 10px rgba(192, 42, 42, 0.5);
        }

         /* ── Inputs con tema oscuro ──────────────────────────────
           .input-oscuro: fondo muy oscuro (#1c1c1c), borde gris (#2e2e2e).
           placeholder: gris medio (#555) legible sobre el fondo oscuro.
           focus: borde cambia a rojo, sin box-shadow de Bootstrap
           (box-shadow: none elimina el anillo azul por defecto)      */
        .input-oscuro {
            background-color: #1c1c1c !important;
            border: 1px solid #2e2e2e !important;
            color: #ddd !important;
            font-size: 14px !important;
        }

        .input-oscuro::placeholder {
            color: #555555 !important; /* Un poco más claro para que se lea mejor */
            opacity: 1;
        }

        .input-oscuro:focus {
            box-shadow: none !important;
            border-color: #c0392b !important;
            background-color: #1c1c1c !important;
            color: #ddd !important;
        }

        /* Iconos sociales */
        .social-icons a {
            color: #666 !important;
            transition: opacity 0.3s ease, color 0.3s ease;
        }

        .social-icons a:hover {
            color: #c02a2a !important;
        }

         /* ── Tamaño del título ───────────────────────────────────
           Desktop: 3.5rem → más pequeño que el hero de inicio
           (comparte espacio con el GIF en layout de 2 columnas)
           Móvil (≤768px): 2.5rem → reducido para no desbordarse    */
        .titulo-gigante {
            font-size: 3.5rem !important; /* Lo bajamos un poquito para que entre bien al lado del GIF */
            letter-spacing: 2px;
            line-height: 1.2;
        }

        /* ── Tamaño ajustado para Celulares ── */
        @media (max-width: 768px) {
            .titulo-gigante {
                font-size: 2.5rem !important;
            }
        }
    </style>
</head>

{{-- d-flex flex-column min-vh-100 → layout de sticky footer:
     el body ocupa al menos 100% del viewport en altura,
     orientado en columna para que flex-grow-1 en section
     empuje el footer hacia abajo                                   --}}
<body class="d-flex flex-column min-vh-100">

    <x-navbar />

    {{-- ── AUDIO DE FONDO ─────────────────────────────────────────
         Música  que suena automáticamente.
         - autoplay: intenta reproducir al cargar la página
         - loop: reinicia el audio al terminar (bucle infinito)
         - El volumen real (30%) se ajusta via JS, no hay atributo HTML
         - id="musicaFondo": referenciado por el script al final      --}}
    <audio id="musicaFondo" autoplay loop>
        <source src="{{ asset('images/andre.mp3') }}" type="audio/mpeg">
    </audio>

    {{-- ── SECCIÓN PRINCIPAL ──────────────────────────────────────
         flex-grow-1 → ocupa todo el espacio vertical disponible
         d-flex align-items-center → centra el contenido verticalmente --}}
    <section class="coming-soon flex-grow-1 d-flex align-items-center">
        <div class="container">
            {{-- Layout de 2 columnas centradas horizontalmente
                 align-items-center → alinea verticalmente ambas columnas --}}
            <div class="row align-items-center justify-content-center">
                
                {{-- COLUMNA IZQUIERDA: GIF del herrero pixel art
                     - col-12: ancho completo en móvil (apilado)
                     - col-md-5: 5/12 del ancho en desktop
                     - mb-5 mb-md-0: margen inferior en móvil,
                       eliminado en desktop (están lado a lado)
                     - image-rendering: pixelated → preserva el estilo
                       sin suavizado del navegador
                     - max-width: 400px → limita tamaño del GIF         --}}
                <div class="col-12 col-md-5 text-center mb-5 mb-md-0">
                    <img src="{{ asset('images/andre3.gif') }}" alt="Herrero de Píxeles" class="img-fluid" style="max-width: 400px; image-rendering: pixelated;">
                </div>

                {{-- COLUMNA DERECHA: Título + descripción
                     - col-md-7: 7/12 del ancho en desktop (más ancha que el GIF)
                     - text-center text-md-start: centrado en móvil,
                       alineado a la izquierda en desktop               --}}
                <div class="col-12 col-md-7 text-center text-md-start">
                    
                    <h1 class="fuente-retro titulo-gigante mb-4">¡ EN CONSTRUCCION !</h1>
                    <p class="lead mb-4" style="color: #aaa;">Esta sección se encuentra actualmente en desarrollo. Por favor, volvé a visitarnos muy pronto</p>
                    
                </div>
            </div>
        </div>
    </section>
    <x-volverArriba />

    <x-footer />

    {{--
        SCRIPT: Manejo del autoplay de audio
        
        porque los navegadores BLOQUEAN el autoplay de audio si el usuario no interactuó
        previamente con la página. Este script maneja ambos casos. --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtiene el elemento <audio> por su ID
            const audio = document.getElementById('musicaFondo');
            audio.volume = 0.3; // Volumen al 30%

            // Intentamos reproducir el audio mediante JavaScript
            // audio.play() devuelve una Promise:
            // - resolved: el navegador permitió el autoplay
            // - rejected: el navegador bloqueó el autoplay
            let playPromise = audio.play();


            // Solo manejamos la Promise si el navegador la soporta
            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    // CASO 1: Autoplay permitido
                    // El audio ya está sonando
                    console.log("Autoplay iniciado correctamente.");
                }).catch(error => {
                    // CASO 2: Autoplay bloqueado por el navegador
                    // Plan de respaldo: esperar el primer clic del usuario
                    console.log("El navegador bloqueó el autoplay. Esperando interacción del usuario.");
                    
                    // Solo si falló el autoplay, escuchamos el primer clic en la pantalla
                    // { once: true } → el listener se elimina solo después del primer disparo
                    // (evita intentar reproducir en cada clic siguiente)
                    document.body.addEventListener('click', function() {
                        if (audio.paused) {
                            audio.play().catch(function(err) {
                                // Si sigue bloqueado (caso raro), lo registra en consola
                                console.log("Aún bloqueado:", err);
                            });
                        }
                    }, { once: true }); // ← se ejecuta una sola ve
                });
            }
        });
    </script>
    
</body>
</html>