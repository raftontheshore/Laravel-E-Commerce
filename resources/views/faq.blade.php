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

                {{-- ACORDEADO  --}}
     <section>
                <div class="accordion" id="acordeonCatacumbas" style="--bs-accordion-btn-padding-y: 0.75rem;">
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