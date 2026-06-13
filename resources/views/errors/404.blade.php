{{-- ============================================================
    PÁGINA: Error 404 - No Encontrado
    Pantalla para cuando el usuario ingresa a una ruta que no existe.
    Mantiene la estética retro, música y layout de la página en construcción.
============================================================ --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404 - Catacumbas</title>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body, html {
            background-color: #0a0a0a !important;
            color: #e0e0e0;
        }

        .fuente-retro {
            font-family: 'Press Start 2P', cursive;
            color: #c02a2a;
            text-shadow: 3px 3px 0px #000000;
        }

        .btn-catacumbas {
            background-color: #c0392b !important;
            color: white !important;
            border: 1px solid #8a1f1f !important;
            font-weight: bold;
            transition: 0.3s;
            z-index: 0;
            font-family: 'Press Start 2P', cursive; /* Le agregamos la fuente retro al botón también */
            font-size: 0.8rem;
            padding: 15px 25px;
        }

        .btn-catacumbas:hover {
            background-color: #e63946 !important;
            color: white !important;
            box-shadow: 0 0 10px rgba(192, 42, 42, 0.5);
        }

        .input-oscuro {
            background-color: #1c1c1c !important;
            border: 1px solid #2e2e2e !important;
            color: #ddd !important;
            font-size: 14px !important;
        }

        .input-oscuro::placeholder {
            color: #555555 !important;
            opacity: 1;
        }

        .input-oscuro:focus {
            box-shadow: none !important;
            border-color: #c0392b !important;
            background-color: #1c1c1c !important;
            color: #ddd !important;
        }

        .social-icons a {
            color: #666 !important;
            transition: opacity 0.3s ease, color 0.3s ease;
        }

        .social-icons a:hover {
            color: #c02a2a !important;
        }

        .titulo-gigante {
            font-size: 3.5rem !important;
            letter-spacing: 2px;
            line-height: 1.2;
        }

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
                
                {{-- COLUMNA IZQUIERDA: GIF --}}
                <div class="col-12 col-md-5 text-center mb-5 mb-md-0">
                    {{-- Si tenés otro GIF para el error 404 (ej: alguien perdido), podés cambiar la ruta acá. Por ahora dejamos a Andre --}}
                    <img src="{{ asset('images/andre3.gif') }}" alt="Herrero de Píxeles" class="img-fluid" style="max-width: 400px; image-rendering: pixelated;">
                </div>

                {{-- COLUMNA DERECHA: Textos y Botón --}}
                <div class="col-12 col-md-7 text-center text-md-start">
                    
                    <h1 class="fuente-retro titulo-gigante mb-4">¡ ERROR 404 !</h1>
                    <p class="lead mb-4" style="color: #aaa;">Parece que te perdiste en la oscuridad de las catacumbas. La página que estás buscando no existe.</p>
                    
                    {{-- Botón para rescatar al usuario y mandarlo al inicio --}}
                    <a href="{{ url('/') }}" class="btn btn-catacumbas text-decoration-none d-inline-block mt-2">
                        VOLVER AL INICIO
                    </a>
                    
                </div>
            </div>
        </div>
    </section>

    <x-volverArriba />
    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('musicaFondo');
            audio.volume = 0.3; 

            let playPromise = audio.play();

            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    console.log("Autoplay iniciado correctamente.");
                }).catch(error => {
                    console.log("El navegador bloqueó el autoplay. Esperando interacción del usuario.");
                    
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