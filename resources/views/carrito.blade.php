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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Mi Carrito — Catacumbas</title>

    <style>
        .carrito-item {
            background: #1e1e1e;
            border: 1px solid #2e2e2e;
            border-radius: 12px;
            transition: border-color 0.2s;
        }
        .carrito-item:hover {
            border-color: #c02a2a;
        }
        .resumen-card {
            background: #1e1e1e;
            border: 1px solid #2e2e2e;
            border-radius: 12px;
            position: sticky;
            top: 20px;
        }
        .btn-eliminar {
            background: transparent;
            border: none;
            color: #888;
            font-size: 0.85rem;
            padding: 0;
            transition: color 0.2s;
        }
        .btn-eliminar:hover {
            color: #c02a2a;
        }
        .btn-confirmar {
            background-color: #c02a2a;
            border: none;
            border-radius: 8px;
            font-family: 'Oswald', sans-serif;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: background-color 0.2s, transform 0.1s;
        }
        .btn-confirmar:hover {
            background-color: #a02020;
            transform: scale(1.01);
        }
        .precio-unitario {
            color: #888;
            font-size: 0.85rem;
        }
        .subtotal-item {
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .divider {
            border-color: #2e2e2e;
        }
        .cantidad-badge {
            background: #2e2e2e;
            color: #ccc;
            border-radius: 6px;
            padding: 2px 10px;
            font-size: 0.9rem;
        }
        .carrito-vacio {
            background: #1e1e1e;
            border: 1px dashed #3e3e3e;
            border-radius: 12px;
        }
        .titulo-seccion {
            font-family: 'Oswald', sans-serif;
            font-size: 1.5rem;
            color: #fff;
            border-left: 4px solid #c02a2a;
            padding-left: 12px;
        }
        .total-label {
            font-family: 'Oswald', sans-serif;
            font-size: 1.1rem;
            color: #aaa;
        }
        .total-valor {
            font-family: 'Oswald', sans-serif;
            font-size: 1.6rem;
            color: #fff;
            font-weight: 700;
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">

    <x-navbar />
    <x-marquee />

    <div class="container py-5">

        <h2 class="titulo-seccion mb-4">
            <i class="bi bi-cart3 me-2"></i> Mi Carrito
        </h2>

        @if($items->isEmpty())
            {{-- CARRITO VACÍO --}}
            <div class="carrito-vacio text-center py-5">
                <i class="bi bi-cart-x" style="font-size: 3rem; color: #555;"></i>
                <p class="mt-3 text-secondary fs-5">Tu carrito está vacío.</p>
                <a href="/tienda" class="btn btn-outline-light mt-2">
                    <i class="bi bi-shop me-1"></i> Ir a la tienda
                </a>
            </div>
        @else
            <div class="row g-4">

                {{-- COLUMNA IZQUIERDA: items --}}
                <div class="col-12 col-lg-8">
                    <div class="d-flex flex-column gap-3">

                        @foreach($items as $item)
                        <div class="carrito-item p-3 p-md-4">
                            <div class="row align-items-center g-3">

                                {{-- Imagen del producto --}}
                                <div class="col-3 col-md-2 text-center">
                                    @if(isset($item->producto->imagen_url))
                                        <img src="{{ $item->producto->imagen_url }}"
                                             alt="{{ $item->producto->nombre }}"
                                             class="img-fluid rounded"
                                             style="max-height: 80px; object-fit: contain;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center rounded"
                                             style="height:80px; background:#2e2e2e;">
                                            <i class="bi bi-image text-secondary fs-3"></i>
                                        </div>
                                    @endif
                                </div>

                                {{-- Info del producto --}}
                                <div class="col-9 col-md-5">
                                    <p class="mb-1 fw-semibold" style="font-size: 0.95rem; line-height: 1.3;">
                                        {{ $item->producto->nombre }}
                                    </p>
                                    @if(isset($item->producto->consola))
                                        <span class="badge" style="background:#2e2e2e; color:#aaa; font-size:0.75rem;">
                                            {{ $item->producto->consola }}
                                        </span>
                                    @endif
                                    @if(isset($item->producto->estado))
                                        <span class="badge ms-1" style="background:#2e2e2e; color:#aaa; font-size:0.75rem;">
                                            {{ $item->producto->estado }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Cantidad --}}
                                <div class="col-6 col-md-2 text-center">
                                    <p class="mb-1 precio-unitario">Cantidad</p>
                                    <span class="cantidad-badge">{{ $item->cantidad }}</span>
                                </div>

                                {{-- Subtotal + Eliminar --}}
                                <div class="col-6 col-md-3 text-end">
                                    <p class="precio-unitario mb-0">
                                        ${{ number_format($item->precio_unitario, 0, ',', '.') }} c/u
                                    </p>
                                    <p class="subtotal-item mb-2">
                                        ${{ number_format($item->subtotal, 0, ',', '.') }}
                                    </p>
                                    <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-eliminar">
                                            <i class="bi bi-trash3 me-1"></i> Eliminar
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                {{-- COLUMNA DERECHA: resumen --}}
                <div class="col-12 col-lg-4">
                    <div class="resumen-card p-4">
                        <h5 class="fw-bold mb-4" style="font-family: 'Oswald', sans-serif; font-size: 1.2rem;">
                            Resumen de compra
                        </h5>

                        {{-- Desglose --}}
                        @php
                            $totalProductos = $items->sum('subtotal');
                        @endphp

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-secondary" style="font-size: 0.9rem;">
                                Productos ({{ $items->count() }})
                            </span>
                            <span style="font-size: 0.9rem;">
                                ${{ number_format($totalProductos, 0, ',', '.') }}
                            </span>
                        </div>

                        <hr class="divider my-3">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="total-label">Total</span>
                            <span class="total-valor">
                                ${{ number_format($totalProductos, 0, ',', '.') }}
                            </span>
                        </div>

                        <form method="POST" action="{{ route('carrito.confirmar') }}">
                            @csrf
                            <button type="submit" class="btn btn-confirmar text-white w-100 py-3">
                                Confirmar compra ({{ $items->count() }})
                            </button>
                        </form>

                        <a href="/tienda" class="btn btn-outline-secondary w-100 mt-2" style="border-radius: 8px;">
                            <i class="bi bi-arrow-left me-1"></i> Seguir comprando
                        </a>

                    </div>
                </div>

            </div>
        @endif

    </div>

    <x-volverArriba />
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>