<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explorar - Catacumbas</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    .cat-footer {
        background-color: #0d0d0d;
        border-top: 1px solid #2a2a2a;
        color: #888;
        font-size: 13px;
        line-height: 1.7;
        margin-top: 4rem;
    }

    .cat-footer .footer-brand {
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.5px;
    }
    .cat-footer .footer-brand span {
        color: #c0392b;
    }
    .cat-footer .footer-tagline {
        font-size: 11px;
        color: #444;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-top: 4px;
    }

    .cat-footer h6 {
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 14px;
    }

    .cat-footer p,
    .cat-footer li {
        color: #666;
        font-size: 13px;
    }

    .cat-footer .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 7px;
        color: #666;
    }
    .cat-footer .contact-item i {
        color: #c0392b;
        font-size: 12px;
        margin-top: 3px;
        flex-shrink: 0;
    }

    /* Social icons */
    .cat-footer .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: #161616;
        border: 1px solid #222;
        color: #666;
        font-size: 14px;
        text-decoration: none;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
    }
    .cat-footer .social-link:hover {
        background: #c0392b;
        border-color: #c0392b;
        color: #fff;
    }

    /* Bottom bar */
    .cat-footer .footer-bottom {
        border-top: 1px solid #1e1e1e;
        padding-top: 18px;
        margin-top: 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    .cat-footer .footer-bottom a {
        color: #444;
        text-decoration: none;
        font-size: 12px;
        transition: color 0.15s;
    }
    .cat-footer .footer-bottom a:hover { color: #aaa; }
    .cat-footer .footer-bottom span { color: #333; font-size: 12px; }
</style>

<footer class="cat-footer">
    <div class="container py-5">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-12 col-md-3">
                <div class="footer-brand">Catacumbas</div>
                <div class="footer-tagline">Retro gaming store</div>
            </div>

            {{-- About --}}
            <div class="col-12 col-md-3">
                <h6>Sobre Nosotros</h6>
                <p>
                    Catacumbas es una plataforma especializada en consolas, videojuegos clásicos y accesorios retro.
                    Diseñada para jugadores y coleccionistas, combina compras seguras y recomendaciones expertas.
                </p>
            </div>

            {{-- Contact --}}
            <div class="col-12 col-md-3">
                <h6>Contactanos</h6>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@catacumbas.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+54 379 4246721</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>123 Calle Y, Corrientes, Argentina</span>
                </div>
            </div>

            {{-- Social --}}
            <div class="col-12 col-md-3">
                <h6>Redes Sociales</h6>
                <div class="d-flex gap-2">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Catacumbas. Todos los derechos reservados.</span>
            <div class="d-flex gap-3">
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos de Servicio</a>
            </div>
        </div>
    </div>
</footer>