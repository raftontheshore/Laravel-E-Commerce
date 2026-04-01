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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Retro</title>
</head>

    <body class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #404449;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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