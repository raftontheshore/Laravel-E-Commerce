<!DOCTYPE html>
<html>
    <head>
        <title>Sobre mi</title>
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    </head>

    <body>
        
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

       

        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Sobre mí</h1>
                    <p><b>Nombre:</b> Juan Pérez</p>
                    <p><b>Edad:</b> 22 años</p>
                    <p><b>De dónde soy:</b> Corrientes, Argentina</p>
                    <p><b>Me gustaría trabajar en:</b> Desarrollo de software</p>
                    <p><b>Expectativas del curso:</b> Aprender Laravel</p>
                    <p><b>Hobbies:</b> Programar y deportes</p>

                    <a href="#" class="btn btn-primary mt-3">Descargar CV</a>
                    <a href="{{ url('/contacto') }}" class="btn btn-secondary mt-3">Contactar</a>
                </div>
            </div>
        </div>
        
    <x-footer />
        
    </body>
</html>