<div class="card border-0 shadow-sm h-100 text-decoration-none w-100" 
     style="transition: box-shadow 0.3s; cursor: pointer;" 
     onmouseover="this.classList.replace('shadow-sm', 'shadow')" 
     onmouseout="this.classList.replace('shadow', 'shadow-sm')">
    
    <div class="d-flex align-items-center justify-content-center p-3 border-bottom bg-white" style="height: 220px;">
        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->titulo }}" class="img-fluid" style="max-height: 100%; object-fit: contain;">
    </div>

    <div class="card-body p-3 d-flex flex-column">
        
        <div class="d-flex gap-1 mb-2">
            <span class="badge bg-dark text-light fw-normal" style="font-size: 0.7rem;">
                {{ $producto->consola }}
            </span>
            <span class="badge bg-light text-secondary border fw-normal" style="font-size: 0.7rem;">
                {{ $producto->estado }}
            </span>
        </div>
        
        <p class="card-title text-dark fw-bold text-truncate mb-1" style="font-size: 1rem;">
            {{ $producto->titulo }}
        </p>

        <div style="height: 20px;">
            @if($producto->porcentaje_descuento > 0)
                <small class="text-muted text-decoration-line-through" style="font-size: 0.8rem;">
                    $ {{ number_format($producto->precio_original, 0, ',', '.') }}
                </small>
            @endif
        </div>

        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="fs-4 text-dark mb-0">
                $ {{ number_format($producto->precio, 0, ',', '.') }}
            </span>
            
            @if($producto->porcentaje_descuento > 0)
                <span class="text-success small fw-medium">
                    {{ $producto->porcentaje_descuento }}% OFF
                </span>
            @endif
        </div>

        <div class="text-dark small mb-4">
            6 cuotas de $ {{ number_format($producto->precio / 6, 0, ',', '.') }}
        </div>
        
        <button class="btn w-100 mt-auto rounded-pill text-white fw-bold py-2" style="background-color: #ff007f;">
            Añadir al carrito
        </button>

    </div>
</div>