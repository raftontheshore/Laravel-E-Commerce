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
    @font-face {
        font-family: 'SystemFont';
        src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
        font-display: swap;
    }

    .cat-footer {
        background-color: #0d0d0d;
        border-top: 1px solid #2a2a2a;
        color: #888;
        font-size: 13px;
        line-height: 1.7;
        margin-top: 4rem;
    }

    /* Brand */
    .cat-footer .footer-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 6px;
    }
    .cat-footer .footer-brand img {
        width: 32px;
        height: 32px;
        object-fit: contain;
    }
    .cat-footer .footer-brand-name {
        font-family: 'SystemFont', monospace;
        font-size: 18px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #c0392b;
        line-height: 1;
    }
    .cat-footer .footer-tagline {
        font-size: 10px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1.8px;
        margin-top: 2px;
        padding-left: 42px;
    }

    .cat-footer h6 {
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.4px;
        margin-bottom: 14px;
    }

    .cat-footer p,
    .cat-footer li {
        color: #555;
        font-size: 13px;
    }

    .cat-footer .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 7px;
        color: #555;
    }
    .cat-footer .contact-item i {
        color: #c0392b;
        font-size: 12px;
        margin-top: 3px;
        flex-shrink: 0;
    }

    .cat-footer .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: #161616;
        border: 1px solid #222;
        color: #555;
        font-size: 14px;
        text-decoration: none;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
    }
    .cat-footer .social-link:hover {
        background: #c0392b;
        border-color: #c0392b;
        color: #fff;
    }

    .cat-footer .footer-bottom {
        border-top: 1px solid #1a1a1a;
        padding-top: 18px;
        margin-top: 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    .cat-footer .footer-bottom a {
        color: #333;
        text-decoration: none;
        font-size: 12px;
        transition: color 0.15s;
    }
    .cat-footer .footer-bottom a:hover { color: #aaa; }
    .cat-footer .footer-bottom span { color: #2a2a2a; font-size: 12px; }
</style>

<footer class="cat-footer">
    <div class="container py-5">
        {{-- Le agregamos justify-content-between para que en PC se separen elegante --}}
        <div class="row g-4 justify-content-between">

            {{-- Brand --}}
            {{-- CAMBIO: col-md-4 para iPad (ocupa la mitad), col-lg-3 para PC (ocupa un cuarto) --}}
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer-brand">
                    <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas logo">
                    <span class="footer-brand-name">Catacumbas</span>
                </div>
                <div class="footer-tagline">Retro gaming store</div>
            </div>

            {{-- About --}}
            <div class="col-12 col-md-3">
                <h6>Sobre Nosotros</h6>
                <p>
                    Catacumbas es una plataforma especializada en consolas, videojuegos clásicos y accesorios retro.
                    Diseñada para jugadores y coleccionistas, ofrecemos compras seguras y recomendaciones expertas.
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
                    <a href="https://www.facebook.com/" class="social-link" aria-label="Facebook" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://x.com/home" class="social-link" aria-label="X" target="_blank">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://www.instagram.com/" class="social-link" aria-label="Instagram" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Catacumbas. Todos los derechos reservados.</span>
            <div class="d-flex gap-3">
                <a href="/privacidad">Política de Privacidad</a>
                <a href="/terminos">Términos De Servicio</a>
            </div>
        </div>
    </div>
</footer>