{{-- resources/views/components/btn-arriba.blade.php --}}
<style>
    /* ── Botón Volver Arriba ── */
    #btn-back-to-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: none; /* Arranca oculto */
        z-index: 9999;
        width: 45px;
        height: 45px;
        padding: 0;
        justify-content: center;
        align-items: center;
        background-color: #c0392b !important;
        color: white !important;
        border: 1px solid #8a1f1f !important;
        transition: 0.3s;
    }
    
    #btn-back-to-top:hover {
        background-color: #e63946 !important;
        box-shadow: 0 0 10px rgba(192, 42, 42, 0.5);
    }

    /* Efecto suave general */
    html {
        scroll-behavior: smooth;
    }
</style>

<button type="button" class="btn rounded-circle shadow-lg" id="btn-back-to-top" title="Volver arriba">
    <i class="bi bi-chevron-up"></i>
</button>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let mybutton = document.getElementById("btn-back-to-top");

        // Cuando el usuario hace scroll hacia abajo 100px, muestra el botón
        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "flex";
            } else {
                mybutton.style.display = "none";
            }
        });

        // Cuando hacen clic, sube
        mybutton.addEventListener("click", function() {
            document.body.scrollTop = 0; // Safari
            document.documentElement.scrollTop = 0; // Chrome, Firefox, IE, Opera
        });
    });
</script>