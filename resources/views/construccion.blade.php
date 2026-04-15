<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Próximamente - Catacumbas</title>
    
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        /* Fondo oscuro para toda la página */
        body, html {
            background-color: #0a0a0a !important; /* Casi negro */
            color: #e0e0e0;
        }

        .coming-soon {
            /* Un degradado radial sutil para dar profundidad en el centro */
            background: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%);
        }

        /* Estilo pixelado para el título y contador */
        .fuente-retro {
            font-family: 'Press Start 2P', cursive;
            color: #c02a2a; /* Rojo oscuro tipo sangre */
            text-shadow: 3px 3px 0px #000000; /* Sombra para darle volumen */
        }

        /* Ajustes del contador */
        .countdown h2 {
            position: relative;
            font-size: 2.5rem; /* Ajuste de tamaño para la fuente pixelada */
        }

        .countdown h2::after {
            content: ':';
            position: absolute;
            right: -25px;
            top: 50%;
            transform: translateY(-50%);
            color: #c02a2a;
        }

        .countdown div:last-child h2::after {
            display: none;
        }

        .countdown p {
            color: #888; /* Gris medio para las etiquetas (Days, Hours) */
            font-weight: bold;
            margin-top: 10px;
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

        /* El color exacto del texto "Ingresá tu email" (placeholder) */
        .input-oscuro::placeholder {
            color: #3a3a3a !important; 
            opacity: 1;
        }

        /* Cuando hacés clic para escribir (le mantenemos tu borde rojo) */
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
    </style>
</head>
<body>

    <x-navbar />

    <section class="coming-soon vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-8 text-center">
                    
                    <h1 class="fuente-retro mb-4 mt-4">COMING SOON</h1>
                    <p class="lead mb-5" style="color: #aaa;">Estamos preparando el terreno. Falta poco.</p>
                    
                    
                    
                    <form class="d-flex justify-content-center mt-4 w-100">
                        <div class="input-group shadow-lg" style="max-width: 450px;">
                            <input type="email" class="form-control input-oscuro" placeholder="Ingresá tu email" aria-label="Email">
                            <button class="btn btn-catacumbas px-4" type="button" id="button-addon2" >Avisame</button>
                        </div>
                    </form>
                    
                    <div class="social-icons mt-5">
                        <a href="#" class="mx-2"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="mx-2"><i class="bi bi-twitter-x fs-4"></i></a>
                        <a href="#" class="mx-2"><i class="bi bi-instagram fs-4"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-footer />
    
</body>
</html>