<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explorar - Catacumbas</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Oculta la barra de scroll pero mantiene la funcionalidad de deslizar */
        .slider-horizontal::-webkit-scrollbar { display: none; }
        .slider-horizontal { 
            -ms-overflow-style: none; 
            scrollbar-width: none; 
            overflow-x: auto;
            scroll-behavior: smooth; 
        }
        .slider-card { min-width: 260px; max-width: 260px; }
        @media (min-width: 768px) {
            .slider-card { min-width: 280px; max-width: 280px; }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #121212;">
    
    <div class="container-xl py-4 py-md-5 flex-grow-1">
        
        <div class="row g-4 mb-5">
            <div class="col-12 col-lg-8">
                <div id="heroCarousel" class="carousel slide h-100 rounded-4 overflow-hidden shadow-lg" data-bs-ride="carousel" style="min-height: 450px;">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <div class="h-100 w-100" style="background-image: url('https://images8.alphacoders.com/106/1062227.jpg'); background-size: cover; background-position: center top; min-height: 450px;">
                                <div class="d-flex flex-column justify-content-end h-100 p-4 p-md-5" style="background: linear-gradient(to top, rgba(18,18,18,1) 0%, rgba(18,18,18,0.4) 50%, rgba(18,18,18,0) 100%);">
                                    <h1 class="text-white display-5 fw-bold mb-3">Silent Hill 2</h1>
                                    <p class="text-light mb-4 d-none d-md-block" style="max-width: 500px; font-size: 0.95rem;">
                                        James Sunderland recibe una carta de su esposa Mary pidiéndole que vaya a Silent Hill. El problema es que Mary murió hace tres años.
                                    </p>
                                    <div class="d-flex gap-3 align-items-center">
                                        <button class="btn btn-light text-dark rounded-pill px-4 py-2 fw-semibold d-flex align-items-center gap-2">
                                            <i class="fas fa-shopping-cart"></i> Añadir al carrito
                                        </button>
                                        <button class="btn text-white rounded-pill px-4 py-2" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px);">
                                            Más detalles
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="d-flex flex-column gap-4 h-100 justify-content-center">
                    
                    <a href="#" class="text-decoration-none d-flex align-items-center gap-3 p-3 rounded-4" style="background-color: rgba(255,255,255,0.05); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.05)'">
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/47/Persona3cover.jpg" alt="Persona 3" class="rounded-3" style="width: 70px; height: 90px; object-fit: cover;">
                        <span class="text-white fw-semibold">Shin Megami Tensei Persona 3</span>
                    </a>
                    
                    <a href="#" class="text-decoration-none d-flex align-items-center gap-3 p-3 rounded-4" style="background-color: rgba(255,255,255,0.05); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.05)'">
                        <img src="https://i.3djuegos.com/juegos/5184/silent_hill_3/fotos/ficha/silent_hill_3-1697794.webp" alt="Silent Hill 3" class="rounded-3" style="width: 70px; height: 90px; object-fit: cover;">
                        <span class="text-white fw-semibold">Silent Hill 3</span>
                    </a>
                    
                    <a href="#" class="text-decoration-none d-flex align-items-center gap-3 p-3 rounded-4" style="background-color: rgba(255,255,255,0.05); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.05)'">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a9/LSD_Coverart.png" alt="LSD" class="rounded-3" style="width: 70px; height: 90px; object-fit: cover;">
                        <span class="text-white fw-semibold">LSD Dream Emulator</span>
                    </a>
                    
                </div>
            </div>

        <div class="mt-5 pt-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-white fw-semibold mb-0">Ofertas Juegos</h3>
                <div class="d-flex gap-2">
                    <button class="btn btn-dark rounded-circle border-secondary text-white" onclick="deslizar('slider-ofertas', -300)" style="width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-dark rounded-circle border-secondary text-white" onclick="deslizar('slider-ofertas', 300)" style="width: 40px; height: 40px;">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <div id="slider-ofertas" class="d-flex gap-3 slider-horizontal pb-3">
                @forelse($ofertas_juegos as $producto)
                    <x-tarjeta-explorar :producto="$producto" />
                @empty
                    <div class="text-muted fst-italic w-100 p-4 rounded-4" style="background-color: #1e1e1e;">
                        No hay ofertas de juegos en este momento. Vuelve pronto.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mt-5 pt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-white fw-semibold mb-0">Combos</h3>
                <div class="d-flex gap-2">
                    <button class="btn btn-dark rounded-circle border-secondary text-white" onclick="deslizar('slider-combos', -300)" style="width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-dark rounded-circle border-secondary text-white" onclick="deslizar('slider-combos', 300)" style="width: 40px; height: 40px;">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <div id="slider-combos" class="d-flex gap-3 slider-horizontal pb-3">
                @forelse($combos as $producto)
                    <x-tarjeta-explorar :producto="$producto" />
                @empty
                    <div class="text-muted fst-italic w-100 p-4 rounded-4" style="background-color: #1e1e1e;">
                        No hay combos disponibles en este momento.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <x-footer />
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function deslizar(idContenedor, distancia) {
            const contenedor = document.getElementById(idContenedor);
            if (contenedor) {
                contenedor.scrollBy({ left: distancia, behavior: 'smooth' });
            }
        }
    </script>
</body>
</html>