{{-- ============================================================
    PÁGINA: Error 403 - Acceso Denegado
    Pantalla para cuando el usuario no tiene permisos.
============================================================ --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 403 - Catacumbas</title>

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
            font-weight: normal;
            transition: 0.3s;
            z-index: 0;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            padding: 15px 25px;
        }

        .btn-catacumbas:hover {
            background-color: #e63946 !important;
            color: white !important;
            box-shadow: 0 0 10px rgba(192, 42, 42, 0.5);
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
                
                <div class="col-12 col-md-5 text-center mb-5 mb-md-0">
                    <img src="{{ asset('images/nitto.gif') }}" alt="Herrero de Píxeles" class="img-fluid" style="max-width: 400px; image-rendering: pixelated;">
                </div>

                <div class="col-12 col-md-7 text-center text-md-start">
                    
                    <h1 class="fuente-retro titulo-gigante mb-4">¡ ALTO AHI !</h1>
                    <h3 class="fuente-retro mb-3" style="font-size: 1.5rem; color: #e63946;">ERROR 403</h3>
                    <p class="lead mb-4" style="color: #aaa;">Esta zona de Catacumbas no está pensada para que la accedas. El acceso está bloqueado.</p>
                    
                    <a href="{{ url('/') }}" class="btn btn-catacumbas text-decoration-none d-inline-block mt-2">
                        Volver al inicio
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
                    document.body.addEventListener('click', function() {
                        if (audio.paused) {
                            audio.play().catch(err => console.log("Aún bloqueado:", err));
                        }
                    }, { once: true }); 
                });
            }
        });
    </script>
    
</body>
</html>