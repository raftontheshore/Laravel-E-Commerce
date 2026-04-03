<!DOCTYPE html>
<html lang="es">
<head>
    {{-- UTF-8 Para los acentos y caracteres especiales --}}
    <meta charset="UTF-8">
    
    {{-- Para que se vea bien en celulares (NOSE SI ES NECESARIO) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- El diseño y los estilos --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/favicon-16x16.png') }}">
    <title>CATACUMBAS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- con esto cambiamos la fuente de nuestra pag --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark text-white">
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="/">
                {{-- aca agregamo el nombre y la imagen de la nav bar --}}
                <img src="{{ asset('images/favicon.png') }}" alt="logo" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Explorar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">The Origin</a></li>
                            <li><a class="dropdown-item" href="#">Support</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> 
                    --}}
                </ul>
                
                {{-- aca esta los botones de log in sign in  y esta adentro para que no se deforme cuando cambia de tamaño --}}
                <div class="d-flex align-items-center ms-auto">
                    
                    <div class="search-container me-3">
                        <i class="bi bi-search search-icon-inside"></i>
                        <input type="text" class="search-input-custom" placeholder="Search..." name="query">
                    </div>

                    <a href="#" class="nav-link text-secondary me-3">Log in</a>
                    <a href="#" class="btn btn-sm btn-secondary">Sign in</a>
                    
                </div>
                {{-- aca esta los botones de log in sign in --}}

            </div>
        </div>
    </nav>

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
                    
                    {{-- Cambiamos la posición y alineación del caption --}}
                    <div class="carousel-caption d-none d-md-block text-start" style="top: 25%; bottom: auto; left: 8%; right: auto; max-width: 50%;">
                        
                        <h5 class="display-3 fw-bold title-hero">Regresa a Kanto</h5>
                        <p class="fs-4 text-hero">La trilogía que lo empezó todo. Llévate las ediciones Rojo, Azul y Amarillo en un bundle legendario por solo $15.</p>
                        
                        {{-- Agregamos un botón opcional para que parezca más una oferta --}}
                        <a href="#" class="btn btn-warning btn-lg mt-3 fw-bold" style="background-color: #ff00d0; border: none;">Ver Oferta</a>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
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
    <div class="container mt-4" style="background-color: #404449; display: flex; justify-content: space-between; align-items: flex-start; padding: 20px;">
        <div>
            <h1>Look! Search Action!</h1>
            <p>retro action game deals</p>
        </div>   
        <img src="{{ asset('images/castel.jpg') }}" style="width: 450px; height: auto;">
    </div>

    {{-- Scripts de JS --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
</body>
</html>