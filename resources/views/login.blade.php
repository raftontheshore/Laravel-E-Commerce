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
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        {{-- iconos de google y eso --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>

            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="/">
                {{-- aca agregamo el nombre y la imag>en de la nav bar --}}
                <img src="{{ asset('images/favicon.png') }}" alt="logo" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            
        </div>
    </nav>

            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" data-bs-theme="dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Inicia sesión</h2>
                            <p class="text-white-50 mb-5">Porfavor ingrese su Correo y Contraseña!</p>

                            <div class="form-floating mb-4 text-start">
                                <input type="emal" class="form-control bg-dark text-white border-secondary" id="typeEmailX" placeholder="email">
                                <label for="typeEmailX" class="text-white-50">Email</label>
                            </div>

                            <div class="form-floating mb-4 text-start">
                                <input type="password" class="form-control bg-dark text-white border-secondary" id="typePasswordX" placeholder="Password">
                                <label for="typePasswordX" class="text-white-50">Password</label>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">¿Olvidaste tu Contraseña?</a></p>

                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                            </div>

                            <div>
                            <p class="mb-0">¿No Tienes una cuenta? <a href="#!" class="text-white-50 fw-bold">Registrarse</a>
                            </p>
                            </div>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </section>
            
            {{-- Scripts de JS --}}
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>