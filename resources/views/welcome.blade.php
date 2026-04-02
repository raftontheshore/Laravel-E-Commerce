{{--<!DOCTYPE html>
<html>
<head>
<title>Sobre mi</title>
 
<style>
body {
font-family: Arial;
background-color: #f4f4f4;
margin: 40px;
}

.container {
background: white;
padding: 20px;
border-radius: 10px;
max-width: 600px;
}

h1 {
color: #333;
}

p {
line-height: 1.6;
}
</style>

<link rel="stylesheet" href="/css/estilos.css">

</head>

<body>

<center>
<div class="container">
<nav class="navbar">
    <a href="/">Inicio</a>
    <a href="/sobre-mi">Sobre mí</a>
    </nav>
</center>



</body>
</html>--}}

{{--aca esta lo que se agrego --}}
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

    
</head>

    <body class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
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
            {{--</li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
        </ul>
        {{-- aca esta los botones de log in sign in  y esta adentro para que no se deforme cuando cambia de tamaño--}}
        <div class="d-flex align-items-center ms-auto">
            <form class="d-flex me-2" role="search">
                    <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
            </form>

                 <a href="#" class="btn btn-sm btn-outline-primary me-2">Log in</a>
                 <a href="#" class="btn btn-sm btn-primary">Sign in</a>
        </div>
        {{-- aca esta los botones de log in sign in  --}}

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
                    <img src="{{ asset('images/consoles.jpg') }}" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
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
    <div class="container"style="background-color: #404449;display: flex; justify-content: space-between; align-items: flex-start; padding: 20px;">
        <div>
            <h1>Look! Search Action!</h1>
            <p>retro action game deals </p>
         </div>   
        <img src="{{ asset('images/castel.jpg') }}" style="width: 450px; height: auto;">
    </div>


    {{-- Scripts de JS --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>