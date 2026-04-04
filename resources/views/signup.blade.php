<!DOCTYPE html>
<html>
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
     
     <body class="text-white fondo-catacumbas">
        {{-- NaveBar --}}
        <nav class="navbar navbar-expand-lg navbar-dark py-2 catacumbas-nav">
            <div class="container-fluid">
                
                <a class="navbar-brand" href="/">
                    {{-- aca agregamo el nombre y la imag>en de la nav bar --}}
                    <img src="{{ asset('images/favicon.png') }}" alt="logo" height="42" class="me-2">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                
            </div>
        </nav>

        <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Creá tu cuenta</h2>

                        <form>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1cg">Nombre</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example3cg">Tu Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example4cg">Contraseña</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example4cdg">Repetir Contraseña</label>
                            </div>

                            <div class="form-check d-flex justify-content-center mb-5">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                            <label class="form-check-label" for="form2Example3g">
                                Acepto los <a href="#!" class="text-body"><u>Términos y Condiciones</u></a>
                            </label>
                            </div>

                            <div class="d-flex justify-content-center">
                            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-catacumbas btn-lg px-5" type="submit">Registrarse</button>
                            </div>

                            <p class="text-center text-muted mt-5 mb-0">¿Ya posees una cuenta? <a href="/login" class="fw-bold text-body"><u>Login here</u></a></p>

                        </form>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>

             {{-- Scripts de JS --}}
             <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            {{-- el footer es la sección que se encuentra en la parte más baja de una página web, --}}
          <x-footer />
    </body>

</html>
