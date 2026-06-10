<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Confirmada — Catacumbas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { background: #0d0d0d; font-family: 'Inter', sans-serif; }

        /* ── BREADCRUMB ── */
        .breadcrumb-area {
            font-size: 0.75rem;
            color: #444;
            letter-spacing: .04em;
        }
        .breadcrumb-area a { color: #c0392b; text-decoration: none; transition: color .15s; }
        .breadcrumb-area a:hover { color: #e74c3c; }
        .breadcrumb-area .sep { margin: 0 8px; color: #333; }

        /* ── BANNER ÉXITO ── */
        .success-banner {
            background: #0f2a1a;
            border: 1px solid rgba(9,199,98,.3);
            border-radius: 12px;
            padding: 28px 32px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .success-icon {
            width: 56px;
            height: 56px;
            background: rgba(9,199,98,.12);
            border: 1px solid rgba(9,199,98,.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .success-icon i { color: #09c762; font-size: 1.6rem; }
        .success-title {
            font-family: 'Oswald', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: .04em;
            text-transform: uppercase;
            margin: 0 0 4px;
        }
        .success-sub {
            font-size: 0.82rem;
            color: #09c762;
            margin: 0;
        }
        .orden-num {
            margin-left: auto;
            text-align: right;
            flex-shrink: 0;
        }
        .orden-num .label {
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #3a3a3a;
            display: block;
            margin-bottom: 3px;
        }
        .orden-num .num {
            font-family: 'Oswald', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #09c762;
        }

        /* ── MAIN CARD ── */
        .confirm-wrapper {
            background: #141414;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 16px 60px rgba(0,0,0,.5);
        }

        /* ── SECCIÓN LABEL ── */
        .section-label {
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #c0392b;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #1e1e1e;
        }

  /* ── COLUMNAS ── */
.col-detalle  { padding: 40px 24px !important; border-right: 1px solid #1c1c1c; }
.col-resumen  { padding: 40px 24px !important; display: flex; flex-direction: column; gap: 16px; }

        /* ── DATOS DE ENTREGA ── */
        .dato-row {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: 10px 0;
            border-bottom: 1px solid #1a1a1a;
        }
        .dato-row:last-of-type { border-bottom: none; }
        .dato-label {
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #3a3a3a;
        }
        .dato-value {
            font-size: 0.88rem;
            color: #ccc;
            font-weight: 500;
        }

        /* ── ESTADO BADGE ── */
        .estado-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 100px;
        }
        .estado-confirmado {
            background: rgba(9,199,98,.12);
            color: #09c762;
            border: 1px solid rgba(9,199,98,.3);
        }
        .estado-carrito {
            background: rgba(230,126,34,.12);
            color: #e67e22;
            border: 1px solid rgba(230,126,34,.3);
        }

        /* ── PROD HR ── */
        .prod-hr {
            border: none;
            border-top: 1px solid #1e1e1e;
            margin: 0;
            width: 100%;
        }

        /* ── ITEMS ── */
        .resumen-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #1a1a1a;
        }
        .resumen-item:last-of-type { border-bottom: none; }
        .resumen-item img {
            width: 52px;
            height: 52px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #1e1e1e;
            flex-shrink: 0;
        }
        .resumen-item .item-info { flex: 1; min-width: 0; }
        .resumen-item .item-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: #ddd;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .resumen-item .item-meta { font-size: 0.72rem; color: #444; margin-top: 3px; }
        .resumen-item .item-price {
            font-family: 'Oswald', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            white-space: nowrap;
        }
        .badge-pill {
            font-family: 'Inter', sans-serif;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 2px 8px;
            border-radius: 100px;
        }
        .bp-consola { background: #c0392b; color: #fff; }

        /* ── TOTAL ── */
        .resumen-total {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 14px 0 0;
        }
        .resumen-total .label {
            font-size: 8px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #3a3a3a;
        }
        .resumen-total .amount {
            font-family: 'Oswald', sans-serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }

        /* ── BOTONES ── */
        .btn-pdf {
            background: #c0392b;
            border: none;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: 0.8rem 1.5rem;
            border-radius: 7px;
            width: 100%;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background .15s, transform .1s, box-shadow .15s;
            box-shadow: 0 3px 14px rgba(192,57,43,.28);
            text-decoration: none;
        }
        .btn-pdf:hover {
            background: #e74c3c;
            transform: translateY(-1px);
            box-shadow: 0 5px 18px rgba(231,76,60,.38);
            color: #fff;
        }
        .btn-pdf:active { transform: translateY(0); }

        .btn-seguir {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            background: transparent;
            border: 1px solid #252525;
            color: #444;
            font-size: 0.78rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            padding: 0.55rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            width: 100%;
            transition: border-color .15s, color .15s;
        }
        .btn-seguir:hover { border-color: #444; color: #bbb; }

        /* ── RESPONSIVE ── */
        @media (max-width: 767px) {
            .col-detalle { border-right: none; border-bottom: 1px solid #1c1c1c; padding: 20px 16px; }
            .col-resumen { padding: 20px 16px; }
            .success-banner { flex-direction: column; text-align: center; gap: 12px; }
            .orden-num { margin-left: 0; text-align: center; }
        }

        /* ── COMPROBANTE (solo para impresión/PDF) ── */
        @media print {
            body { background: #fff !important; color: #000 !important; }
            .no-print { display: none !important; }
            .confirm-wrapper {
                background: #fff !important;
                border: 1px solid #ddd !important;
                box-shadow: none !important;
            }
            .col-detalle { border-right: 1px solid #ddd !important; }
            .section-label { color: #c0392b !important; }
            .section-label::after { background: #ddd !important; }
            .resumen-item .item-name { color: #000 !important; }
            .resumen-item .item-price { color: #000 !important; }
            .resumen-total .amount { color: #000 !important; }
            .dato-value { color: #333 !important; }
            .success-banner {
                background: #f0faf5 !important;
                border-color: #09c762 !important;
            }
            .success-title { color: #000 !important; }
            .prod-hr { border-color: #ddd !important; }
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">

    <div class="no-print">
        <x-navbar />
    </div>

    <div class="container mt-3 mb-5" style="max-width: 1100px;">

        {{-- Breadcrumb --}}
        <div class="breadcrumb-area mb-3 no-print">
            <a href="/">Principal</a>
            <span class="sep">/</span>
            <a href="/tienda">Catálogo</a>
            <span class="sep">/</span>
            <span style="color:#555;">Compra Confirmada</span>
        </div>

        {{-- Banner éxito --}}
        <div class="success-banner mb-4">
            <div class="success-icon">
                <i class="bi bi-check-lg"></i>
            </div>
            <div>
                <h1 class="success-title">¡Compra confirmada!</h1>
                <p class="success-sub">Te contactaremos para coordinar el pago y el envío.</p>
            </div>
            <div class="orden-num">
                <span class="label">N° de orden</span>
                <span class="num">#{{ str_pad($venta->id, 5, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>

        {{-- Card principal --}}
        <div class="confirm-wrapper">
            <div class="row g-0">

                {{-- ── Columna izquierda: Datos de entrega ── --}}
                <div class="col-md-5 col-detalle">

                    <div class="section-label">
                        <i class="bi bi-geo-alt-fill"></i> Datos de Entrega
                    </div>

                    <div class="dato-row">
                        <span class="dato-label">Dirección de envío</span>
                        <span class="dato-value">{{ $venta->direccion ?? '—' }}</span>
                    </div>
                    <div class="dato-row">
                        <span class="dato-label">Teléfono de contacto</span>
                        <span class="dato-value">{{ $venta->telefono ?? '—' }}</span>
                    </div>
                    @if($venta->codigo_postal)
                    <div class="dato-row">
                        <span class="dato-label">Código Postal</span>
                        <span class="dato-value">{{ $venta->codigo_postal }}</span>
                    </div>
                    @endif
                    @if($venta->notas)
                    <div class="dato-row">
                        <span class="dato-label">Notas</span>
                        <span class="dato-value">{{ $venta->notas }}</span>
                    </div>
                    @endif

                    <hr class="prod-hr mt-3 mb-3">

                    <div class="section-label">
                        <i class="bi bi-info-circle"></i> Información del Pedido
                    </div>

                    <div class="dato-row">
                        <span class="dato-label">Fecha</span>
                        <span class="dato-value">
                            {{ $venta->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    <div class="dato-row">
                        <span class="dato-label">Cliente</span>
                        <span class="dato-value">{{ $venta->usuario->name ?? Auth::user()->name }}</span>
                    </div>
                    <div class="dato-row">
                        <span class="dato-label">Estado</span>
                        <span class="dato-value">
                            <span class="estado-badge estado-{{ $venta->estado }}">
                                <i class="bi bi-circle-fill" style="font-size:6px;"></i>
                                {{ ucfirst($venta->estado) }}
                            </span>
                        </span>
                    </div>

                </div>

                {{-- ── Columna derecha: Productos + Total ── --}}
                <div class="col-md-7 col-resumen">

                    <div class="section-label">
                        <i class="bi bi-receipt"></i> Productos Comprados
                    </div>

                    @foreach($venta->detalles as $detalle)
                        <div class="resumen-item">
                            @if($detalle->producto && $detalle->producto->url_imagen)
                                <img src="{{ $detalle->producto->url_imagen }}"
                                     alt="{{ $detalle->producto->nombre }}"
                                     onerror="this.src='{{ asset('images/no-image.png') }}'">
                            @else
                                <div style="width:52px;height:52px;background:#111;border:1px solid #1e1e1e;border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="bi bi-image" style="color:#2a2a2a;font-size:1.2rem;"></i>
                                </div>
                            @endif
                            <div class="item-info">
                                <div class="item-name">{{ $detalle->producto->nombre ?? 'Producto' }}</div>
                                <div class="item-meta">
                                    @if($detalle->producto && isset($detalle->producto->consola))
                                        <span class="badge-pill bp-consola">{{ $detalle->producto->consola }}</span>
                                        &nbsp;
                                    @endif
                                    x{{ $detalle->cantidad }}
                                    &nbsp;·&nbsp;
                                    ${{ number_format($detalle->precio_unitario, 0, ',', '.') }} c/u
                                </div>
                            </div>
                            <div class="item-price">
                                ${{ number_format($detalle->subtotal, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach

                    <hr class="prod-hr">

                    <div class="resumen-total">
                        <span class="label">Total pagado</span>
                        <span class="amount">${{ number_format($venta->total, 0, ',', '.') }}</span>
                    </div>

                    <hr class="prod-hr">

                    {{-- Botones --}}
                    <div class="d-flex flex-column gap-2 no-print">
                        <button onclick="window.print()" class="btn-pdf">
                            <i class="bi bi-download"></i>
                            Descargar comprobante
                        </button>
                        <a href="/tienda" class="btn-seguir">
                            <i class="bi bi-grid"></i> Seguir comprando
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <div class="no-print">
        <x-footer />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <x-volverArriba />

</body>
</html>