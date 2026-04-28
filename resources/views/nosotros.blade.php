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

    <body class="bg-black text-white" style="text-align: justify;">
         <x-navbar />

    

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        {{-- pt es Padding Top --}}
        {{-- pb es padding bottom --}}
        <section class="about-us pt-0 pb-5">
            <div class="container">
                {{-- 
                    BLOQUE 1: ¿Qué es Catacumbas?
                    - align-items-center: centra verticalmente texto e imagen en la fila
                --}}
                <div class="row align-items-center">
                    <div class="col-md-6 ps-md-4">
                         {{-- ps-md-4: padding izquierdo solo en pantallas medianas o mayores --}}
                        <h2 class="font-weight-bold mb-4">¿Que es Catacumbas?</h2>
                        <p class="mb-4">
                            En Catacumbas nos dedicamos a la venta de juegos, consolas y software relacionado con el mundo retro. Nuestra misión es acercarle contenido increíble a nuestros clientes, siempre con excelentes ofertas. Lanzamos esta iniciativa en 2021 con apenas un par de consolas y juegos en el catálogo, pero gracias a ustedes hemos crecido humildemente hasta convertirnos en una tienda repleta de joyas clásicas y combos armados a medida.
                        </p>

                    </div>
                    <div class="col-md-6 ps-md-4">
                        {{-- 
                        Imagen de un esqueleto armado
                        - img-fluid: responsive, no se desborda del contenedor
                        - rounded: bordes redondeados
                        - shadow: sombra decorativa
                        - image-rendering: pixelated → preserva el estilo pixel art sin suavizado
                        - max-height: 500px limita el alto máximo
                    --}}
                        <img src="images/Armed_Skeleton.png" alt="About Us" class="img-fluid rounded shadow" style="max-height: 500px; width: auto; image-rendering: pixelated;">
                    </div>
                <br />
                </div>
                {{-- mt-5 (margin-top nivel 5 --}}
                     <h2 class="font-weight-bold mb-4 mt-5" style="text-align: center;">¿Como Trabajamos?</h2>

                     {{-- 
                        FILA DE 3 COLUMNAS
                        - justify-content-center: centra las columnas horizontalmente
                        - mt-5: margen superior para separar del título
                    --}}

                     <div class="row mt-5 justify-content-center">
                        <div class="col-md-4 col-12 mb-4">
                            <div class="text-center">
                                {{-- 
                                    col-md-4: ocupa 1/3 del ancho en pantallas medianas+
                                    col-12: ocupa todo el ancho en móvil (apilado)
                                    mb-4: margen inferior entre tarjetas
                                --}}
                                <img src="{{ asset('images/game-cartridge-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                                <h2 class="fw-bold mb-3" style="font-size: 2rem; letter-spacing: 1px;">REVIVIMOS CLASICOS</h2>
                                <p>Cada consola y cartucho que entra a Catacumbas pasa por un riguroso proceso de limpieza y mantenimiento. Nos aseguramos de que todo funcione a la perfección, ofreciendo garantía real para que tu única preocupación sea jugar.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-4">
                            <div class="text-center">
                                <img src="{{ asset('images/budget-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                                <h2 class="fw-bold">COMPRA Y CANJE</h2>
                                <p>¿Tenés alguna consola vieja juntando polvo? En nuestra tienda tomamos tus equipos retro (funcionen o no) como parte de pago, o los compramos directo. Renová tu colección entregando esas reliquias que ya no usás.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-4">
                            <div class="text-center">
                                <img src="{{ asset('images/videogame-console-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                                <h2 class="fw-bold">COMBOS LISTOS PARA VICIAR</h2>
                                <p >Olvidate de buscar cables por un lado y juegos por el otro. Armamos paquetes completos a medida con consolas, accesorios y los mejores títulos para que viajes directo a tu infancia apenas conectes el equipo.</p>
                            </div>
                        </div>
                        
                    </div>
                <div>

                </div>




                {{-- ESTO VA A SER DE CUANTOS CLIENTES TENEMOS Y ESO --}}

                <h2 class="font-weight-bold mb-4 mt-5" style="text-align: center;">LO QUE NOS DEFINE</h2>

                <div class="row mt-5">
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <img src="{{ asset('images/campfire-ring-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                            <h2 class="fw-bold">COMUNIDAD</h2>
                            <p>Más que clientes, sumamos jugadores. Creamos un refugio donde la nostalgia y la pasión absoluta por el gaming clásico nos unen</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <img src="{{ asset('images/briefcase-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                            <h2 class="fw-bold">TRAYECTORIA</h2>
                            <p>Desde 2021 rescatando joyas del olvido. Arrancamos con un par de consolas y hoy somos el punto de encuentro del retro gaming</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <img src="{{ asset('images/red-heart-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                            <h2 class="fw-bold">VALORES</h2>
                            <p >Transparencia, calidad y respeto por el hardware. Cada equipo recibe un mantenimiento obsesivo para ofrecerte una garantía real.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <img src="{{ asset('images/earth-pixel-2-Original.png') }}" alt="Icono" class="mb-4" style="width: 128px; height: 128px; image-rendering: pixelated;">
                            <h2 class="fw-bold">VISION</h2>
                            <p >Mantener vivo el legado. Queremos que viajar a tu infancia sea tan simple y mágico como enchufar la consola y apretar 'Start'.</p>
                        </div>
                    </div>
                </div>


                {{-- PARTE DE LA PAGINA DONDE ESTA LAS IMAGENES Y INFO DEL STAFF --}}
                <h2 class="font-weight-bold mb-4 mt-5" style="text-align: center;">Equipo detras de Catacumbas</h2>

                <div class="container mt-5 mb-5">
                    <div class="row justify-content-center">
                        
                        {{-- Usamos col-lg-5 para limitar el ancho y que el texto no se estire por toda la pantalla, igual que en tu foto de referencia --}}
                        <div class="col-12 col-md-8 col-lg-5">
                            
                            {{-- Centramos solamente la foto y el título --}}
                            <div class="text-center">
                                
                                {{--
                                    rounded-circle: la hace redonda.
                                    object-fit: cover: evita que la foto se deforme si no es cuadrada originalmente.
                                    shadow-lg: le da profundidad. --}}
                                <img src="{{ asset('images/JohnDoe.jpg') }}" alt="Carlos" class="rounded-circle shadow-lg mb-4" style="width: 220px; height: 220px; object-fit: cover; border: 3px solid #c0392b;">
                                
                                {{-- El Nombre --}}
                                <h2 class="display-5 fw-bold mb-4" style="color: #c0392b; font-family: 'Oswald', sans-serif;">Carlos</h2>
                            </div>

                            {{-- El Texto de descripción (Alineado a la izquierda para que sea más fácil de leer, como en tu ejemplo) --}}
                            <div class="text-start">
                                <p class="fs-5" style="color: #e0e0e0; line-height: 1.6;">
                                    Carlos ha estado detrás de Catacumbas desde el día uno. Es la cara que la mayoría de la gente reconoce y el corazón detrás del mostrador. Si has visto nuestros combos listos para viciar, hay muchas chances de que hayas visto a Carlos preparando pedidos, testeando consolas o rescatando tu juego favorito de la infancia.
                                </p>
                                <p class="fs-5" style="color: #e0e0e0; line-height: 1.6;">
                                    Está acá porque ama lo que Catacumbas representa: revivir clásicos, compartir recuerdos y la creencia de que la edad de oro del gaming nunca muere. Carlos aporta esa pasión a cada consola que repara, y es por eso que la comunidad conecta tanto con el proyecto.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container mt-5 mb-5">
                    <div class="row justify-content-center">
                        
                        {{-- Usamos col-lg-5 para limitar el ancho y que el texto no se estire por toda la pantalla, igual que en tu foto de referencia --}}
                        <div class="col-12 col-md-8 col-lg-5">
                            
                            {{-- Centramos solamente la foto y el título --}}
                            <div class="text-center">
                                
                                {{--
                                    rounded-circle: la hace redonda.
                                    object-fit: cover: evita que la foto se deforme si no es cuadrada originalmente.
                                    shadow-lg: le da profundidad. --}}
                                <img src="{{ asset('images/JaneDoe.jpg') }}" alt="Abigail" class="rounded-circle shadow-lg mb-4" style="width: 220px; height: 220px; object-fit: cover; border: 3px solid #c0392b;">
                                
                                {{-- El Nombre --}}
                                <h2 class="display-5 fw-bold mb-4" style="color: #c0392b; font-family: 'Oswald', sans-serif;">Abigail</h2>
                            </div>

                            {{-- El Texto de descripción (Alineado a la izquierda para que sea más fácil de leer, como en tu ejemplo) --}}
                            <div class="text-start">
                                <p class="fs-5" style="color: #e0e0e0; line-height: 1.6;">
                                    Abigail llegó a Catacumbas con una energía inagotable y un amor incondicional por los arcades y las tardes de multijugador local. Es el tipo de gamer que te puede hablar horas sobre por qué los juegos de antes tenían una magia especial.
                                </p>
                                <p class="fs-5" style="color: #e0e0e0; line-height: 1.6;">
                                    Su entusiasmo contagia a cualquiera. Está acá porque cree firmemente que cada joya retro tiene un dueño ideal esperando encontrarla. La vas a ver siempre recomendando títulos y asegurándose de que te lleves la mejor experiencia posible a casa.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            
        </section>
    <x-volverArriba />
    <x-footer />
 
    </body>
</html>