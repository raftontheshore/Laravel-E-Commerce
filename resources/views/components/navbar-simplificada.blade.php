{{--
    ============================================================
    COMPONENTE: Navbar simplificada de autenticación (catacumbas-nav-auth)
    ------------------------------------------------------------
    Versión reducida de la navbar principal, usada en las páginas
    de login y registro donde no se necesita la navegación completa.

    A diferencia de la navbar principal, esta no tiene logo, links
    ni botones de auth — solo un enlace para volver al inicio,
    manteniendo al usuario orientado sin distraerlo del formulario.
    ============================================================
--}}

<style>
    /* --- Barra de navegación simplificada ---
       Mismo fondo y borde que la navbar principal para consistencia visual.
       position: relative es necesario para que el back-link con
       position: absolute se posicione respecto a esta barra y no a la página.
       min-height: 57px iguala la altura de la navbar principal. */
    .catacumbas-nav-auth {
        background-color: #0d0d0d;
        border-bottom: 1px solid #2a2a2a;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 10px 24px;
        position: relative;
        min-height: 57px;
    }

    /* --- Enlace de regreso ---
       Anclado a la izquierda con position: absolute para que
       futuras adiciones al centro o derecha no desplacen este link.
       Arranca en gris oscuro (#555) y aclara en hover. */
    .catacumbas-nav-auth .back-link {
        position: absolute;
        left: 24px;
        font-size: 13px;
        color: #555;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: color 0.15s;
    }
    .catacumbas-nav-auth .back-link:hover { color: #aaa; }
    .catacumbas-nav-auth .back-link i { font-size: 12px; }
</style>

{{-- Navbar mínima: solo el link de regreso, sin logo ni menú.
     Mantiene la misma altura que la navbar principal (min-height: 57px)
     para que el layout de la página no cambie entre vistas. --}}
<nav class="catacumbas-nav-auth">
    <a href="/" class="back-link">
        <i class="bi bi-arrow-left"></i> Volver al inicio
    </a>
</nav>