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
        
        <p class="card-title text-muted fw-light text-truncate mb-1" style="font-size: 0.9rem;">
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

        <div class="text-dark small mb-2">
            6 cuotas de $ {{ number_format($producto->precio / 6, 0, ',', '.') }}
        </div>

        <div class="d-flex flex-column mt-auto">
            <span class="text-success small" style="font-weight: 600;">
                Envío gratis
            </span>
            
            @if($producto->es_internacional)
                <span class="text-muted small fst-italic d-flex align-items-center gap-1 mt-1" style="font-size: 0.75rem;">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Internacional
                </span>
            @endif
        </div>

    </div>
</div>