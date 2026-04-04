<a href="#" class="text-decoration-none d-block h-100">
<div class="cat-product-card h-100">

    {{-- Image area --}}
    <div class="cat-card-img">
        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->titulo }}">
    </div>

    {{-- Body --}}
    <div class="cat-card-body">

        {{-- Badges --}}
        <div class="d-flex gap-2 mb-2">
            <span class="cat-badge cat-badge-brand">{{ $producto->consola }}</span>
            <span class="cat-badge cat-badge-state">{{ $producto->estado }}</span>
        </div>

        {{-- Title --}}
        <p class="cat-card-title text-truncate mb-1">{{ $producto->titulo }}</p>

        {{-- Original price --}}
        <div style="height: 18px; margin-bottom: 4px;">
            @if($producto->porcentaje_descuento > 0)
                <span class="cat-price-original">
                    $ {{ number_format($producto->precio_original, 0, ',', '.') }}
                </span>
            @endif
        </div>

        {{-- Price + discount --}}
        <div class="d-flex align-items-baseline gap-2 mb-1">
            <span class="cat-price">$ {{ number_format($producto->precio, 0, ',', '.') }}</span>
            @if($producto->porcentaje_descuento > 0)
                <span class="cat-discount">{{ $producto->porcentaje_descuento }}% OFF</span>
            @endif
        </div>

        {{-- Installments --}}
        <div class="cat-installments mb-4">
            6 cuotas de $ {{ number_format($producto->precio / 6, 0, ',', '.') }}
        </div>

        {{-- CTA --}}
        <button class="cat-btn-cart mt-auto">
            <i class="fas fa-shopping-cart" style="font-size: 12px;"></i>
            Añadir al carrito
        </button>
    </div>
</div>
</a>

<style>
    .cat-product-card {
        background: #161616;
        border: 1px solid #222;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: border-color 0.2s, transform 0.2s;
        cursor: pointer;
    }
    .cat-product-card:hover {
        border-color: #3a3a3a;
        transform: translateY(-2px);
    }

    .cat-card-img {
        background: #1a1a1a;
        border-bottom: 1px solid #222;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }
    .cat-card-img img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .cat-card-body {
        padding: 14px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    /* Badges */
    .cat-badge {
        font-size: 11px;
        font-weight: 500;
        padding: 3px 8px;
        border-radius: 5px;
        line-height: 1.4;
    }
    .cat-badge-brand {
        background: #c0392b;
        color: #fff;
    }
    .cat-badge-state {
        background: #252525;
        color: #888;
        border: 1px solid #333;
    }

    /* Title */
    .cat-card-title {
        font-size: 15px;
        font-weight: 600;
        color: #e8e8e8;
        margin: 0;
    }

    /* Pricing */
    .cat-price-original {
        font-size: 12px;
        color: #444;
        text-decoration: line-through;
    }
    .cat-price {
        font-size: 22px;
        font-weight: 600;
        color: #fff;
        line-height: 1;
    }
    .cat-discount {
        font-size: 12px;
        font-weight: 600;
        color: #2ecc71;
    }
    .cat-installments {
        font-size: 12px;
        color: #555;
    }

    /* Button */
    .cat-btn-cart {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
        background: #c0392b;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.15s;
        margin-top: auto;
    }
    .cat-btn-cart:hover { background: #e74c3c; }
</style>