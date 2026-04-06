<!DOCTYPE html>
<html>
    <head>
        <title>Sobre Catacumbas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <title>Catacumbas - Registro</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        

        <link rel="stylesheet" href="{{ asset('css/estilos.css?v=7') }}">
    </head>

    <body class="bg-black text-white">
         <x-navbar />

    

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
                <br />
                </div>
                {{-- mt-5 (margin-top nivel 5 --}}
                     <h2 class="font-weight-bold mb-4 mt-5" style="text-align: center;">¿Como Trabajamos?</h2>

                     <div class="row mt-5 justify-content-center">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="text-center">
                                <i class="bi bi-people fs-1 text-primary mb-2"></i>
                                <h2 class="fw-bold">REVIVIMOS CLASICOS</h2>
                                <p>Cada consola y cartucho que entra a Catacumbas pasa por un riguroso proceso de limpieza y mantenimiento. Nos aseguramos de que todo funcione a la perfección, ofreciendo garantía real para que tu única preocupación sea jugar.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="text-center">
                                <i class="bi bi-briefcase fs-1 text-primary mb-2"></i>
                                <h2 class="fw-bold">COMPRA Y CANJE</h2>
                                <p>¿Tenés alguna consola vieja juntando polvo? En nuestra tienda tomamos tus equipos retro (funcionen o no) como parte de pago, o los compramos directo. Renová tu colección entregando esas reliquias que ya no usás.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="text-center">
                                <i class="bi bi-trophy fs-1 text-primary mb-2"></i>
                                <h2 class="fw-bold">COMBOS LISTOS PARA VICIAR</h2>
                                <p >Olvidate de buscar cables por un lado y juegos por el otro. Armamos paquetes completos a medida con consolas, accesorios y los mejores títulos para que viajes directo a tu infancia apenas conectes el equipo.</p>
                            </div>
                        </div>
                        
                    </div>
                <div>

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

                {{-- ACORDEADO  --}}

                <div class="accordion" id="acordeonCatacumbas">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                1. ¿Hacen envíos a todo el país?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
                            <div class="accordion-body">
                                Sí, preparamos y despachamos paquetes todos los días. Hacemos envíos desde Corrientes a cualquier punto de Argentina a través de correo certificado para que tu consola llegue impecable.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                2. ¿Los juegos y consolas usadas tienen garantía?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
                            <div class="accordion-body">
                                ¡Por supuesto! Todo nuestro hardware pasa por un riguroso proceso de limpieza y mantenimiento. Ofrecemos 3 meses de garantía en consolas reacondicionadas y chipeadas.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                3. ¿Compran consolas o juegos retro usados?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
                            <div class="accordion-body">
                                Sí, tomamos tus consolas viejas (funcionen o no) como parte de pago o las compramos directamente para nuestro taller de restauración.
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
        </section>
        
    <x-footer />
 
    </body>
</html>