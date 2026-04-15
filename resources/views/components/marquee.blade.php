<style>
    .marquee-strip {
        background: #c0392b;
        border-top: 1px solid #a93226;
        border-bottom: 1px solid #a93226;
        overflow: hidden;
        white-space: nowrap;
        padding: 10px 0;
        position: relative;
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
        mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
    }

    .marquee-track {
        display: inline-flex;
        align-items: center; /* FIX: esto centra los dots con el texto */
        animation: marquee-scroll 38s linear infinite;
    }

    .marquee-strip:hover .marquee-track {
        animation-play-state: paused;
    }

    @keyframes marquee-scroll {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .marquee-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0 28px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #fff;
        font-family: monospace;
    }

    .marquee-dot {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        flex-shrink: 0;
        /* FIX: fuerza el centrado vertical por si acaso */
        align-self: center;
    }
</style>

<div class="marquee-strip" aria-label="Información de la tienda" role="marquee">
    <div class="marquee-track">

        {{-- === PRIMERA COPIA === --}}
        <span class="marquee-item">🚚 Envíos a todo el NEA — Corrientes, Chaco, Misiones, Formosa y más</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🇦🇷 Catacumbas — Tienda de videojuegos · Corrientes, Argentina</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🏷️ Ofertas semanales en juegos nuevos y usados</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🇦🇷  Retiro en tienda disponible — Corrientes Capital</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🛡️ Compra segura · Productos originales garantizados</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">💬 Atención al cliente por WhatsApp y redes sociales</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">💳 Pagá en cuotas con tarjeta · MercadoPago</span>
        <span class="marquee-dot"></span>

        {{-- === DUPLICADO PARA EL LOOP === --}}
        <span class="marquee-item">🚚 Envíos a todo el NEA — Corrientes, Chaco, Misiones, Formosa y más</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🇦🇷 Catacumbas — Tienda de videojuegos · Corrientes, Argentina</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🏷️ Ofertas semanales en juegos nuevos y usados</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🇦🇷  Retiro en tienda disponible — Corrientes Capital</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">🛡️ Compra segura · Productos originales garantizados</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">💬 Atención al cliente por WhatsApp y redes sociales</span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">💳 Pagá en cuotas con tarjeta · MercadoPago</span>
        <span class="marquee-dot"></span>

    </div>
</div>