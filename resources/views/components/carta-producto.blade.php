<style>
    .cat-product-card {
        background: #161616;
        border: 1px solid #222;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
        height: 100%;
    }
    .cat-product-card:hover {
        border-color: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 0 0 1px #c0392b, 0 8px 24px rgba(192, 57, 43, 0.2);
    }

    .cat-card-img {
        background: #1a1a1a;
        border-bottom: 1px solid #222;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
        overflow: hidden;
        flex-shrink: 0;
    }
    .cat-card-img img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .cat-card-img-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #333;
    }
    .cat-card-img-placeholder i { font-size: 40px; }
    .cat-card-img-placeholder span { font-size: 11px; letter-spacing: .05em; text-transform: uppercase; }

    .cat-card-body {
        padding: 14px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .cat-badge {
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 5px;
        line-height: 1.4;
    }
    .cat-badge-brand { background: #c0392b; color: #fff; }
    .cat-badge-state { background: #252525; color: #777; border: 1px solid #333; }

    .cat-card-title {
        font-size: 14px;
        font-weight: 600;
        color: #e8e8e8;
        margin: 0;
        line-height: 1.3;
    }

    .cat-price-original { font-size: 11px; color: #444; text-decoration: line-through; }
    .cat-price { font-size: 20px; font-weight: 700; color: #fff; line-height: 1; }
    .cat-discount { font-size: 11px; font-weight: 700; color: #09c762; }
    .cat-installments { font-size: 11px; color: #444; }

    .cat-sin-stock-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,.55);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    .cat-sin-stock-overlay span {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: #e74c3c;
        background: rgba(0,0,0,.7);
        border: 1px solid rgba(231,76,60,.4);
        padding: 5px 12px;
        border-radius: 6px;
    }
    .cat-sin-stock .cat-price,
    .cat-sin-stock .cat-price-original,
    .cat-sin-stock .cat-discount,
    .cat-sin-stock .cat-installments { opacity: 0.4; }
    .cat-sin-stock-badge {
        font-size: 11px;
        font-weight: 700;
        color: #e74c3c;
        letter-spacing: .05em;
        text-transform: uppercase;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>

<a href="{{ route('producto.detalle', $producto->id) }}"
   class="text-decoration-none d-block h-100">
    <div class="cat-product-card {{ $producto->stock == 0 ? 'cat-sin-stock' : '' }}">

        {{-- ✅ Imagen dentro de su contenedor --}}
        <div class="cat-card-img" style="position: relative;">
            @if($producto->stock == 0)
                <div class="cat-sin-stock-overlay">
                    <span><i class="bi bi-x-circle-fill me-1"></i>Sin stock</span>
                </div>
            @endif
            @if($producto->url_imagen)
                <img src="{{ $producto->url_imagen }}"
                     alt="{{ $producto->nombre }}"
                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <div class="cat-card-img-placeholder" style="display:none;">
                    <i class="bi bi-image"></i>
                    <span>Sin imagen</span>
                </div>
            @else
                <div class="cat-card-img-placeholder">
                    <i class="bi bi-image"></i>
                    <span>Sin imagen</span>
                </div>
            @endif
        </div>

        {{-- Cuerpo --}}
        <div class="cat-card-body">

            <div class="d-flex gap-1 flex-wrap mb-2">
                <span class="cat-badge cat-badge-brand">{{ $producto->consola }}</span>
                <span class="cat-badge cat-badge-state">{{ ucfirst($producto->condicion) }}</span>
            </div>

            <p class="cat-card-title mb-2">{{ $producto->nombre }}</p>

            <div style="height:16px; margin-bottom:4px;">
                @if($producto->porcentaje_descuento > 0)
                    <span class="cat-price-original">
                        ${{ number_format($producto->precio_original, 0, ',', '.') }}
                    </span>
                @endif
            </div>

            <div class="d-flex align-items-baseline gap-2 mb-1">
                <span class="cat-price">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                @if($producto->porcentaje_descuento > 0)
                    <span class="cat-discount">{{ $producto->porcentaje_descuento }}% OFF</span>
                @endif
            </div>

            <div class="cat-installments mt-auto pt-2">
                6 cuotas de ${{ number_format($producto->precio / 6, 0, ',', '.') }}
            </div>

            @if($producto->stock == 0)
                <div class="cat-sin-stock-badge">
                    <i class="bi bi-x-circle-fill" style="font-size:10px;"></i> Sin stock
                </div>
            @endif

        </div>
    </div>
</a>