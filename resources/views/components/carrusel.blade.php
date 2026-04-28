{{--
    ============================================================
    COMPONENTE: Carrusel principal (carouselPrincipal)
    ------------------------------------------------------------
    Hero banner de la página de inicio. Muestra 3 slides
    promocionales con imagen de fondo, overlay degradado y
    una caja de texto con título, descripción y CTA.

    Cada slide tiene su propia paleta de color:
      - Slide 1 (El Paraíso del Vicio): rojo  #c60000
      - Slide 2 (Regresa a Kanto):      amarillo #ffd70f
      - Slide 3 (Metal Gear Solid):     rojo claro #ff4444

    Estructura de cada slide:
      <img>              → imagen de fondo
      <div> overlay      → degradado oscuro izq→der
      <div> caption      → caja de texto con título, párrafo y botón
    ============================================================
--}}



<div class="clearfix"></div>
{{-- si quiero que el carrusel ocupe todo el ancho entonces container-fluid p-0 --}}
<div class="container mt-5">
    <div id="carouselPrincipal" class="carousel slide" data-bs-ride="carousel">

        {{-- Indicadores (puntitos de posición).
             data-bs-slide-to conecta cada botón con su slide por índice.
             El primero arranca con class="active" y aria-current="true". --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselPrincipal"
                    data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselPrincipal"
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselPrincipal"
                    data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        {{-- Contenedor de slides. border-radius + overflow: hidden
             redondea las esquinas sin necesidad de aplicarlo a cada imagen. --}}
        <div class="carousel-inner" style="border-radius: 12px; overflow: hidden;">

            {{-- ── SLIDE 1: El Paraíso del Vicio ── --}}
            <div class="carousel-item active" style="position: relative;">

                <img src="{{ asset('images/principal.png') }}"
                     class="d-block w-100 carrusel-img"
                     alt="El Paraíso del Vicio"
                     style="object-fit: cover; min-height: 400px;">

                {{-- Overlay: degradado de izquierda a derecha que oscurece
                     el lado donde está la caja de texto y se desvanece
                     hacia la derecha para no tapar la imagen. --}}
                <div style="
                    position: absolute; inset: 0;
                    background: linear-gradient(
                        to right,
                        rgba(0,0,0,0.45) 0%,
                        rgba(0,0,0,0.20) 60%,
                        rgba(0,0,0,0) 100%
                    );
                "></div>

                {{-- Caja de texto: centrada verticalmente con top+transform.
                     backdrop-filter: blur() da efecto de vidrio esmerilado.
                     border-left en el color del slide identifica visualmente cada promo. --}}
                <div class="carousel-caption text-start caja-texto-movil" style="
                    top: 50%; transform: translateY(-50%);
                    bottom: auto; left: 8%; right: auto;
                    max-width: 650px;
                    background: rgba(0,0,0,0.40);
                    backdrop-filter: blur(4px);
                    border-radius: 12px;
                    padding: 2rem 2.25rem;
                    border-left: 3px solid #c60000;
                ">
                    <h5 class="display-5 fw-bold title-hero" style="
                        color: #ffffff;
                        text-shadow: 0 2px 12px rgba(0,0,0,0.7), 0 1px 3px rgba(0,0,0,0.9);
                    ">EL PARAÍSO DEL VICIO</h5>
                    <p class="fs-6 text-hero" style="
                        color: #fefefe;
                        text-shadow: 0 1px 6px rgba(0,0,0,0.8);
                    ">Consolas, juegos físicos, joyas retro y accesorios. Comprá, vendé y canjeá.</p>
                    <a href="/tienda" class="btn mt-3 fw-bold text-white" style="
                        background-color: #c60000;
                        border: none;
                        padding: 0.6rem 1.8rem;
                        font-size: 1rem;
                        letter-spacing: 0.03em;
                        box-shadow: 0 4px 16px rgba(198,0,0,0.4);
                    ">Explorar Catálogo</a>
                </div>
            </div>

            {{-- ── SLIDE 2: Regresa a Kanto ── --}}
            <div class="carousel-item" style="position: relative;">

                <img src="{{ asset('images/PokemonClassic_Copia2.jpg') }}"
                     class="d-block w-100 carrusel-img"
                     alt="Regresa a Kanto"
                     style="object-fit: cover; min-height: 400px;">

                {{-- Mismo overlay que slide 1; la paleta cambia solo en la caja --}}
                <div style="
                    position: absolute; inset: 0;
                    background: linear-gradient(
                        to right,
                        rgba(0,0,0,0.45) 0%,
                        rgba(0,0,0,0.20) 60%,
                        rgba(0,0,0,0) 100%
                    );
                "></div>

                {{-- Caja con acento amarillo Pokémon.
                     El botón usa texto oscuro (#1a1a1a) porque
                     el fondo amarillo no da suficiente contraste con blanco. --}}
                <div class="carousel-caption text-start caja-texto-movil" style="
                    top: 50%; transform: translateY(-50%);
                    bottom: auto; left: 8%; right: auto;
                    max-width: 650px;
                    background: rgba(0,0,0,0.40);
                    backdrop-filter: blur(4px);
                    border-radius: 12px;
                    padding: 2rem 2.25rem;
                    border-left: 3px solid #ffd70f;
                ">
                    <h5 class="display-5 fw-bold title-hero" style="
                        color: #ffd70f;
                        text-shadow: 0 2px 12px rgba(0,0,0,0.7), 0 1px 3px rgba(0,0,0,0.9);
                    ">Regresa a Kanto</h5>
                    <p class="fs-6 text-hero" style="
                        color: #fefefe;
                        text-shadow: 0 1px 6px rgba(0,0,0,0.8);
                    ">La trilogía que lo empezó todo. Llévate las ediciones Rojo, Azul y Amarillo en un bundle legendario por solo $15.</p>
                    <a href="/construccion" class="btn mt-3 fw-bold" style="
                        background-color: #ffd70f;
                        color: #1a1a1a;
                        border: none;
                        padding: 0.6rem 1.8rem;
                        font-size: 1rem;
                        letter-spacing: 0.03em;
                        box-shadow: 0 4px 16px rgba(255,215,15,0.4);
                    ">Ver Oferta</a>
                </div>
            </div>

            {{-- ── SLIDE 3: Metal Gear Solid ── --}}
            <div class="carousel-item" style="position: relative;">

                <img src="{{ asset('images/mgs.jpg') }}"
                     class="d-block w-100 carrusel-img"
                     alt="Metal Gear Solid disponible"
                     style="object-fit: cover; min-height: 400px;">

                <div style="
                    position: absolute; inset: 0;
                    background: linear-gradient(
                        to right,
                        rgba(0,0,0,0.45) 0%,
                        rgba(0,0,0,0.20) 60%,
                        rgba(0,0,0,0) 100%
                    );
                "></div>

                {{-- Caja con acento rojo claro (#ff4444), ligeramente más
                     brillante que el rojo de marca para contrastar con la
                     imagen oscura de MGS. --}}
                <div class="carousel-caption text-start caja-texto-movil" style="
                    top: 50%; transform: translateY(-50%);
                    bottom: auto; left: 8%; right: auto;
                    max-width: 650px;
                    background: rgba(0,0,0,0.40);
                    backdrop-filter: blur(4px);
                    border-radius: 12px;
                    padding: 2rem 2.25rem;
                    border-left: 3px solid #ff4444;
                ">
                    <h5 class="display-5 fw-bold title-hero" style="
                        color: #ff4444;
                        text-shadow: 0 2px 12px rgba(0,0,0,0.7), 0 1px 3px rgba(0,0,0,0.9);
                    ">YA DISPONIBLE</h5>
                    <p class="fs-6 text-hero" style="
                        color: #fefefe;
                        text-shadow: 0 1px 6px rgba(0,0,0,0.8);
                    ">Metal Gear Solid para la PlayStation 1 ya se encuentra disponible en formato físico.</p>
                    <a href="/construccion" class="btn mt-3 fw-bold text-white" style="
                        background-color: #c60000;
                        border: none;
                        padding: 0.6rem 1.8rem;
                        font-size: 1rem;
                        letter-spacing: 0.03em;
                        box-shadow: 0 4px 16px rgba(198,0,0,0.4);
                    ">Comprar Ahora</a>
                </div>
            </div>

        </div>{{-- /carousel-inner --}}

        {{-- Flechas de navegación manual. width: 5% las achica para que
             no tapen la caja de texto ni compitan con el contenido visual. --}}
        <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselPrincipal" data-bs-slide="prev" style="width: 5%;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>{{-- Solo visible para lectores de pantalla --}}
        </button>
        <button class="carousel-control-next" type="button"
                data-bs-target="#carouselPrincipal" data-bs-slide="next" style="width: 5%;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>

    </div>{{-- /carousel --}}
</div>{{-- /container --}}