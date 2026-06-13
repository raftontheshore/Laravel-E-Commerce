<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Mis Compras — Catacumbas</title>

    <style>
        body { font-family: 'Inter', sans-serif; }

        .titulo-seccion {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            color: #fff;
            border-left: 4px solid #c02a2a;
            padding-left: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ── TARJETA DE COMPRA ── */
        .compra-card {
            background: #141414;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            overflow: hidden;
            transition: border-color 0.2s;
        }
        .compra-card:hover {
            border-color: #3a3a3a;
        }

        /* HEADER DE LA TARJETA (Fecha y Estado) */
        .compra-header {
            background: #1a1a1a;
            padding: 16px 24px;
            border-bottom: 1px solid #2a2a2a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }
        .compra-fecha {
            font-weight: 600;
            color: #fff;
            font-size: 1rem;
        }
        
        /* BADGES DE ESTADO */
        .badge-estado {
            padding: 6px 12px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .estado-entregado { background: rgba(9, 199, 98, 0.15); color: #09c762; border: 1px solid rgba(9, 199, 98, 0.3); }
        .estado-pagado { background: rgba(52, 152, 219, 0.15); color: #3498db; border: 1px solid rgba(52, 152, 219, 0.3); }
        .estado-pendiente { background: rgba(243, 156, 18, 0.15); color: #f39c12; border: 1px solid rgba(243, 156, 18, 0.3); }
        .estado-cancelado { background: rgba(231, 76, 60, 0.15); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.3); }

        /* CUERPO DE LA TARJETA (Productos) */
        .compra-body {
            padding: 24px;
        }
        .item-producto {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #1e1e1e;
        }
        .item-producto:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .item-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #2a2a2a;
            background: #0d0d0d;
            flex-shrink: 0;
        }
        .item-info {
            flex-grow: 1;
            min-width: 0;
        }
        .item-titulo {
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .item-meta {
            font-size: 0.85rem;
            color: #888;
        }

        /* FOOTER Y BOTONES */
        .compra-footer {
            background: #111;
            padding: 16px 24px;
            border-top: 1px solid #2a2a2a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }
        .compra-total {
            font-family: 'Oswald', sans-serif;
            font-size: 1.4rem;
            color: #fff;
        }
        .btn-accion {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.2s;
        }
        .btn-ver-detalle {
            background-color: #c02a2a;
            color: #fff;
            border: none;
        }
        .btn-ver-detalle:hover {
            background-color: #a02020;
            color: #fff;
        }
        .btn-volver-comprar {
            background-color: transparent;
            color: #aaa;
            border: 1px solid #444;
        }
        .btn-volver-comprar:hover {
            border-color: #fff;
            color: #fff;
        }

        /* ESTADO VACÍO */
        .compras-vacio {
            background: #141414;
            border: 1px dashed #3a3a3a;
            border-radius: 12px;
            padding: 60px 20px;
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">

    <x-navbar />

    <div class="container py-5" style="max-width: 900px;">
        
        <h2 class="titulo-seccion mb-4">
            <i class="bi bi-bag-check me-2"></i> Mis Compras
        </h2>

        {{-- Usamos forelse para manejar automáticamente si hay compras o si está vacío --}}
        @forelse($compras as $compra)
            <div class="compra-card mb-4 shadow-sm">
                
                {{-- HEADER: Fecha y Estado --}}
                <div class="compra-header">
                    <div class="compra-fecha">
                        {{ \Carbon\Carbon::parse($compra->created_at)->translatedFormat('d \d\e F \d\e Y') }}
                        <span class="text-secondary fw-normal ms-2" style="font-size: 0.85rem;">Orden #{{ str_pad($compra->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>

                    {{-- Lógica de colores para los estados --}}
                    @php
                        $claseEstado = 'estado-pendiente';
                        $iconoEstado = 'bi-clock-history';
                        
                        if($compra->estado == 'entregado') {
                            $claseEstado = 'estado-entregado';
                            $iconoEstado = 'bi-check-circle-fill';
                        } elseif($compra->estado == 'pagado' || $compra->estado == 'en_camino') {
                            $claseEstado = 'estado-pagado';
                            $iconoEstado = 'bi-truck';
                        } elseif($compra->estado == 'cancelado') {
                            $claseEstado = 'estado-cancelado';
                            $iconoEstado = 'bi-x-circle-fill';
                        }
                    @endphp

    
                </div>

                {{-- BODY: Lista de Productos --}}
                <div class="compra-body">
                    @foreach($compra->detalles as $detalle)
                        <div class="item-producto">
                            @if($detalle->producto && $detalle->producto->url_imagen)
                                <img src="{{ $detalle->producto->url_imagen }}" alt="{{ $detalle->producto->nombre }}" class="item-img">
                            @else
                                <div class="item-img d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image text-secondary fs-4"></i>
                                </div>
                            @endif

                            <div class="item-info d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                                <div style="min-width: 0;">
                                    <div class="item-titulo">{{ $detalle->producto->nombre ?? 'Producto no disponible' }}</div>
                                    <div class="item-meta">
                                        <span class="text-white">{{ $detalle->cantidad }} u.</span> 
                                        <span class="mx-1">|</span>
                                        ${{ number_format($detalle->precio_unitario, 0, ',', '.') }} c/u
                                    </div>
                                </div>

                                <div class="text-start text-sm-end mt-1 mt-sm-0 flex-shrink-0">
                                    <a href="/producto/{{ $detalle->producto_id }}" 
                                    class="text-decoration-none" 
                                    style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: #888;">
                                    Volver a comprar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- FOOTER: Total y Botón Principal --}}
                <div class="compra-footer">
                    <div>
                        <span class="text-secondary" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Total pagado</span>
                        <div class="compra-total">${{ number_format($compra->total, 0, ',', '.') }}</div>
                    </div>
                    <div>
                        {{-- Enlace a la vista que ya creaste de Compra Confirmada / Recibo --}}
                       <a href="{{ route('checkout.confirmacion', $compra->id) }}" 
                        class="text-decoration-none" 
                        style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: #888;">
                        Ver detalle de compra
                        </a>
                    </div>
                </div>

            </div>
        @empty
            {{-- ESTADO VACÍO (Si el usuario no tiene compras) --}}
            <div class="compras-vacio text-center">
                <i class="bi bi-bag-x" style="font-size: 3rem; color: #444;"></i>
                <h4 class="mt-3 fw-bold text-white">Aún no tienes compras</h4>
                <p class="text-secondary mb-4">¿Qué esperas para llevarte tu próximo juego?</p>
                <a href="/tienda" class="btn btn-ver-detalle btn-accion" style="padding: 10px 24px;">
                    <i class="bi bi-controller me-2"></i> Ir al catálogo
                </a>
            </div>
        @endforelse

    </div>

    <x-volverArriba />
    <x-footer />

</body>
</html>