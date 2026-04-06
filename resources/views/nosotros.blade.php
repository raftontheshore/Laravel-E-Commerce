<!DOCTYPE html>
<html>
    <head>
        <title>Sobre mi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <title>Catacumbas - Registro</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

        <link rel="stylesheet" href="{{ asset('css/estilos.css?v=3') }}">
    </head>

    <body>
         <x-navbar />
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        {{-- pt es Padding Top --}}
        {{-- pb es padding bottom --}}
        <section class="about-us pt-0 pb-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="font-weight-bold mb-4">¿Que es Catacumbas?</h2>
                        <p class="mb-4">
                            En Catacumbas nos dedicamos a la venta de juegos, consolas y software relacionado con el mundo retro. Nuestra misión es acercarle contenido increíble a nuestros clientes, siempre con excelentes ofertas. Lanzamos esta iniciativa en 2021 con apenas un par de consolas y juegos en el catálogo, pero gracias a ustedes hemos crecido humildemente hasta convertirnos en una tienda repleta de joyas clásicas y combos armados a medida.
                        </p>

                    </div>
                    <div class="col-md-6">
                        <img src="images/Armed_Skeleton.png" alt="About Us" class="img-fluid rounded shadow">
                    </div>
                </div>
                




                {{-- ESTO VA A SER DE CUANTOS CLIENTES TENEMOS Y ESO --}}
                <div class="row mt-5">
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-people fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">500+</h2>
                            <p>Clients</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-briefcase fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">1000+</h2>
                            <p>Projects</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-trophy fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">50+</h2>
                            <p >Awards</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-globe fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">20+</h2>
                            <p >Countries</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <x-footer />
        
    </body>
</html>