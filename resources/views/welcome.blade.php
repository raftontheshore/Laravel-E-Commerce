<!DOCTYPE html>
<html lang="es">
<head>
    {{-- UTF-8 Para los acentos y caracteres especiales --}}
    <meta charset="UTF-8">
    
    {{-- Para que se vea bien en celulares (NOSE SI ES NECESARIO) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- El diseño y los estilos --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Catacumbas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- con esto cambiamos la fuente de nuestra pag --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    
    <style>

        /*responsive */
        /* Altura del carrusel por defecto (celulares) */
        .carrusel-img {
            width: 100%;
            height: 250px !important;
            object-fit: cover !important;
        }
        /* Fondo transparente para textos del carrusel en celular */
        .caja-texto-movil {
            background: transparent;
            padding: 15px;/* Altura forzada para que no ocupe toda la pantalla en celulares */
            border-radius: 10px;/* Evita que la imagen se deforme al achicarse */
        }
        /* Freno para el póster vertical de Castlevania en celulares */
        .img-castlevania {
            width: 100%;
            max-width: 260px;/* Freno de crecimiento en móviles */
        }

        /* Cambios cuando la pantalla es grande (PC) */
        @media (min-width: 768px) {
            .carrusel-img {
                height: 500px !important;/* Recupera su altura panorámica */
            }
            .caja-texto-movil {
                background: transparent;
                padding: 0;
            }
            .img-castlevania {
                max-width: 450px;/* Tamaño original del póster en PC */
            }
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">
    
    <x-navbar />
    
    {{-- Limpiamos el float para que el carrusel no se suba a la imagen --}}
    <div class="clearfix"></div>

    {{-- Carrusel envuelto en un container para mejor diseño --}}
    <div class="container mt-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            
            {{-- Indicadores (Puntitos de abajo) --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            {{-- Contenido del Carrusel --}}
            <div class="carousel-inner" style="border-radius: 12px; overflow: hidden;">
                
                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <img src="{{ asset('images/PokemonClassic_Copia2.jpg') }}" class="d-block w-100 carrusel-img" alt="Pokemon Classics">
                    
                    {{-- Le sacamos el d-none y agregamos caja-texto-movil --}}
                    <div class="carousel-caption text-start caja-texto-movil" style="top: 50%; transform: translateY(-50%); bottom: auto; left: 8%; right: 8%; max-width: 100%;">
                        <h5 class="display-5 fw-bold title-hero">Regresa a Kanto</h5>
                        <p class="fs-6 fs-md-4 text-hero">La trilogía que lo empezó todo. Llévate las ediciones Rojo, Azul y Amarillo en un bundle legendario por solo $15.</p>
                        <a href="#" class="btn btn-warning mt-2 fw-bold" style="background-color: #ffd70f; border: none;">Ver Oferta</a>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <img src="{{ asset('images/mgs.jpg') }}" class="d-block w-100 carrusel-img" alt="Slide 2">
                    
                    <div class="carousel-caption text-start caja-texto-movil" style="top: 50%; transform: translateY(-50%); bottom: auto; left: 8%; right: 8%; max-width: 100%;">
                        <h5 class="display-5 fw-bold title-hero" style="color: #ff4444;">YA DISPONIBLE</h5>
                        <p class="fs-6 fs-md-4 text-hero text-light">Metal Gear Solid para la PlayStation 1 ya se encuentra disponible en formato físico.</p>
                        <a href="#" class="btn btn-danger mt-2 fw-bold text-white" style="background-color: #c60000; border: none;">Comprar Ahora</a>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <img src="{{ asset('images/ps2.png') }}" class="d-block w-100 carrusel-img" alt="Slide 3">
                    
                    <div class="carousel-caption text-start caja-texto-movil" style="top: 50%; transform: translateY(-50%); bottom: auto; left: 8%; right: 8%; max-width: 100%;">
                        <h5 class="display-5 fw-bold title-hero" style="color: #ffffff;">LA REINA DE LA CASA</h5>
                        <p class="fs-6 fs-md-4 text-hero" style="color: #fefefe">Vuelve la PlayStation 2 Slim. Chipeada y lista para que revivas tus mejores tardes de vicio.</p>
                        <a href="#" class="btn mt-2 fw-bold text-white" style="background-color: #0078d4; border: none;">Comprar Ahora</a>
                    </div>
                </div>

            </div>

            {{-- Botones de Navegación (Flechitas) --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>

    {{-- Banner de Castlevania --}}
    <div class="container mt-4" style="background-color: #232323; padding: 40px; border-radius: 12px;">
    <div class="row align-items-center">
        
        {{-- Columna del texto --}}
        <div class="col-12 col-lg-7 mb-4 mb-lg-0">
            <h1 class="display-4 fw-bold text-white mb-3" style="line-height: 1.1;">SINFONIA DE LA NOCHE</h1>
            <p class="fs-5 text-light mb-4">Adentrate en el castillo de Drácula. Reviví los clásicos de acción y RPG que definieron el género Metroidvania con un 30% de descuento.</p>
            <a href="#" class="btn btn-warning btn-lg fw-bold text-dark px-5 py-2" style="background-color: #ffb300; border: none; border-radius: 4px;">Ver Oferta</a>
        </div> 
        
        {{-- Columna de la imagen: Le agregamos mt-4 para celular y la clase img-castlevania --}}
        <div class="col-12 col-lg-5 text-center mt-4 mt-lg-0">
            <img src="{{ asset('images/castel.jpg') }}" class="img-fluid img-castlevania mx-auto" style="border-radius: 8px; box-shadow: 0px 10px 20px rgba(0,0,0,0.5);" alt="Castlevania Symphony of the Night">
        </div>

    </div>
    </div>

    <br/>
    {{-- ACA MODIFICAMOS EL CARRUSEL DE DESTACADOS-----  --}}
    <div class="container mt-5 bm-5">
        <h3 class="text-white fw-bold mb-4" style="font-family: 'Oswald', sans-serif;">Destacados</h3>

        <div class="row flex-nowrap overflow-x-auto pb-3" id="carrusel-oscuro" style="scrollbar-width: thin;">
            {{-- aca llama a carta producto --}}
            @foreach($productos_destacados as $producto)
            <div class="col-10 col-md-3 col-lg-3 mb-3">
                <x-carta-producto :producto="$producto" />
            </div>  
            @endforeach 
        </div>
    </div>

    {{-- CARRUCEL DE CONSOLAS  --}}
    <div class="container mt-5 bm-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
            
            <h3 class="text-white fw-bold m-0" style="font-family: 'Oswald', sans-serif;">Consolas</h3>
            
            <a href="/tienda/consola" class="text-decoration-none d-flex align-items-center" style="color: #aaa; font-size: 0.95rem; transition: 0.3s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#aaa'">
                Ver más <i class="bi bi-arrow-right ms-2"></i>
            </a>
            
        </div>
        
        <div class="row flex-nowrap overflow-x-auto pb-3 carrusel-tema-oscuro">
            @foreach($consolas as $consola)
            <div class="col-10 col-md-3 col-lg-3 mb-3">
                <x-carta-producto :producto="$consola" />
            </div>  
            @endforeach 
        </div>
    </div>

    {{-- SCRIPT PARA QUE LOS CARRUSELES SE MUEVAN SOLOS (EFECTO VA Y VIENE) --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const carruseles = document.querySelectorAll('.carrusel-tema-oscuro');

                carruseles.forEach(carrusel => {
                    let intervalo;
                    const velocidad = 1; // Píxeles por paso
                    const tiempo = 30;   // Milisegundos entre paso
                    let direccion = 1;   // 1 va a la derecha, -1 va a la izquierda

                    function iniciarScroll() {
                        intervalo = setInterval(() => {
                            
                            // Si choca contra el final derecho, cambia la dirección a la izquierda (-1)
                            if (carrusel.scrollLeft + carrusel.clientWidth >= carrusel.scrollWidth - 1) {
                                direccion = -1;
                            } 
                            // Si choca contra el principio izquierdo, cambia la dirección a la derecha (1)
                            else if (carrusel.scrollLeft <= 0) {
                                direccion = 1;
                            }

                            // Movemos el carrusel multiplicando por la dirección
                            carrusel.scrollLeft += (velocidad * direccion);

                        }, tiempo);
                    }

                    function detenerScroll() {
                        clearInterval(intervalo);
                    }

                    // Iniciamos el movimiento
                    iniciarScroll();

                    // Pausamos al pasar el mouse o tocar la pantalla
                    carrusel.addEventListener('mouseenter', detenerScroll);
                    carrusel.addEventListener('mouseleave', iniciarScroll);
                    carrusel.addEventListener('touchstart', detenerScroll);
                    carrusel.addEventListener('touchend', iniciarScroll);
                });
            });
        </script>
    
    <x-footer />
</body>
</html>