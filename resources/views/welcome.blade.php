{{-- ============================================================
    PÁGINA: Home / Inicio
    Página principal del sitio. Combina múltiples secciones:
    1. Navbar + Marquee + Carrusel (componentes)
    2. Banner destacado de Castlevania (hero promocional)
    3. Carrusel de productos destacados (auto-scroll)
    4. Carrusel de consolas (auto-scroll)
    Requiere del controlador: $productos_destacados y $consolas
============================================================ --}}
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

    {{-- con esto cambiamos la fuente de nuestra pag --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    
    <style>

        /* ── Imagen del carrusel hero ────────────────────────────
           Altura responsive:
           - Móvil: 250px → compacto para no ocupar toda la pantalla
           - Desktop (≥768px): 500px → panorámico y llamativo
           object-fit: cover → recorta la imagen para llenar el espacio
           sin deformarla                                              */
        .carrusel-img {
            width: 100%;
            height: 250px !important;
            object-fit: cover !important;
        }
        /* ── Caja de texto sobre el carrusel en móvil ────────────
           Fondo transparente para no tapar la imagen.
           border-radius para suavizar si en algún momento se agrega fondo */
        .caja-texto-movil {
            background: transparent;
            padding: 15px;/* Altura forzada para que no ocupe toda la pantalla en celulares */
            border-radius: 10px;/* Evita que la imagen se deforme al achicarse */
        }

        /* ── Póster de Castlevania en móvil ──────────────────────
           max-width: 260px → frena el crecimiento del póster
           para que no ocupe todo el ancho en pantallas pequeñas    */
        .img-castlevania {
            width: 100%;
            max-width: 260px;/* Freno de crecimiento en móviles */
        }

        /* Cambios cuando la pantalla es grande (PC) */
        @media (min-width: 768px) {
            .carrusel-img {
                height: 500px !important;/* Recupera su altura panorámica */
            }
            .caja-texto-movil {
                background: transparent;
                padding: 0;
            }
            .img-castlevania {
                max-width: 450px;/* Tamaño original del póster en PC */
            }
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">
    {{-- 
        COMPONENTES
    --}}
    <x-navbar />{{-- Barra de navegación principal --}}

    <x-marquee />{{-- Banda de texto desplazándose (avisos/ofertas) --}}

    <x-carrusel/>{{-- Slider/banner principal de imágenes destacadas --}}
    

   {{-- ══════════════════════════════════════════════════════════
        SECCIÓN: Banner promocional de Castlevania
        Hero de dos columnas: texto/badges/CTA (izquierda) + imagen (derecha)
        Fondo: degradado radial oscuro + textura de ladrillos con opacidad
    ══════════════════════════════════════════════════════════ --}}
<div class="container mt-4 p-5 rounded-4 position-relative overflow-hidden" 
     style="background: radial-gradient(circle, #2a2a2a, #1a1a1a); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
    
    {{-- Efecto de niebla/textura de fondo --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background-image: url('{{ asset('images/brick_texture.png') }}'); opacity: 0.1; background-size: cover;"></div>

    {{-- position-relative z-1 → eleva el contenido sobre la textura --}}
    <div class="row align-items-center position-relative z-1">
        
        {{-- COLUMNA IZQUIERDA: badges + título + descripción + CTA
            col-lg-7: ocupa 7/12 en desktop (mayor que la imagen)
            mb-4 mb-lg-0: margen inferior en móvil, eliminado en desktop --}}
        <div class="col-12 col-lg-7 mb-4 mb-lg-0">
            
            {{-- Sección de Tags/Etiquetas --}}
            {{-- 
                - d-flex: alinea los badges en fila horizontal   - gap-2: espacio entre cada badge (~0.5rem)
                 - mb-3: margen inferior para separar de la siguiente sección
            --}}
            <div class="d-flex gap-2 mb-3">
                {{-- 
                    - badge: clase Bootstrap para pastillas de etiqueta
                    - text-uppercase: texto en mayúsculas
                    - fw-bold: negrita
                    - px-3 py-2: padding horizontal y vertical
                    - background #c02a2a: rojo oscuro (urgencia/oferta)
                    - border-radius: 6px → bordes levemente redondeados
                --}}
                <span class="badge text-uppercase fw-bold px-3 py-2" 
                      style="background-color: #c02a2a; color: white; border-radius: 6px; font-size: 0.9rem;">
                    OFERTA
                </span>
                <span class="badge text-uppercase fw-bold px-3 py-2" 
                      style="background-color: #004d99; color: white; border-radius: 6px; font-size: 0.9rem;">
                    PS1
                </span>
            </div>

            {{-- Título Principal con tipografía pixelada
            - text-white: texto blanco sobre fondo oscuro
            - mb-3: margen inferior antes de la descripción
            - font-family 'Press Start 2P': tipografía pixel art (Google Fonts)
            refuerza la estética retro de Catacumbas
            - line-height: 1.2 → interlineado compacto (la fuente pixel es grande)
            - font-size: 3rem → tamaño prominente para héroe
            - text-shadow: 2px 2px 0 #000 → sombra negra sólida, efecto pixel art clásico --}}
            <h1 class="text-white mb-3" 
                style="font-family: 'Press Start 2P', cursive; line-height: 1.2; font-size: 3rem; text-shadow: 2px 2px 0 #000;">
                SINFONIA DE LA NOCHE
            </h1>
            
            {{-- 
                - fs-5: tamaño de fuente nivel 5 (~1.25rem), legible sin competir con el h1
                - text-light: gris claro, menos protagonismo que el título blanco puro
                - mb-4: margen inferior antes del botón CTA
                - max-width: 600px → limita el ancho del párrafo para mejor legibilidad
                (líneas muy largas cansan la vista)
            --}}
            <p class="fs-5 text-light mb-4" style="max-width: 600px;">
                Adéntrate en el castillo de Drácula. Reviví los clásicos de acción y RPG que definieron el género Metroidvania con un 30% de descuento.
            </p>
            
            <a href="/construccion" class="btn btn-lg fw-bold px-5 py-3 text-dark shadow-lg" 
               style="background-color: #ffb300; border: none; border-radius: 8px; transition: transform 0.2s;">
                Ver Oferta
            </a>
        </div> 
        
        {{-- Columna de la imagen 
        - col-12:    ocupa todo el ancho en móvil (apilada bajo el texto)
        - col-lg-5:  ocupa 5/12 del ancho en pantallas grandes
        - text-center: centra la imagen horizontalmente
        - mt-4:      margen superior en móvil (separa del texto al apilarse)
        - mt-lg-0:   elimina ese margen en desktop (ya están lado a lado)--}}
        <div class="col-12 col-lg-5 text-center mt-4 mt-lg-0">
            {{-- - asset('images/castel.jpg'): genera la URL al archivo ubicado en /public/images/castel.jpg
             Clases Bootstrap:
            - img-fluid:   la imagen escala con su contenedor, nunca se desborda
            - rounded-3:   bordes redondeados nivel 3 (~0.5rem)
            - shadow-lg:   sombra grande para efecto de profundidad/elevación
            - mx-auto:     centra horizontalmente (margen auto izquierda y derecha)
            - d-block:     necesario para que mx-auto funcione (img es inline por defecto)
            --}}
            <img src="{{ asset('images/castel.jpg') }}" 
                 class="img-fluid rounded-3 shadow-lg mx-auto d-block" 
                 style="max-height: 450px; transform: rotate(0deg);" 
                 alt="Castlevania Symphony of the Night Art">
        </div>

    </div>
</div>
    </div>

    <br/>
    {{-- ══════════════════════════════════════════════════════════
        SECCIÓN: Carrusel de Productos Destacados
        Fila horizontal con scroll automático (ida y vuelta).
        $productos_destacados: colección pasada desde el controlador.
    ══════════════════════════════════════════════════════════ --}}
    <div class="container mt-5 bm-5">
        {{-- 
        TÍTULO
            - text-white / fw-bold: blanco y negrita
            - mb-4: separa el título del carrusel
            - font-family Oswald: tipografía condensada
            si queremos agrandar usamos font-size: 2.5rem en style
            --}}
        <h3 class="text-white fw-bold mb-4" style="font-family: 'Oswald', sans-serif;">Destacados</h3>

        {{-- 
        CARRUSEL HORIZONTAL
        - flex-nowrap: los items no saltan de línea, permanecen en fila
        - overflow-x-auto: habilita scroll horizontal cuando hay muchos productos
        - pb-3: padding inferior para que la scrollbar no tape las cards
        - id="carrusel-oscuro": identificador para aplicar estilos CSS
          personalizados (ej: scrollbar con tema oscuro)
        - scrollbar-width: thin → scrollbar más delgada (Firefox)
          en Chrome se estiliza vía CSS ::-webkit-scrollbar
     --}}
        <div class="row flex-nowrap overflow-x-auto pb-3" id="carrusel-oscuro" style="scrollbar-width: thin;">
            {{-- aca llama a carta producto
            LOOP: itera sobre $productos_destacados
             --}}
            @foreach($productos_destacados as $producto)
            {{-- col-10: 1 card visible en móvil + borde de la siguiente
                col-md-3 col-lg-3: 4 cards visibles en tablet/desktop    --}}
            <div class="col-10 col-md-3 col-lg-3 mb-3">
                {{-- 
                    Componente reutilizable de tarjeta de producto.
                    Recibe el objeto $producto y renderiza imagen, nombre, precio, badges, etc.
                    Archivo: resources/views/components/carta-producto.blade.php
                --}}
                <x-carta-producto :producto="$producto" />
            </div>  
            @endforeach 
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════
        SECCIÓN: Carrusel de Consolas
        Igual al de destacados pero filtra por $consolas
        e incluye link "Ver más" → /tienda/consola
        La clase carrusel-tema-oscuro es la que selecciona el JS
        para aplicar el scroll automático.
    ══════════════════════════════════════════════════════════ --}}

<div class="container mt-5 bm-5">
    {{-- 
        ENCABEZADO DE SECCIÓN
        - justify-content-between: separa el título (izquierda) y el link (derecha)
        - align-items-end: alinea ambos elementos al fondo
        - mb-4: margen inferior antes del carrusel
    --}}
    <div class="d-flex justify-content-between align-items-end mb-4">

        {{-- TÍTULO de la sección, estilo Oswald, sin margen --}}
        <h3 class="text-white fw-bold m-0" style="font-family: 'Oswald', sans-serif;">
            Consolas
        </h3>

        {{-- 
            LINK "Ver más"
            - Redirige a /tienda/consola
            - Cambia de color gris (#aaa) a blanco al hacer hover (via onmouseover/onmouseout)
            - Muestra una flecha a la derecha usando Bootstrap Icons (bi-arrow-right)
        --}}
        <a href="/tienda/consola" 
           class="text-decoration-none d-flex align-items-center" 
           style="color: #aaa; font-size: 0.95rem; transition: 0.3s;"
           onmouseover="this.style.color='#ffffff'" 
           onmouseout="this.style.color='#aaa'">
            Ver más <i class="bi bi-arrow-right ms-2"></i>
        </a>

    </div>

    {{-- 
        CARRUSEL HORIZONTAL
        - flex-nowrap: evita que las cards salten a una nueva línea
        - overflow-x-auto: habilita el scroll horizontal cuando hay muchos productos
        - pb-3: padding inferior para que no se corte la sombra/scroll
        - carrusel-tema-oscuro: clase CSS 
    --}}
    <div class="row flex-nowrap overflow-x-auto pb-3 carrusel-tema-oscuro">

            {{-- 
                LOOP BLADE: itera sobre la colección $consolas
                pasada desde el controlador a la vista.
                Por cada consola renderiza una card de producto.

                Anchos responsive de cada columna:
                - col-10: en móvil ocupa el 83% del ancho (se ve 1 card y un poco de la siguiente)
                - col-md-3: en tablet/desktop ocupa 25% (4 cards visibles por fila)
                - col-lg-3: igual en pantallas grandes
                - mb-3: margen inferior entre filas si llegaran a saltar
            --}}
            @foreach($consolas as $consola)
                <div class="col-10 col-md-3 col-lg-3 mb-3">

                    {{-- 
                        COMPONENTE BLADE: <x-carta-producto>
                        Componente reutilizable que recibe un producto y renderiza
                        su card (imagen, nombre, precio, etc.)
                        :producto="$consola" → pasa el objeto consola como prop
                    --}}
                    <x-carta-producto :producto="$consola" />

                </div>
            @endforeach

        </div>
    </div>

    {{-- SCRIPT PARA QUE LOS CARRUSELES SE MUEVAN SOLOS (EFECTO VA Y VIENE) --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                //Selecciona TODOS los elementos del DOM que tengan la clase CSS 'carrusel-tema-oscuro'
                // y los almacena en la variable 'carruseles'.
                const carruseles = document.querySelectorAll('.carrusel-tema-oscuro');

                carruseles.forEach(carrusel => {
                    let intervalo;
                    const velocidad = 1; // Píxeles por paso
                    const tiempo = 30;   // Milisegundos entre paso
                    let direccion = 1;   // 1 va a la derecha, -1 va a la izquierda

                    function iniciarScroll() {
                        intervalo = setInterval(() => {
                            
                            // Si choca contra el final derecho, cambia la dirección a la izquierda (-1)
                            if (carrusel.scrollLeft + carrusel.clientWidth >= carrusel.scrollWidth - 1) {
                                direccion = -1;
                            } 
                            // Si choca contra el principio izquierdo, cambia la dirección a la derecha (1)
                            else if (carrusel.scrollLeft <= 0) {
                                direccion = 1;
                            }

                            // Movemos el carrusel multiplicando por la dirección
                            carrusel.scrollLeft += (velocidad * direccion);

                        }, tiempo);
                    }

                    function detenerScroll() {
                        clearInterval(intervalo);
                    }

                    // Iniciamos el movimiento
                    iniciarScroll();

                    // Pausamos al pasar el mouse o tocar la pantalla
                    carrusel.addEventListener('mouseenter', detenerScroll);
                    carrusel.addEventListener('mouseleave', iniciarScroll);
                    carrusel.addEventListener('touchstart', detenerScroll);
                    carrusel.addEventListener('touchend', iniciarScroll);
                });
            });
        </script>
    <x-volverArriba />
    <x-footer />
</body>
</html>