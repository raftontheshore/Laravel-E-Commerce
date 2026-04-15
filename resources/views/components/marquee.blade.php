<style>
    .marquee-strip {
        background: #c0392b;
        border-top: 1px solid #a93226;
        border-bottom: 1px solid #a93226;
        overflow: hidden;
        white-space: nowrap;
        padding: 10px 0;
        position: relative;
        /* Fade edges */
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
        mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
    }

    .marquee-track {
        display: inline-flex;
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
        gap: 10px;
        padding: 0 32px;
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
    }

    .marquee-item .marquee-icon {
        font-size: 13px;
        opacity: 0.85;
    }
</style>

<div class="marquee-strip" aria-label="Información de la tienda" role="marquee">
    <div class="marquee-track">

        {{-- First copy --}}
        <span class="marquee-item">
            <i class="bi bi-controller marquee-icon"></i>
            Catacumbas — Tienda de videojuegos en Corrientes, Argentina
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-truck marquee-icon"></i>
            Envíos a todo el NEA — Corrientes, Chaco, Misiones, Formosa y más
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-tag-fill marquee-icon"></i>
            Ofertas semanales en juegos nuevos y usados
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-geo-alt-fill marquee-icon"></i>
            Retiro en tienda disponible — Corrientes Capital
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-shield-check marquee-icon"></i>
            Compra segura · Productos originales garantizados
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-headset marquee-icon"></i>
            Atención al cliente por WhatsApp y redes sociales
        </span>
        <span class="marquee-dot"></span>

        {{-- Duplicate for seamless loop --}}
        <span class="marquee-item">
            <i class="bi bi-controller marquee-icon"></i>
            Catacumbas — Tienda de videojuegos en Corrientes, Argentina
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-truck marquee-icon"></i>
            Envíos a todo el NEA — Corrientes, Chaco, Misiones, Formosa y más
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-tag-fill marquee-icon"></i>
            Ofertas semanales en juegos nuevos y usados
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-geo-alt-fill marquee-icon"></i>
            Retiro en tienda disponible — Corrientes Capital
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-shield-check marquee-icon"></i>
            Compra segura · Productos originales garantizados
        </span>
        <span class="marquee-dot"></span>

        <span class="marquee-item">
            <i class="bi bi-headset marquee-icon"></i>
            Atención al cliente por WhatsApp y redes sociales
        </span>
        <span class="marquee-dot"></span>

    </div>
</div>