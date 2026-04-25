/* --- No está en uso */

<div class="slider-card">
    <div class="card border-0 h-100 position-relative rounded-4 overflow-hidden shadow" 
         style="background-color: #1e1e1e; min-height: 350px; cursor: pointer; transition: transform 0.2s ease-in-out;" 
         onmouseover="this.style.transform='scale(1.03)'" 
         onmouseout="this.style.transform='scale(1)'">
        
        <img src="{{ $producto->imagen_url }}" class="card-img h-100" style="object-fit: cover; min-height: 350px;" alt="{{ $producto->titulo }}">
        
        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(18,18,18,1) 0%, rgba(18,18,18,0) 100%);">
            <h6 class="text-white fw-semibold mb-0 text-truncate">{{ $producto->titulo }}</h6>
            <div class="d-flex align-items-center gap-2 mt-1">
                <span class="text-light fw-bold">$ {{ number_format($producto->precio, 0, ',', '.') }}</span>
                
                @if($producto->precio_original > $producto->precio)
                    <small class="text-white-50 text-decoration-line-through" style="font-size: 0.75rem;">
                        $ {{ number_format($producto->precio_original, 0, ',', '.') }}
                    </small>
                @endif
            </div>
        </div>

        @if(strtolower($producto->categoria) === 'combo')
            <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark fs-6 fw-bold shadow text-uppercase">
                Combo
            </span>
        @elseif($producto->porcentaje_descuento > 0)
            <span class="position-absolute top-0 start-0 m-3 badge bg-danger fs-6 fw-bold shadow text-uppercase">
                Oferta -{{ $producto->porcentaje_descuento }}%
            </span>
        @endif
        
    </div>
</div>