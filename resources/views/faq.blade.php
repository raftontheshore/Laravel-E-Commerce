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
                                            <strong>La dirección de correo electrónico se escribió incorrectamente:</strong>Si escribiste mal tu mail al hacer el pedido,contactanos y lo arreglaremos de inmediado. 
                                        </li>

                                        <li class="mb-2">
                                            <strong>El pago no se acredito:</strong> Es posible que el pago no haya impactado en nuestro sistema. Volvé a verificar los movimientos de tu tarjeta o Mercado Pago para estar seguro.
                                        </li>
                                        
                                        <li class="mb-2">
                                            <strong>Retraso con el procesador de pago:</strong> Si ves un cargo "pendiente" o en "preautorización", esto indica que tu banco está retrasando el procesamiento del pedido.
                    
                                        </li>

                                        <li clase="mb-2">
                                            <strong>Rebote de correo:</strong> Tu proveedor de correo electrónico (ej. Hotmail) podría estar enviando nuestros correos a la carpeta de Spam o rebotándolos.
                                        </li>

                                        <p>Si no podés encontrar tu compra después de revisar todas las opciones anteriores, <a href="/contacto" target="_blank" class="text-danger text-decoration-none ">contactanos</a> y un miembro del equipo de Catacumbas estará encantado de atender tu caso.</p>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                    6. ¿Qué debo hacer si mi cuenta fue pirateada o tiene cargos fraudulentos?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
                                <div class="accordion-body">
                                   <p class="mb-3">¡No te preocupes, a cualquiera le puede pasar! Si creés que tu cuenta fue comprometida o usada sin tu permiso, contactate con el soporte de Catacumbas indicando el número de orden de las compras no reconocidas y qué artículos fueron.</p>
                                    
                                   <p class="mb-3">Por otro lado, si detectás cargos fraudulentos en tu método de pago, te recomendamos confirmar primero que no haya sido un amigo o familiar. Si no es el caso, comunicate inmediatamente con tu banco y con nuestro equipo. ¡Recordá que vamos a necesitar el comprobante o la información de pago para poder ubicar y cancelar la transacción!</p>
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