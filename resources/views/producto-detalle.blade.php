<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre }} - Catacumbas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { background: #0d0d0d; }

        .breadcrumb-area {
            font-size: 0.75rem;
            color: #444;
            letter-spacing: .04em;
        }
        .breadcrumb-area a {
            color: #c0392b;
            text-decoration: none;
            transition: color .15s;
        }
        .breadcrumb-area a:hover { color: #e74c3c; }
        .breadcrumb-area .sep { margin: 0 8px; color: #333; }

        .detalle-wrapper {
            background: #141414;
            border: 1px solid #1f1f1f;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 24px 80px rgba(0,0,0,.6);
        }

        .prod-img-col {
            position: relative;
            background: #111;
            border-right: 1px solid #1c1c1c;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .prod-img-col::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 60% at 50% 50%, rgba(192,57,43,.08) 0%, transparent 70%);
            pointer-events: none;
        }
        .prod-img-col img {
            position: relative;
            width: 100%;
            max-width: 340px;
            max-height: 400px;
            object-fit: contain;
            border-radius: 10px;
            filter: drop-shadow(0 8px 32px rgba(0,0,0,.7));
            transition: transform .3s ease, filter .3s ease;
        }
        .prod-img-col img:hover {
            transform: scale(1.03);
            filter: drop-shadow(0 12px 40px rgba(192,57,43,.25));
        }
        .prod-img-placeholder {
            font-size: 96px;
            color: #222;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prod-info-col {
            padding: 40px 36px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 22px;
            font-family: 'Inter', sans-serif;
        }

        .badges-row {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        .badge-pill {
            font-family: 'Inter', sans-serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 100px;
        }
        .bp-consola  { background: #c0392b; color: #fff; }
        .bp-cat      { background: #1e1e1e; color: #666; border: 1px solid #2a2a2a; }
        .bp-nuevo    { background: rgba(9,199,98,.12); color: #09c762; border: 1px solid rgba(9,199,98,.3); }
        .bp-usado    { background: rgba(230,126,34,.12); color: #e67e22; border: 1px solid rgba(230,126,34,.3); }
        .bp-reacondicionado { background: rgba(52,152,219,.12); color: #3498db; border: 1px solid rgba(52,152,219,.3); }

        .prod-titulo {
            font-family: 'Oswald', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.1;
            margin: 0 0 4px;
            letter-spacing: .01em;
        }
        .prod-marca {
            font-size: 0.8rem;
            color: #444;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-weight: 500;
        }

        .prod-hr {
            border: none;
            border-top: 1px solid #1e1e1e;
            margin: 0;
            width: 100%;
        }

        .info-grid,
        .prod-desc,
        .prod-info-col form,
        .prod-info-col > div:last-child {
            width: 100%;
        }

        .precio-original {
            font-size: 0.85rem;
            color: #3a3a3a;
            text-decoration: line-through;
            margin-bottom: 2px;
        }
        .precio-row {
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .precio-final {
            font-family: 'Oswald', sans-serif;
            font-size: 2.6rem;
            font-weight: 700;
            color: #fff;
            line-height: 1;
            letter-spacing: -.01em;
        }
        .descuento-badge {
            background: rgba(9,199,98,.12);
            color: #09c762;
            border: 1px solid rgba(9,199,98,.25);
            font-size: 0.78rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 6px;
        }
        .precio-cuotas {
            font-size: 0.78rem;
            color: #3a3a3a;
            margin-top: 6px;
        }
        .precio-cuotas strong { color: #555; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border: 1px solid #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
        }
        .info-cell {
            padding: 14px 18px;
            border-bottom: 1px solid #1a1a1a;
            border-right: 1px solid #1a1a1a;
        }
        .info-cell:nth-child(even) { border-right: none; }
        .info-cell:nth-last-child(-n+2) { border-bottom: none; }
        .info-cell label {
            display: block;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #3a3a3a;
            margin-bottom: 4px;
        }
        .info-cell span {
            font-size: 0.88rem;
            color: #bbb;
            font-weight: 500;
        }
        .stock-ok   { color: #09c762 !important; }
        .stock-bajo { color: #e67e22 !important; }
        .stock-cero { color: #e74c3c !important; }

        .prod-desc {
            font-size: 0.84rem;
            color: #555;
            line-height: 1.75;
            white-space: pre-line;
        }

        .qty-wrap {
            display: flex;
            align-items: center;
            border: 1px solid #252525;
            border-radius: 9px;
            overflow: hidden;
            width: fit-content;
            background: #111;
        }
        .qty-btn {
            background: transparent;
            border: none;
            color: #666;
            width: 38px;
            height: 44px;
            font-size: 18px;
            cursor: pointer;
            transition: color .15s, background .15s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .qty-btn:hover { color: #fff; background: #1e1e1e; }
        .qty-input {
            background: transparent;
            border: none;
            border-left: 1px solid #1e1e1e;
            border-right: 1px solid #1e1e1e;
            color: #fff;
            width: 52px;
            height: 44px;
            text-align: center;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }
        .qty-input:focus { outline: none; }
        .qty-input::-webkit-inner-spin-button,
        .qty-input::-webkit-outer-spin-button { -webkit-appearance: none; }

        .btn-agregar {
            background: #c0392b;
            border: none;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: .04em;
            padding: 0 28px;
            height: 44px;
            border-radius: 9px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background .15s, transform .1s, box-shadow .15s;
            box-shadow: 0 4px 20px rgba(192,57,43,.3);
        }
        .btn-agregar:hover {
            background: #e74c3c;
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(231,76,60,.4);
        }
        .btn-agregar:active { transform: translateY(0); }
        .btn-agregar:disabled {
            background: #1e1e1e;
            color: #3a3a3a;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-volver {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: transparent;
            border: 1px solid #252525;
            color: #444;
            font-size: 0.78rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            padding: 7px 16px;
            border-radius: 7px;
            text-decoration: none;
            transition: border-color .15s, color .15s;
        }
        .btn-volver:hover { border-color: #444; color: #bbb; }

        /* ── MEDIOS DE PAGO ── */
        .pagos-box {
            background: #111;
            border: 1px solid #1e1e1e;
            border-radius: 12px;
            padding: 20px 24px;
            width: 100%;
            text-align: center;
        }
        .pagos-titulo {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #bbb;
            margin: 0 0 16px;
        }
        .pagos-subtitulo {
            font-size: 11px;
            color: #444;
            margin: 0 0 10px;
            font-weight: 500;
        }
        .pagos-logos {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
            align-items: center;
            justify-content: center;
        }
        .pagos-logos img {
            height: 28px;
            object-fit: contain;
        }
        .pagos-hr {
            border: none;
            border-top: 1px solid #1e1e1e;
            margin: 0 0 14px;
        }
        .pagos-nota {
            font-size: 10px;
            color: #bbb;
            margin: 14px 0 0;
        }
        .pagos-garantias {
            display: flex;
            flex-direction: column;
            gap: 6px;
            align-items: flex-start;
            text-align: left;
        }
        .pagos-garantias div {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #bbb;
        }
        .pagos-garantias i {
            color: #c0392b;
            font-size: 14px;
            flex-shrink: 0;
        }

        @media (max-width: 767px) {
            .prod-img-col {
                border-right: none;
                border-bottom: 1px solid #1c1c1c;
                min-height: 280px;
                padding: 28px;
            }
            .prod-info-col { padding: 24px 20px; gap: 18px; }
            .prod-titulo { font-size: 1.7rem; }
            .precio-final { font-size: 2rem; }
            .info-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">

    <x-navbar />

    <div class="container mt-4 mb-5" style="max-width: 1100px;">

        {{-- Breadcrumb --}}
        <div class="breadcrumb-area mb-4">
            <a href="/">Principal</a>
            <span class="sep">/</span>
            <a href="/tienda">Catálogo</a>
            <span class="sep">/</span>
            <span style="color:#555;">{{ $producto->nombre }}</span>
        </div>

        {{-- Card principal --}}
        <div class="detalle-wrapper">
            <div class="row g-0 align-items-stretch">

                {{-- ── IMAGEN ── --}}
                <div class="col-md-5 prod-img-col">
                    @if($producto->url_imagen)
                        <img src="{{ $producto->url_imagen }}"
                             alt="{{ $producto->nombre }}"
                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                        <div class="prod-img-placeholder" style="display:none;">
                            <i class="bi bi-image"></i>
                        </div>
                    @else
                        <div class="prod-img-placeholder">
                            <i class="bi bi-image"></i>
                        </div>
                    @endif
                </div>

                {{-- ── INFO ── --}}
                <div class="col-md-7 prod-info-col">

                    {{-- Badges --}}
                    <div class="badges-row">
                        <span class="badge-pill bp-consola">{{ $producto->consola }}</span>
                        @if($producto->categoria)
                            <span class="badge-pill bp-cat">{{ $producto->categoria->nombre }}</span>
                        @endif
                        <span class="badge-pill bp-{{ $producto->condicion }}">
                            {{ ucfirst($producto->condicion) }}
                        </span>
                    </div>

                    {{-- Título + Marca --}}
                    <div>
                        <h1 class="prod-titulo">{{ $producto->nombre }}</h1>
                        <p class="prod-marca">{{ $producto->marca }}</p>
                    </div>

                    <hr class="prod-hr">

                    {{-- Precio --}}
                    <div>
                        @if($producto->porcentaje_descuento > 0)
                            <div class="precio-original">
                                ${{ number_format($producto->precio_original, 0, ',', '.') }}
                            </div>
                        @endif
                        <div class="precio-row">
                            <span class="precio-final">
                                ${{ number_format($producto->precio, 0, ',', '.') }}
                            </span>
                            @if($producto->porcentaje_descuento > 0)
                                <span class="descuento-badge">{{ $producto->porcentaje_descuento }}% OFF</span>
                            @endif
                        </div>
                        <div class="precio-cuotas">
                            6 cuotas sin interés de
                            <strong>${{ number_format($producto->precio / 6, 0, ',', '.') }}</strong>
                        </div>
                    </div>

                    <hr class="prod-hr">

                    {{-- Info grid --}}
                    <div class="info-grid">
                        <div class="info-cell">
                            <label>Consola</label>
                            <span>{{ $producto->consola }}</span>
                        </div>
                        <div class="info-cell">
                            <label>Condición</label>
                            <span>{{ ucfirst($producto->condicion) }}</span>
                        </div>
                        <div class="info-cell">
                            <label>Stock disponible</label>
                            <span>
                                @if($producto->stock == 0)
                                    <span class="stock-cero">Sin stock</span>
                                @elseif($producto->stock <= $producto->stock_bajo)
                                    <span class="stock-bajo">⚠ {{ $producto->stock }} unid. (bajo)</span>
                                @else
                                    <span class="stock-ok">✓ {{ $producto->stock }} unidades</span>
                                @endif
                            </span>
                        </div>
                        <div class="info-cell">
                            <label>Categoría</label>
                            <span>{{ $producto->categoria->nombre ?? '—' }}</span>
                        </div>
                    </div>

                    {{-- Descripción --}}
                    @if($producto->descripcion)
                        <div class="prod-desc">{{ $producto->descripcion }}</div>
                    @endif

                    <hr class="prod-hr">

                    {{-- Cantidad + Botón --}}
                    @if($producto->stock > 0)
                        <form method="POST" action="{{ route('carrito.agregar') }}">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                                <div class="qty-wrap">
                                    <button type="button" class="qty-btn" onclick="cambiarCantidad(-1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" name="cantidad" id="cantidad"
                                           class="qty-input" value="1"
                                           min="1" max="{{ $producto->stock }}">
                                    <button type="button" class="qty-btn" onclick="cambiarCantidad(1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <button type="submit" class="btn-agregar">
                                    <i class="bi bi-cart-plus-fill"></i>
                                    Agregar al carrito
                                </button>
                            </div>
                        </form>

                        {{-- Medios de pago --}}
                        <div class="pagos-box">

                            <p class="pagos-titulo">Medios de pago</p>

                            {{-- Crédito --}}
                            <p class="pagos-subtitulo">Tarjetas de crédito</p>
                            <div class="pagos-logos">
                                <img src="https://i.ibb.co/4ZS8JLCn/image.png" alt="Visa">
                                <img src="https://i.ibb.co/7NVN4kCX/image.png" alt="Mastercard">
                                <img src="https://i.ibb.co/bgg2Scxm/image.png" alt="American Express">
                                <img src="https://i.ibb.co/hFGgk1JX/image.png" alt="Cabal">
                                <img src="https://i.ibb.co/yxXJk3q/image.png" alt="Naranja X">
                            </div>

                            <hr class="pagos-hr">

                            {{-- Débito --}}
                            <p class="pagos-subtitulo">Tarjetas de débito</p>
                            <div class="pagos-logos">
                                <img src="https://i.ibb.co/cSSpZfBJ/png-transparent-debit-visa-card-credit-money-pay-payment-pinpoint-payment-icon.png" alt="Visa Débito">
                                <img src="https://i.ibb.co/s9F5v8cj/image.png" alt="Mastercard Débito">
                                <img src="https://i.ibb.co/pB6b3WC5/image.png" alt="Cabal Débito">
                            </div>

                            <hr class="pagos-hr">

                            {{-- Efectivo --}}
                            <p class="pagos-subtitulo">Efectivo</p>
                            <div class="pagos-logos">
                                <img src="https://i.ibb.co/99pLf7wS/image.png" alt="Pago Fácil">
                                <img src="https://i.ibb.co/zWKGN2ys/image.png" alt="Rapipago">
                            </div>

                            <p class="pagos-nota">Las cuotas pueden variar según la tarjeta y el banco emisor.</p>

                            <hr class="pagos-hr" style="margin-top:14px;">

                            {{-- Garantías --}}
                            <div class="pagos-garantias">
                                <div>
                                    <i class="bi bi-check-circle"></i>
                                    <span>Envío a todo el país</span>
                                </div>
                                <div>
                                    <i class="bi bi-shield-check"></i>
                                    <span>Compra 100% segura</span>
                                </div>
                                <div>
                                    <i class="bi bi-headset"></i>
                                    <span>Soporte personalizado</span>
                                </div>
                            </div>

                        </div>

                    @else
                        <button class="btn-agregar" disabled>
                            <i class="bi bi-x-circle-fill"></i>
                            Sin stock disponible
                        </button>
                    @endif

                    {{-- Volver --}}
                    <div>
                        <a href="javascript:history.back()" class="btn-volver">
                            <i class="bi bi-arrow-left"></i> Volver al catálogo
                        </a>
                    </div>

                </div>{{-- /prod-info-col --}}
            </div>
        </div>{{-- /detalle-wrapper --}}

    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <x-volverArriba />

    <script>
        function cambiarCantidad(delta) {
            const input = document.getElementById('cantidad');
            const max   = parseInt(input.max);
            let val     = parseInt(input.value) + delta;
            if (val < 1)   val = 1;
            if (val > max) val = max;
            input.value = val;
        }
    </script>

</body>
</html>