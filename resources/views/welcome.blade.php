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

    <x-marquee />

    <x-carrusel/>
    

    {{-- Banner de Castlevania Mejoado --}}
<div class="container mt-4 p-5 rounded-4 position-relative overflow-hidden" 
     style="background: radial-gradient(circle, #2a2a2a, #1a1a1a); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
    
    {{-- Efecto de niebla/textura de fondo --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background-image: url('{{ asset('images/brick_texture.png') }}'); opacity: 0.1; background-size: cover;"></div>

    <div class="row align-items-center position-relative z-1">
        
        {{-- Columna del texto --}}
        <div class="col-12 col-lg-7 mb-4 mb-lg-0">
            
            {{-- Sección de Tags/Etiquetas --}}
            <div class="d-flex gap-2 mb-3">
                <span class="badge text-uppercase fw-bold px-3 py-2" 
                      style="background-color: #c02a2a; color: white; border-radius: 6px; font-size: 0.9rem;">
                    OFERTA
                </span>
                <span class="badge text-uppercase fw-bold px-3 py-2" 
                      style="background-color: #004d99; color: white; border-radius: 6px; font-size: 0.9rem;">
                    PS1
                </span>
            </div>

            {{-- Título Principal con tipografía pixelada --}}
            <h1 class="text-white mb-3" 
                style="font-family: 'Press Start 2P', cursive; line-height: 1.2; font-size: 3rem; text-shadow: 2px 2px 0 #000;">
                SINFONIA DE LA NOCHE
            </h1>
            
            <p class="fs-5 text-light mb-4" style="max-width: 600px;">
                Adéntrate en el castillo de Drácula. Reviví los clásicos de acción y RPG que definieron el género Metroidvania con un 30% de descuento.
            </p>
            
            <a href="/construccion" class="btn btn-lg fw-bold px-5 py-3 text-dark shadow-lg" 
               style="background-color: #ffb300; border: none; border-radius: 8px; transition: transform 0.2s;">
                Ver Oferta
            </a>
        </div> 
        
        {{-- Columna de la imagen --}}
        <div class="col-12 col-lg-5 text-center mt-4 mt-lg-0">
            <img src="{{ asset('images/castel.jpg') }}" 
                 class="img-fluid rounded-3 shadow-lg mx-auto d-block" 
                 style="max-height: 450px; transform: rotate(2deg);" 
                 alt="Castlevania Symphony of the Night Art">
        </div>

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
    <x-volverArriba />
    <x-footer />
</body>
</html>