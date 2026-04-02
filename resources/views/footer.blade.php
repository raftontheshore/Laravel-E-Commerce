<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
          "width=device-width, initial-scale=1.0">
    <title>Stylish Footer</title>
  
    <!-- Bootstrap CSS -->
    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet">
  
    <!-- Font Awesome -->
    <link href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
          rel="stylesheet">
  
    <!-- Bootstrap Bundle with Popper -->
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
  
    <!-- Custom CSS -->
    <style>
        body {
            color: white;
        }

        .footer {
            background-color: #198754;
        }

        .footer-content h2 {
            color: #fff;
        }

        .footer-content h5,
        .footer-content p,
        .footer-links a {
            color: #fff;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .footer hr {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <footer class="footer p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2>X</h2>
                </div>
                <div class="col-md-3">
                    <h5>Sobre Nostros</h5>
                    <p>
                       X es una plataforma que ofrece una cuidada selección de consolas retro, videojuegos clásicos y accesorios para los verdaderos amantes de lo vintage. Brinda a jugadores y coleccionistas una experiencia única para revivir la nostalgia de las épocas doradas del gaming, junto con opciones de compra confiables, recomendaciones especializadas y contenido pensado para quienes buscan redescubrir o iniciarse en el mundo de los juegos retro.
                    </p>
                </div>
                <div class="col-md-3">
                    <h5>Contactanos</h5>
                    <ul class="list-unstyled">
                        <li>Email: x.info@example.com</li>
                        <li>Celular: +54 379 4246721</li>
                        <li>Surcursal: 123 Calle Y, Corrientes, Argentina</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Nuestras Redes Sociales</h5>
                    <ul class="list-inline footer-links">
                        <li class="list-inline-item">
                          <a href="#">
                                <i class="fab fa-facebook"></i>
                          </a>
                          </li>
                        <li class="list-inline-item">
                          <a href="#">
                                <i class="fab fa-twitter"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#">
                                <i class="fab fa-instagram"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#">
                                <i class="fab fa-linkedin"></i>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2026 X. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <ul class="list-inline footer-links">
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                               Política De Privacidad
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                                Términos De Servicio
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>