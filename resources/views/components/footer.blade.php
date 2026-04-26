{{--
    ============================================================
    COMPONENTE: Footer (cat-footer)
    ------------------------------------------------------------
    Pie de página global del sitio. Incluye:
      - Identidad de marca (logo + nombre + tagline)
      - Descripción breve de la tienda
      - Información de contacto
      - Links a redes sociales
      - Barra inferior con copyright y links legales
    ============================================================
--}}

{{-- Esta parte la dejamos por lo iconos de redes sociales --}}

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
    /* --- Contenedor principal del footer ---
       Fondo casi negro con borde superior.
       margin-top: 4rem garantiza respiración visual con la página. */
    .cat-footer {
        background-color: #0d0d0d;
        border-top: 1px solid #2a2a2a;
        color: #888;
        font-size: 13px;
        line-height: 1.7;
        margin-top: 4rem;
    }

    /* --- Bloque de marca ---
       Logo + nombre en la misma línea con gap. El tagline va
       debajo con un padding-left que lo alinea visualmente
       con el texto del nombre (42px = ancho del logo + gap). */
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
    /* Nombre en fuente retro personalizada, todo en mayúsculas y rojo de marca */
    .cat-footer .footer-brand-name {
        font-family: 'SystemFont', monospace;
        font-size: 18px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #c0392b;
        line-height: 1;
    }
    /* Subtítulo muy discreto, alineado debajo del nombre (no del logo) */
    .cat-footer .footer-tagline {
        font-size: 10px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1.8px;
        margin-top: 2px;
        padding-left: 42px; /* 32px logo + 10px gap */
    }

    /* --- Títulos de sección ---
       Pequeños, en mayúsculas y blancos para contrastar con
       el texto de contenido que es gris oscuro (#555). */
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

    /* --- Ítems de contacto ---
       Flex para alinear el ícono con el texto. flex-shrink: 0
       evita que el ícono se comprima si el texto es largo. */
    .cat-footer .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 7px;
        color: #555;
    }
    /* Íconos de contacto en rojo de marca, con margin-top para
       alinearlos con la primera línea del texto */
    .cat-footer .contact-item i {
        color: #c0392b;
        font-size: 12px;
        margin-top: 3px;
        flex-shrink: 0;
    }

    /* --- Botones de redes sociales ---
       Cuadrados redondeados con fondo oscuro. En hover se pintan
       del rojo de marca (fondo + borde + ícono). */
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

    /* --- Barra inferior (copyright + links legales) ---
       flex con justify-content-between para separar el copyright
       a la izquierda y los links a la derecha. flex-wrap permite
       que en móvil se apilen verticalmente. */
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

        {{-- Grilla de 4 columnas. justify-content-between distribuye
             el espacio sobrante entre columnas en pantallas grandes. --}}
        <div class="row g-4 justify-content-between">

            {{-- COLUMNA 1: Identidad de marca
                 col-md-4: ocupa la mitad en tablet (iPad)
                 col-lg-3: ocupa un cuarto en desktop --}}
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer-brand">
                    <img src="{{ asset('images/favicon.png') }}" alt="Catacumbas logo">
                    <span class="footer-brand-name">Catacumbas</span>
                </div>
                <div class="footer-tagline">Retro gaming store</div>
            </div>

            {{-- COLUMNA 2: Descripción de la tienda --}}
            <div class="col-12 col-md-3">
                <h6>Sobre Nosotros</h6>
                <p>
                    Catacumbas es una plataforma especializada en consolas, videojuegos clásicos y accesorios retro.
                    Diseñada para jugadores y coleccionistas, ofrecemos compras seguras y recomendaciones expertas.
                </p>
            </div>

            {{-- COLUMNA 3: Información de contacto
                 Cada ítem usa .contact-item para alinear ícono + texto --}}
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

            {{-- COLUMNA 4: Links a redes sociales
                 target="_blank" abre en pestaña nueva.
                 aria-label es importante para accesibilidad (lectores de pantalla).
                 para mover los iconos usamos justify-content-end --}}
            <div class="col-12 col-md-3 ">
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

        {{-- Barra inferior: copyright dinámico con date('Y') para no
             tener que actualizarlo manualmente cada año + links legales --}}
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Catacumbas. Todos los derechos reservados.</span>
            <div class="d-flex gap-3">
                <a href="/privacidad">Política de Privacidad</a>
                <a href="/terminos">Términos De Servicio</a>
            </div>
        </div>

    </div>
</footer>