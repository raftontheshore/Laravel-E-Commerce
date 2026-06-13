<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra — Catacumbas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600;700&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { background: #0d0d0d; font-family: 'Inter', sans-serif; }

        /* ── TOAST ── */
        #toast-alert {
            position: fixed;
            top: 24px; right: 24px;
            z-index: 9999;
            min-width: 280px; max-width: 380px;
            padding: 16px 20px;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem; font-weight: 600;
            display: flex; align-items: flex-start; gap: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,.5);
            animation: toastIn .25s ease, toastOut .4s ease 4s forwards;
        }
        #toast-alert.toast-success { background: #0f2a1a; border: 1px solid rgba(9,199,98,.35); color: #09c762; }
        #toast-alert.toast-error   { background: #2a0f0f; border: 1px solid rgba(192,57,43,.4);  color: #e74c3c; }
        #toast-alert i { font-size: 1.3rem; flex-shrink: 0; margin-top: 2px; }
        @keyframes toastIn  { from { opacity:0; transform:translateX(30px) } to { opacity:1; transform:translateX(0) } }
        @keyframes toastOut { from { opacity:1; transform:translateX(0) } to { opacity:0; transform:translateX(30px); pointer-events:none } }

        /* ── STEPPER ── */
        .stepper-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            gap: 0;
        }
        .step {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }
        
       .step-circle { 
            width: 48px; height: 48px; 
            font-size: 18px; 
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
        }
        .step-circle.active { background: #c0392b; color: #fff; }
        .step-circle.pending { background: #1a1a1a; color: #555; }

        .step-label { display: flex; flex-direction: column; gap: 2px; }
        .step-number {
            font-size: 11px; font-weight: 700;
            letter-spacing: .1em; text-transform: uppercase;
        }
        .step-number.active  { color: #c0392b; }
        .step-number.pending { color: #555; }
        .step-name { font-size: 15px; font-weight: 600; }
        .step-name.active  { color: #fff; }
        .step-name.pending { color: #555; }
        .step-connector {
            width: 80px;
            flex-shrink: 0;
            height: 2px;
            margin: 0 20px;
            border-radius: 2px;
            background: #1a1a1a;
        }

        /* ── PAGE TITLE ── */
        .page-title {
            font-family: 'Oswald', sans-serif;
            font-size: 2.2rem; font-weight: 700;
            color: #fff;
            letter-spacing: .04em; text-transform: uppercase;
            border-left: 5px solid #c0392b;
            padding-left: 1.2rem;
            margin-bottom: 0;
        }

        /* ── MAIN CARD ── */
        .checkout-wrapper {
            background: #111;
            border: 1px solid #1e1e1e;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 16px 60px rgba(0,0,0,.5);
            margin-bottom: 40px;
        }

        /* ── SECCIÓN LABEL ── */
        .section-label {
            display: flex; align-items: center; gap: 10px;
            font-size: 14px; font-weight: 700;
            letter-spacing: .12em; text-transform: uppercase;
            color: #c0392b;
            padding-bottom: 16px;
            border-bottom: 1px solid #1e1e1e;
            margin-bottom: 24px;
        }
        .section-label i { font-size: 18px; }

        /* ── FORM FIELDS ── */
        .form-label {
            font-size: 12px; font-weight: 700;
            letter-spacing: .1em; text-transform: uppercase;
            color: #888; margin-bottom: 8px;
        }
        .form-control {
            background: #0d0d0d !important;
            border: 1px solid #252525 !important;
            color: #fff !important;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            font-size: 1rem; /* 16px previene zoom en móviles */
            font-family: 'Inter', sans-serif;
            transition: all .2s;
        }
        .form-control:focus {
            border-color: #c0392b !important;
            box-shadow: 0 0 0 4px rgba(192,57,43,.15) !important;
            outline: none;
        }
        .form-control::placeholder { color: #444; }
        .form-control.is-invalid { border-color: #e74c3c !important; }
        .invalid-feedback { color: #e74c3c; font-size: 0.85rem; margin-top: 6px; }
        textarea.form-control { resize: vertical; min-height: 100px; }

        /* ── SEPARADOR ── */
        .prod-hr { border: none; border-top: 1px solid #1a1a1a; margin: 30px 0; width: 100%; }

        /* ── RESUMEN ITEMS ── */
        .resumen-item { padding: 16px 0; display: flex; gap: 20px; }
        .resumen-item:last-of-type { border-bottom: none; }
        .resumen-item .item-thumb {
            width: 80px; height: 80px;
            border-radius: 14px;
            border: 1px solid #1e1e1e;
            flex-shrink: 0;
            overflow: hidden;
            display: flex; align-items: center; justify-content: center;
            background: #0e0e0e;
            position: relative;
        }
        .resumen-item .item-thumb img {
            width: 100%; height: 100%; object-fit: cover;
        }
        .resumen-item .item-thumb .no-img {
            color: #2a2a2a; font-size: 1.8rem;
        }
        .resumen-item .item-info { flex: 1; min-width: 0; display: flex; flex-direction: column; justify-content: center; }
        .resumen-item .item-name {
            font-size: 16px; font-weight: 600; color: #fff;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            margin-bottom: 6px;
        }
        .resumen-item .item-meta { font-size: 13px; color: #888; display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .resumen-item .item-price {
            font-family: 'Oswald', sans-serif;
            font-size: 1.3rem; font-weight: 600; color: #fff; white-space: nowrap;
            display: flex; align-items: center;
        }

        /* Badge plataforma */
        .badge-pill {
            font-family: 'Inter', sans-serif;
            font-size: 11px; font-weight: 800;
            letter-spacing: .08em; text-transform: uppercase;
            padding: 3px 10px; border-radius: 100px;
        }
        .bp-consola { background: #c0392b; color: #fff; }

        /* Qty pill */
        .qty-pill {
            display: inline-flex; align-items: center; justify-content: center;
            background: #1a1a1a; border: 1px solid #252525;
            border-radius: 6px; padding: 2px 10px;
            font-size: 12px; font-weight: 700; color: #888;
        }

        /* ── TOTAL ── */
        .resumen-total {
            display: flex; justify-content: space-between; align-items: flex-end;
            padding: 10px 0 0;
        }
        .resumen-total .label {
            font-size: 13px; font-weight: 700;
            letter-spacing: .1em; text-transform: uppercase; color: #888;
        }
        .resumen-total .label-note { font-size: 12px; color: #555; margin-top: 4px; }
        .resumen-total .amount {
            font-family: 'Oswald', sans-serif;
            font-size: 2.8rem; font-weight: 700; color: #fff;
            line-height: 1; letter-spacing: -.01em;
        }

        /* ── BOTÓN CONFIRMAR ── */
        .btn-confirmar {
            background: #c0392b; border: none; color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 1rem; font-weight: 700;
            letter-spacing: .06em; text-transform: uppercase;
            padding: 1rem 1.5rem; border-radius: 10px; width: 100%;
            cursor: pointer; display: inline-flex; align-items: center;
            justify-content: center; gap: 10px;
            transition: all .2s;
            box-shadow: 0 4px 20px rgba(192,57,43,.3);
            margin-top: 20px;
        }
        .btn-confirmar:hover { background: #e74c3c; transform: translateY(-2px); box-shadow: 0 6px 25px rgba(192,57,43,.4); }
        .btn-confirmar:active { transform: translateY(0); }

        /* ── BOTÓN VOLVER ── */
        .btn-volver {
            display: inline-flex; align-items: center;
            justify-content: center; gap: 8px;
            background: transparent;
            border: 1px solid #222; color: #888;
            font-size: 0.9rem; font-family: 'Inter', sans-serif; font-weight: 600;
            padding: 0.8rem 1rem; border-radius: 10px; text-decoration: none; width: 100%;
            transition: all .2s;
        }
        .btn-volver:hover { border-color: #444; color: #fff; }

        /* ── NOTA SEGURIDAD ── */
        .secure-note {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            font-size: 12px; color: #555; margin-top: 10px;
        }
        .secure-note i { color: #2a6e2a; font-size: 14px; }

        /* ── MEDIOS DE PAGO ── */
        .pagos-box {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-radius: 12px;
            padding: 24px;
        }
        .pagos-titulo {
            font-size: 12px; font-weight: 700;
            letter-spacing: .1em; text-transform: uppercase;
            color: #aaa; margin: 0 0 16px;
        }
        .pagos-subtitulo {
            font-size: 11px; color: #666; font-weight: 700;
            letter-spacing: .06em; text-transform: uppercase;
            margin: 0 0 10px;
        }
        .pagos-logos { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; margin-bottom: 16px; }
        .logo-pill {
            background: #141414; border: 1px solid #2a2a2a;
            border-radius: 6px; padding: 6px 12px;
            font-size: 11px; font-weight: 800; letter-spacing: .04em;
        }
        .logo-pill.visa    { color: #1a73e8; border-color: #1a3a60; }
        .logo-pill.mc      { color: #eb001b; border-color: #4a1515; }
        .logo-pill.amex    { color: #007bc1; border-color: #1a3a50; }
        .logo-pill.cabal   { color: #00a651; border-color: #1a3a20; }
        .logo-pill.naranja { color: #ff6600; border-color: #3a2a10; }
        .logo-pill.rapipago{ color: #e74c3c; border-color: #3a1a1a; }
        .logo-pill.pf      { color: #d4a800; border-color: #3a3010; }
        
        .pagos-hr { border: none; border-top: 1px solid #1a1a1a; margin: 16px 0; }
        .pagos-nota { font-size: 11px; color: #555; margin: 10px 0 0; }
        .pagos-garantias { display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px; }
        .pagos-garantias div { display: flex; align-items: center; gap: 6px; font-size: 12px; color: #888; font-weight: 500;}
        .pagos-garantias i { color: #c0392b; font-size: 16px; flex-shrink: 0; }

        /* ── COLUMNAS ── */
.col-form {
    padding: 40px 24px !important; 
}
.col-resumen {
    padding: 40px 24px !important; 
    background: #0f0f0f; 
    border-left: 1px solid #1e1e1e;
}

/* ── RESPONSIVE ── */
@media (max-width: 991px) {
    /* Colapsar bordes y reducir padding en tablets y móviles */
    .col-form, .col-resumen { padding: 24px 16px !important; border-left: none; }
    .col-resumen { border-top: 1px solid #1e1e1e; }
    
    .page-title  { font-size: 1.8rem; }
    .step-connector { width: 40px; margin: 0 10px; }
}

        @media (max-width: 767px) {
            #toast-alert { top: auto; bottom: 20px; right: 12px; left: 12px; max-width: auto; width: calc(100% - 24px); }
            .step-label { display: none; }
            .step-circle { width: 40px; height: 40px; font-size: 16px; }
            .resumen-total .amount { font-size: 2.2rem; }
        }
    </style>
</head>

<body class="text-white fondo-catacumbas">

    <x-navbar />

    {{-- ── TOAST ── --}}
    @if(session('success'))
        <div id="toast-alert" class="toast-success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @elseif(session('error'))
        <div id="toast-alert" class="toast-error">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="container mt-4 mb-5" style="max-width: 1200px;">

        {{-- ── STEPPER ── --}}
        <div class="stepper-wrapper">

            {{-- Paso 1: activo --}}
            <div class="step">
                <div class="step-circle active">1</div>
                <div class="step-label">
                    <span class="step-number active">Paso 1</span>
                    <span class="step-name active">Finalizar Compra</span>
                </div>
            </div>

            <div class="step-connector"></div>

            {{-- Paso 2: pendiente --}}
            <div class="step">
                <div class="step-circle pending">2</div>
                <div class="step-label">
                    <span class="step-number pending">Paso 2</span>
                    <span class="step-name pending">Confirmación</span>
                </div>
            </div>

        </div>

        {{-- Título --}}
        <div class="d-flex align-items-center mb-4">
            <h1 class="page-title">
                <i class="bi bi-credit-card me-2" style="font-size:1.8rem; vertical-align:middle;"></i>
                Finalizar Compra
            </h1>
        </div>

        {{-- Card principal --}}
        <div class="checkout-wrapper">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row g-0">

                    {{-- ── Columna izquierda: Datos de entrega ── --}}
                    {{-- Usamos col-lg-7 para darle más espacio al formulario en escritorio --}}
                    <div class="col-12 col-lg-7 col-form">

                        <div>
                            <div class="section-label">
                                <i class="bi bi-geo-alt-fill"></i> Datos de Entrega
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="direccion">Dirección de envío *</label>
                                <input
                                    type="text"
                                    class="form-control @error('direccion') is-invalid @enderror"
                                    id="direccion"
                                    name="direccion"
                                    placeholder="Ej: Av. Corrientes 1234, Piso 2"
                                    value="{{ old('direccion') }}"
                                    required
                                >
                                @error('direccion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-sm-7">
                                    <label class="form-label" for="telefono">Teléfono de contacto *</label>
                                    <input
                                        type="tel"
                                        class="form-control @error('telefono') is-invalid @enderror"
                                        id="telefono"
                                        name="telefono"
                                        placeholder="Ej: 3794 123456"
                                        value="{{ old('telefono') }}"
                                        required
                                    >
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label class="form-label" for="codigo_postal">Código Postal</label>
                                    <input
                                        type="text"
                                        class="form-control @error('codigo_postal') is-invalid @enderror"
                                        id="codigo_postal"
                                        name="codigo_postal"
                                        placeholder="Ej: 3400"
                                        value="{{ old('codigo_postal') }}"
                                    >
                                    @error('codigo_postal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="form-label" for="notas">
                                    Notas adicionales <span style="color:#555; font-weight:400;">(opcional)</span>
                                </label>
                                <textarea
                                    class="form-control"
                                    id="notas"
                                    name="notas"
                                    rows="3"
                                    placeholder="Referencias, horarios de entrega, indicaciones..."
                                >{{ old('notas') }}</textarea>
                            </div>
                        </div>

                        <hr class="prod-hr">

                        {{-- Medios de pago --}}
                        <div class="pagos-box">
                            <p class="pagos-titulo">Medios de Pago Aceptados</p>

                            <p class="pagos-subtitulo">Crédito</p>
                            <div class="pagos-logos">
                                <span class="logo-pill visa">VISA</span>
                                <span class="logo-pill mc">MASTERCARD</span>
                                <span class="logo-pill amex">AMEX</span>
                                <span class="logo-pill cabal">CABAL</span>
                                <span class="logo-pill naranja">NARANJA X</span>
                            </div>

                            <hr class="pagos-hr">

                            <p class="pagos-subtitulo">Débito</p>
                            <div class="pagos-logos">
                                <span class="logo-pill visa">VISA DB</span>
                                <span class="logo-pill mc">MC DB</span>
                                <span class="logo-pill cabal">CABAL DB</span>
                            </div>

                            <hr class="pagos-hr">

                            <p class="pagos-subtitulo">Efectivo</p>
                            <div class="pagos-logos">
                                <span class="logo-pill pf">PAGO FÁCIL</span>
                                <span class="logo-pill rapipago">RAPIPAGO</span>
                            </div>

                            <p class="pagos-nota">Las cuotas pueden variar según la tarjeta y el banco emisor.</p>

                            <hr class="pagos-hr">

                            <div class="pagos-garantias">
                                <div>
                                    <i class="bi bi-truck"></i>
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

                    </div>{{-- /col-form --}}

                    {{-- ── Columna derecha: Resumen ── --}}
                    {{-- Usamos col-lg-5 para la columna de resumen --}}
                    <div class="col-12 col-lg-5 col-resumen d-flex flex-column">

                        <div class="section-label">
                            <i class="bi bi-receipt"></i> Resumen del Pedido
                        </div>

                        {{-- Items --}}
                        <div class="mb-4">
                            @foreach($venta->detalles as $detalle)
                                <div class="resumen-item">
                                    <div class="item-thumb">
                                        @if($detalle->producto && $detalle->producto->url_imagen)
                                            <img
                                                src="{{ $detalle->producto->url_imagen }}"
                                                alt="{{ $detalle->producto->nombre }}"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                            >
                                            <div class="no-img" style="display:none; width:100%; height:100%; align-items:center; justify-content:center;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @else
                                            <div class="no-img" style="display:flex; width:100%; height:100%; align-items:center; justify-content:center;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="item-info">
                                        <div class="item-name">{{ $detalle->producto->nombre ?? 'Producto' }}</div>
                                        <div class="item-meta">
                                            @if($detalle->producto && isset($detalle->producto->consola))
                                                <span class="badge-pill bp-consola">{{ $detalle->producto->consola }}</span>
                                            @endif
                                            <span class="qty-pill">×{{ $detalle->cantidad }}</span>
                                        </div>
                                    </div>
                                    <div class="item-price">
                                        ${{ number_format($detalle->subtotal, 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Separador que empuja el total hacia abajo --}}
                        <div class="mt-auto">
                            <hr class="prod-hr mt-0 mb-4">

                            {{-- Total --}}
                            <div class="resumen-total mb-4">
                                <div>
                                    <div class="label">Total a pagar</div>
                                    <div class="label-note">IVA incluido · {{ $venta->detalles->count() }} {{ $venta->detalles->count() === 1 ? 'producto' : 'productos' }}</div>
                                </div>
                                <span class="amount">${{ number_format($venta->total, 0, ',', '.') }}</span>
                            </div>

                            {{-- Botones --}}
                            <div class="d-flex flex-column gap-3">
                                <button type="submit" class="btn-confirmar">
                                    <i class="bi bi-lock-fill"></i>
                                    Confirmar compra
                                </button>
                                <a href="{{ route('carrito.index') }}" class="btn-volver">
                                    <i class="bi bi-arrow-left"></i> Volver al carrito
                                </a>
                                <div class="secure-note">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Tus datos están protegidos con cifrado SSL</span>
                                </div>
                            </div>
                        </div>

                    </div>{{-- /col-resumen --}}

                </div>
            </form>
        </div>{{-- /checkout-wrapper --}}

    </div>

    <x-footer />

    <x-volverArriba />

    <script>
        const toast = document.getElementById('toast-alert');
        if (toast) setTimeout(() => toast.remove(), 1500);
    </script>

</body>
</html>