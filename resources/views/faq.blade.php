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

    <section class="py-5"> 
        <div class="container" style="width: 100%"> 
            <div class="row justify-content-center"> <div class="col-12 col-md-8 col-lg-6"> <div class="accordion" id="acordeonCatacumbas" style="--bs-accordion-btn-padding-y: 0.75rem;">
                     <h2 class="font-weight-bold mb-4">DESPEJA TUS DUDAS</h2>
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

                        {{-- OTRA PREGUNTA --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                    4. ¿Cuáles son las formas de pago?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
                                <div class="accordion-body">
                                    Aceptamos tarjetas de débito y crédito a través de Mercado Pago. Además, si elegís abonar por transferencia bancaria o efectivo, tenés un [10%] de descuento sobre el total de tu compra."
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                    5. ¿Dónde está mi compra? 
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
                                <div class="accordion-body">
                                     <p class="mb-3">Hay varias razones posibles por las que un cliente de Catacumbas puede no haber recibido una compra: </p>
                                    {{-- ol crea la lista numerada. ps-4 le da un poco de sangría a la izquierda --}}
                                    <ol class="ps-4 mb-4" style="line-height: 1.8;">

                                        <li class="mb-2">
                                            <strong>La dirección de correo electrónico se escribió incorrectamente:</strong>Si escribiste mal tu mail al hacer el pedido,<a href="/contacto" class="text-danger text-decoration-none fw-bold">contactanos</a> y lo arreglaremos de inmediado. 
                                        </li>

                                        <li class="mb-2">
                                            <strong>El pago no se acredito:</strong>
                                        </li>
                                    
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
         </div>
         </section>

    <x-footer />
    
   
</body>
</html>