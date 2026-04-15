<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>En Construcción - Catacumbas</title>
    
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        /* Fondo oscuro para toda la página */
        body, html {
            background-color: #0a0a0a !important;
            color: #e0e0e0;
        }

        .coming-soon {
            background: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%);
        }

        /* Estilo pixelado */
        .fuente-retro {
            font-family: 'Press Start 2P', cursive;
            color: #c02a2a;
            text-shadow: 3px 3px 0px #000000;
        }

        /* Botón personalizado rojo */
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

        /* ── Estilo exacto sacado del Login ── */
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

        /* ── Tamaño gigante para PC (Ajustado para 2 columnas) ── */
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
<body class="d-flex flex-column min-vh-100">

    <x-navbar />

    <audio id="musicaFondo" autoplay loop>
        <source src="{{ asset('images/andre.mp3') }}" type="audio/mpeg">
    </audio>

    <section class="coming-soon flex-grow-1 d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                
                {{-- COLUMNA IZQUIERDA: EL HERRERO --}}
                <div class="col-12 col-md-5 text-center mb-5 mb-md-0">
                    <img src="{{ asset('images/andre3.gif') }}" alt="Herrero de Píxeles" class="img-fluid" style="max-width: 400px; image-rendering: pixelated;">
                </div>

                {{-- COLUMNA DERECHA: TEXTOS Y FORMULARIO --}}
                <div class="col-12 col-md-7 text-center text-md-start">
                    
                    <h1 class="fuente-retro titulo-gigante mb-4">¡ EN CONSTRUCCION !</h1>
                    <p class="lead mb-4" style="color: #aaa;">Esta sección se encuentra actualmente en desarrollo. Por favor, volvé a visitarnos muy pronto</p>
                    
                </div>
            </div>
        </div>
    </section>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('musicaFondo');
            audio.volume = 0.3; // Volumen al 30%

            // Intentamos reproducir el audio mediante JavaScript
            let playPromise = audio.play();

            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    // ¡El autoplay funcionó! (El navegador lo permitió)
                    console.log("Autoplay iniciado correctamente.");
                }).catch(error => {
                    // El navegador bloqueó el autoplay. Activamos el plan de respaldo.
                    console.log("El navegador bloqueó el autoplay. Esperando interacción del usuario.");
                    
                    // Solo si falló el autoplay, escuchamos el primer clic en la pantalla
                    document.body.addEventListener('click', function() {
                        if (audio.paused) {
                            audio.play().catch(function(err) {
                                console.log("Aún bloqueado:", err);
                            });
                        }
                    }, { once: true });
                });
            }
        });
    </script>
    
</body>
</html>