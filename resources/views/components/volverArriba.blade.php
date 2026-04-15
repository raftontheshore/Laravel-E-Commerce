<style>
            /* Efecto suave general para toda la página */
        html {
            scroll-behavior: smooth;
        }

        /* Diseño base del botón (Ajustado para móvil) */
        #btn-back-to-top {
            position: fixed;
            bottom: 15px; /* Pegadito al borde */
            right: 15px;
            display: none; /* Arranca oculto */
            z-index: 99999;
            width: 40px;
            height: 40px;
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

/* Restringido hacia arriba para pc y otros dispositivos */
@media (min-width: 768px) and (max-width: 1199px) {
    #btn-back-to-top {
        width: 50px;
        height: 50px;
        bottom: 25px;
        right: 25px;
    }
}

        html, body {
            width: 100%;
            max-width: 100vw;
            overflow-x: hidden; /* Esto es clave: corta lo que sobra a los costados */
        }
</style>

<button type="button" class="btn rounded-circle shadow-lg" id="btn-back-to-top" title="Volver arriba">
    <i class="bi bi-chevron-up"></i>
</button>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let mybutton = document.getElementById("btn-back-to-top");

        // Mostrar u ocultar al scrollear
        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "flex";
            } else {
                mybutton.style.display = "none";
            }
        });

        // Subir al hacer clic
        mybutton.addEventListener("click", function() {
            document.body.scrollTop = 0; // Para Safari
            document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE, Opera
        });
    });
</script>