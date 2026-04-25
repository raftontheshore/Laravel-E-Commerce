{{--
    ============================================================
    COMPONENTE: Botón "Volver arriba" (#btn-back-to-top)
    ------------------------------------------------------------
    Botón flotante fijo en la esquina inferior derecha.
    Aparece recién cuando el usuario bajó más de 100px,
    y al clickearlo sube suavemente al inicio de la página.

    Tamaños según dispositivo:
      - Móvil (< 768px):           40×40px, a 15px del borde
      - Tablet (768px – 1199px):   50×50px, a 25px del borde
      - Desktop (≥ 1200px):        40×40px, a 15px del borde
    ============================================================
--}}

<style>
    /* Scroll suave nativo del navegador al usar anclas o scrollTop = 0 */
    html {
        scroll-behavior: smooth;
    }

    /* --- Botón flotante base ---
       position: fixed lo ancla a la pantalla sin importar el scroll.
       display: none lo oculta al cargar; el JS lo cambia a "flex"
       cuando el usuario baja más de 100px. z-index alto para que
       quede siempre por encima de cualquier otro elemento. */
    #btn-back-to-top {
        position: fixed;
        bottom: 15px;
        right: 15px;
        display: none;
        z-index: 99999;
        width: 40px;
        height: 40px;
        padding: 0;
        justify-content: center;  /* Centra el ícono horizontalmente */
        align-items: center;      /* Centra el ícono verticalmente */
        background-color: #c0392b !important;
        color: white !important;
        border: 1px solid #8a1f1f !important;
        transition: 0.3s;
    }
    /* Aclara el fondo y agrega un halo rojo en hover */
    #btn-back-to-top:hover {
        background-color: #e63946 !important;
        box-shadow: 0 0 10px rgba(192, 42, 42, 0.5);
    }

    /* --- Tamaño ampliado para tablet (768px – 1199px) ---
       En desktop el botón es más chico porque hay más espacio
       y no interfiere con el contenido; en tablet se agranda
       para ser más fácil de tocar con el dedo. */
    @media (min-width: 768px) and (max-width: 1199px) {
        #btn-back-to-top {
            width: 50px;
            height: 50px;
            bottom: 25px;
            right: 25px;
        }
    }

    /* --- Prevención de scroll horizontal ---
       overflow-x: hidden corta cualquier elemento que se desborde
       horizontalmente (carruseles, marquees, etc.) evitando la
       barra de scroll lateral en móvil. */
    html, body {
        width: 100%;
        max-width: 100vw;
        overflow-x: hidden;
    }
</style>

{{-- Botón circular con ícono de flecha hacia arriba.
     title="Volver arriba" aparece como tooltip en desktop. --}}
<button type="button" class="btn rounded-circle shadow-lg" id="btn-back-to-top" title="Volver arriba">
    <i class="bi bi-chevron-up"></i>
</button>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let mybutton = document.getElementById("btn-back-to-top");

        // Muestra el botón al bajar más de 100px y lo oculta al volver arriba.
        // Se chequean tanto body como documentElement para cubrir
        // distintos navegadores (Safari usa body, el resto documentElement).
        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "flex"; // flex para que los align/justify funcionen
            } else {
                mybutton.style.display = "none";
            }
        });

        // Al hacer clic, sube al inicio de la página.
        // Se setean los dos por compatibilidad entre navegadores.
        mybutton.addEventListener("click", function() {
            document.body.scrollTop = 0;            // Safari
            document.documentElement.scrollTop = 0; // Chrome, Firefox, IE, Opera
        });
    });
</script>