{{--
    ============================================================
    COMPONENTE: Marquee / Banda de anuncios (marquee-strip)
    ------------------------------------------------------------
    Franja roja con texto desplazándose en loop continuo.
    Muestra información clave de la tienda (envíos, pagos, etc.)
    Se pausa al hacer hover para permitir leer el contenido.

    Técnica del loop: el contenido se duplica exactamente dentro
    del mismo track. La animación mueve el track un -50% (es decir,
    el largo de una sola copia), creando la ilusión de scroll infinito
    sin saltos visibles.
    ============================================================
--}}

{{-- Polyfill para emojis de banderas en Windows/navegadores que no los soportan nativamente.
     Inyecta la fuente "Twemoji Country Flags" para reemplazar los caracteres de bandera. --}}
<script type="module">
    import { polyfillCountryFlagEmojis } from "https://cdn.skypack.dev/country-flag-emoji-polyfill";
    polyfillCountryFlagEmojis();
</script>

<style>
    /* --- Contenedor externo del marquee ---
       overflow: hidden recorta el texto que sale de los bordes.
       mask-image aplica un degradado transparente en los extremos
       para que el texto "aparezca" y "desaparezca" suavemente
       en lugar de cortarse abruptamente. */
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

    /* --- Track: la pista que se mueve ---
       inline-flex con align-items: center alinea verticalmente
       los dots con el texto sin necesidad de trucos adicionales. */
    .marquee-track {
        display: inline-flex;
        align-items: center;
        animation: marquee-scroll 38s linear infinite;
    }

    /* Pausa la animación al hacer hover sobre la franja,
       permitiendo leer el mensaje completo cómodamente. */
    .marquee-strip:hover .marquee-track {
        animation-play-state: paused;
    }

    /* La animación desplaza el track exactamente un -50% de su ancho total.
       Como el contenido está duplicado, ese 50% equivale a una copia completa,
       logrando el efecto de loop infinito sin salto visual al reiniciar. */
    @keyframes marquee-scroll {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    /* --- Ítem individual del marquee ---
       font-family: "Twemoji Country Flags" va primero para que el polyfill
       reemplace los caracteres de bandera; el resto del texto usa monospace. */
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
        font-family: "Twemoji Country Flags", monospace;
    }

    /* --- Separador visual entre ítems ---
       Punto circular semi-transparente. flex-shrink: 0 evita que
       se comprima si el espacio es ajustado. */
    .marquee-dot {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        flex-shrink: 0;
        align-self: center;
    }
</style>

<div class="marquee-strip" aria-label="Información de la tienda" role="marquee">
    <div class="marquee-track">

        {{-- === PRIMERA COPIA del contenido === --}}
        <span class="marquee-item">🚚 Envíos a todo el NEA — Corrientes, Chaco, Misiones, Formosa y más</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🇦🇷 Catacumbas — Tienda de videojuegos · Corrientes, Argentina</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🏷️ Ofertas semanales en juegos nuevos y usados</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🇦🇷 Retiro en tienda disponible — Corrientes Capital</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🛡️ Compra segura · Productos originales garantizados</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">💬 Atención al cliente por WhatsApp y redes sociales</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">💳 Pagá en cuotas con tarjeta · MercadoPago</span>
        <span class="marquee-dot"></span>

        {{-- === DUPLICADO para el loop ===
             Copia idéntica a la anterior. La animación translateX(-50%)
             lleva el track exactamente hasta el inicio de este bloque,
             momento en que reinicia en 0% sin que se note el corte. --}}
        <span class="marquee-item">🚚 Envíos a todo el NEA — Corrientes, Chaco, Misiones, Formosa y más</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🇦🇷 Catacumbas — Tienda de videojuegos · Corrientes, Argentina</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🏷️ Ofertas semanales en juegos nuevos y usados</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🇦🇷 Retiro en tienda disponible — Corrientes Capital</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">🛡️ Compra segura · Productos originales garantizados</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">💬 Atención al cliente por WhatsApp y redes sociales</span>
        <span class="marquee-dot"></span>
        <span class="marquee-item">💳 Pagá en cuotas con tarjeta · MercadoPago</span>
        <span class="marquee-dot"></span>

    </div>
</div>