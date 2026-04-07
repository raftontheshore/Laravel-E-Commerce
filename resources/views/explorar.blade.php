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
        /* ── Scrollable sliders ─────────────────────────────────── */
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

        /* ── Sidebar game cards ─────────────────────────────────── */
        .featured-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #222;
            border-left: 3px solid #c0392b;
            background-color: #161616;
            text-decoration: none;
            transition: background-color 0.2s, border-left-color 0.2s;
        }
        .featured-card:hover {
            background-color: #1d1d1d;
            border-left-color: #e74c3c;
        }
        .featured-card img {
            width: 60px;
            height: 78px;
            object-fit: cover;
            border-radius: 6px;
            flex-shrink: 0;
        }
        .featured-card .game-platform {
            font-size: 10px;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 3px;
        }
        .featured-card .game-title {
            color: #ddd;
            font-size: 13.5px;
            font-weight: 500;
            line-height: 1.35;
        }
        .featured-card .arrow {
            margin-left: auto;
            color: #3a3a3a;
            font-size: 13px;
            flex-shrink: 0;
        }

        /* ── Hero buttons ───────────────────────────────────────── */
        .btn-hero-primary {
            background: #fff;
            color: #111;
            border: none;
            border-radius: 20px;
            padding: 9px 22px;
            font-size: 13.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.15s;
        }
        .btn-hero-primary:hover { background: #e8e8e8; }

        .btn-hero-secondary {
            background: transparent;
            color: #ddd;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 20px;
            padding: 9px 22px;
            font-size: 13.5px;
            font-weight: 500;
            transition: border-color 0.15s, color 0.15s;
        }
        .btn-hero-secondary:hover {
            border-color: rgba(255,255,255,0.6);
            color: #fff;
        }

        /* ── Section headers ────────────────────────────────────── */
        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
        }
        .section-title::before {
            content: '';
            display: block;
            width: 3px;
            height: 20px;
            background: #c0392b;
            border-radius: 2px;
            flex-shrink: 0;
        }

        /* ── Slider nav buttons ─────────────────────────────────── */
        .slider-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #1c1c1c;
            border: 1px solid #2a2a2a;
            color: #aaa;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            font-size: 12px;
        }
        .slider-btn:hover {
            background: #252525;
            color: #fff;
            border-color: #444;
        }

        /* ── Empty states ───────────────────────────────────────── */
        .empty-state {
            color: #555;
            font-style: italic;
            width: 100%;
            padding: 20px 24px;
            border-radius: 10px;
            background-color: #161616;
            border: 1px dashed #2a2a2a;
            font-size: 13px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #111;">
    <x-navbar />

    <div class="container-xl py-4 py-md-5 flex-grow-1">

        {{-- ── Hero + Sidebar ─────────────────────────────────── --}}
        <div class="row g-4 mb-5">

            {{-- Hero carousel --}}
            <div class="col-12 col-lg-8">
                <div id="heroCarousel" class="carousel slide h-100 rounded-4 overflow-hidden"
                     data-bs-ride="carousel" style="min-height: 450px;">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <div class="h-100 w-100"
                                 style="background-image: url('https://images8.alphacoders.com/106/1062227.jpg');
                                        background-size: cover;
                                        background-position: center top;
                                        min-height: 450px;">
                                <div class="d-flex flex-column justify-content-end h-100 p-4 p-md-5"
                                     style="background: linear-gradient(to top, rgba(17,17,17,1) 0%, rgba(17,17,17,0.45) 50%, rgba(17,17,17,0) 100%);">

                                    {{-- Optional tag --}}
                                    <span style="display:inline-block; background:#c0392b; color:#fff;
                                                 font-size:10px; font-weight:600; letter-spacing:1px;
                                                 padding:3px 10px; border-radius:4px; text-transform:uppercase;
                                                 margin-bottom:12px; width:fit-content;">
                                        Destacado
                                    </span>

                                    <h1 class="text-white fw-bold mb-3" style="font-size: clamp(1.6rem, 3vw, 2.4rem);">
                                        Silent Hill 2
                                    </h1>
                                    <p class="text-light mb-4 d-none d-md-block"
                                       style="max-width: 480px; font-size: 0.9rem; color: #aaa !important; line-height: 1.65;">
                                        James Sunderland recibe una carta de su esposa Mary pidiéndole que vaya a Silent Hill.
                                        El problema es que Mary murió hace tres años.
                                    </p>
                                    <div class="d-flex gap-3 align-items-center flex-wrap">
                                        <button class="btn-hero-primary">
                                            <i class="fas fa-shopping-cart" style="font-size:12px;"></i> Añadir al carrito
                                        </button>
                                        <button class="btn-hero-secondary">
                                            Más detalles
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Featured sidebar --}}
            <div class="col-12 col-lg-4">
                <div class="d-flex flex-column gap-3 h-100 justify-content-center">

                    <a href="#" class="featured-card">
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/47/Persona3cover.jpg" alt="Persona 3">
                        <div>
                            <div class="game-platform">PlayStation 2</div>
                            <div class="game-title">Shin Megami Tensei Persona 3</div>
                        </div>
                        <i class="fas fa-chevron-right arrow"></i>
                    </a>

                    <a href="#" class="featured-card">
                        <img src="https://i.3djuegos.com/juegos/5184/silent_hill_3/fotos/ficha/silent_hill_3-1697794.webp" alt="Silent Hill 3">
                        <div>
                            <div class="game-platform">PlayStation 2</div>
                            <div class="game-title">Silent Hill 3</div>
                        </div>
                        <i class="fas fa-chevron-right arrow"></i>
                    </a>

                    <a href="#" class="featured-card">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a9/LSD_Coverart.png" alt="LSD Dream Emulator">
                        <div>
                            <div class="game-platform">PlayStation</div>
                            <div class="game-title">LSD Dream Emulator</div>
                        </div>
                        <i class="fas fa-chevron-right arrow"></i>
                    </a>

                </div>
            </div>
        </div>{{-- /row --}}

        {{-- ── Ofertas Juegos ──────────────────────────────────── --}}
        <div class="mt-5 pt-2">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Ofertas Juegos</h3>
                <div class="d-flex gap-2">
                    <button class="slider-btn" onclick="deslizar('slider-ofertas', -300)" aria-label="Anterior">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-btn" onclick="deslizar('slider-ofertas', 300)" aria-label="Siguiente">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div id="slider-ofertas" class="d-flex gap-3 slider-horizontal pb-3">
                @forelse($ofertas_juegos as $producto)
                    <x-tarjeta-explorar :producto="$producto" />
                @empty
                    <div class="empty-state">No hay ofertas de juegos en este momento. Vuelve pronto.</div>
                @endforelse
            </div>
        </div>

        {{-- ── Combos ──────────────────────────────────────────── --}}
        <div class="mt-5 pt-2">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Combos</h3>
                <div class="d-flex gap-2">
                    <button class="slider-btn" onclick="deslizar('slider-combos', -300)" aria-label="Anterior">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-btn" onclick="deslizar('slider-combos', 300)" aria-label="Siguiente">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div id="slider-combos" class="d-flex gap-3 slider-horizontal pb-3">
                @forelse($combos as $producto)
                    <x-tarjeta-explorar :producto="$producto" />
                @empty
                    <div class="empty-state">No hay combos disponibles en este momento.</div>
                @endforelse
            </div>
        </div>

    </div>{{-- /container --}}

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