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
</head>

<body class="text-white fondo-catacumbas">
    
    <x-navbar />

    {{-- Imagen de Alucard 
    <img src="{{ asset('images/castel.jpg') }}" class="float-end" style="position: absolute; right: 0; top: 0; z-index: -1; filter: blur(1px); max-width: 600px; opacity: 0.6;">
    --}}
    
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
            <div class="carousel-inner">
                
                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <img src="{{ asset('images/PokemonClassic.jpg') }}" class="d-block w-100" alt="Pokemon Classics" style="object-fit: cover; height: 500px;">
                    
                    {{-- Cambiamos la posición y alineación del caption top: 25%; bottom: auto;: Saca el texto de abajo y lo empuja hacia arriba.--}}
                    <div class="carousel-caption d-none d-md-block text-start" style="top: 25%; bottom: auto; left: 8%; right: auto; max-width: 50%;">
                        
                        <h5 class="display-3 fw-bold title-hero">Regresa a Kanto</h5>
                        <p class="fs-4 text-hero">La trilogía que lo empezó todo. Llévate las ediciones Rojo, Azul y Amarillo en un bundle legendario por solo $15.</p>
                        
                        {{-- Agregamos un botón para poder ver la oferta --}}
                        <a href="#" class="btn btn-warning btn-lg mt-3 fw-bold" style="background-color: #ffd70f; border: none;">Ver Oferta</a>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item active">
                    <img src="{{ asset('images/mgs.jpg') }}" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block text-start" style="top: 25%; bottom: auto; left: 8%; right: auto; max-width: 50%;">
                        <h5 class="display-3 fw-bold title-hero" style="color: #cc0000;">YA DISPONIBLE</h5>
                        <p class="fs-4 text-hero" style="color: #461313">Metal Gear Solid para la PlayStation 1 ya se encuentra disponible en formato fisico</p>
                    
                         <a href="#" class="btn btn-warning btn-lg mt-3 fw-bold" style="background-color: #c60000; border: none;">Comprar Ahora</a>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
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

    {{-- Flex es para decirle que se comporte de manera flexible --}}
    <div class="container mt-4" style="background-color: #232323; display: flex; justify-content: space-between; align-items: center; padding: 50px 40px;border-radius: 12px;">
        <div style="max-wifth: 55%;">
            <h1 class="display-4 fw-bold text-white mb-3" style="line-height: 1.1;">Sinfonía de la Noche</h1>
            <p class="fs-5 text-light mb-4">Adentrate en el castillo de Drácula. Reviví los clásicos de acción y RPG que definieron el género Metroidvania con un 30% de descuento.</p>
            {{-- El botón --}}
            <a href="#" class="btn btn-warning btn-lg fw-bold text-dark px-5 py-2" style="barkground-color: #ff8c00; border: none; border-radius: 4px;">Ver Oferta</a>
        </div>   
        <img src="{{ asset('images/castel.jpg') }}" style="width: 450px; height: auto; border-radius: 8px; box-shadow: 0px 10px 20px rgba(0,0,0,0.5);">
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


    {{-- Scripts de JS --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    

    {{-- el footer es la sección que se encuentra en la parte más baja de una página web, --}}
    <x-footer />
</body>
</html>