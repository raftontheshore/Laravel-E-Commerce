<div class="clearfix"></div>
<div class="container mt-5">
    <div id="carouselPrincipal" class="carousel slide" data-bs-ride="carousel">
        {{-- ── Indicadores (puntitos) ───────────────────────────────── --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselPrincipal"
                    data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselPrincipal"
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselPrincipal"
                    data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        {{-- ── Slides ──────────────────────────────────────────────── --}}
        <div class="carousel-inner" style="border-radius: 12px; overflow: hidden;">
            {{-- SLIDE 1 – El Paraíso del Vicio --}}
            <div class="carousel-item active" style="position: relative;">
                <img src="{{ asset('images/principal.png') }}"
                     class="d-block w-100 carrusel-img"
                     alt="El Paraíso del Vicio"
                     style="object-fit: cover; min-height: 400px;">
                {{-- Overlay degradado izq → der más suave --}}
                <div style="
                    position: absolute; inset: 0;
                    background: linear-gradient(
                        to right,
                        rgba(0,0,0,0.45) 0%,
                        rgba(0,0,0,0.20) 60%,
                        rgba(0,0,0,0) 100%
                    );
                "></div>
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
            {{-- SLIDE 2 – Regresa a Kanto --}}
            <div class="carousel-item" style="position: relative;">
                <img src="{{ asset('images/PokemonClassic_Copia2.jpg') }}"
                     class="d-block w-100 carrusel-img"
                     alt="Regresa a Kanto"
                     style="object-fit: cover; min-height: 400px;">
                {{-- Overlay degradado izq → der más suave --}}
                <div style="
                    position: absolute; inset: 0;
                    background: linear-gradient(
                        to right,
                        rgba(0,0,0,0.45) 0%,
                        rgba(0,0,0,0.20) 60%,
                        rgba(0,0,0,0) 100%
                    );
                "></div>
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
            {{-- SLIDE 3 – Metal Gear Solid --}}
            <div class="carousel-item" style="position: relative;">
                <img src="{{ asset('images/mgs.jpg') }}"
                     class="d-block w-100 carrusel-img"
                     alt="Metal Gear Solid disponible"
                     style="object-fit: cover; min-height: 400px;">
                {{-- Overlay degradado izq → der más suave --}}
                <div style="
                    position: absolute; inset: 0;
                    background: linear-gradient(
                        to right,
                        rgba(0,0,0,0.45) 0%,
                        rgba(0,0,0,0.20) 60%,
                        rgba(0,0,0,0) 100%
                    );
                "></div>
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
        {{-- ── Flechas de navegación ajustadas a los bordes ─────────── --}}
        <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselPrincipal" data-bs-slide="prev" style="width: 5%;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button"
                data-bs-target="#carouselPrincipal" data-bs-slide="next" style="width: 5%;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>{{-- /carousel --}}
</div>{{-- /container --}}