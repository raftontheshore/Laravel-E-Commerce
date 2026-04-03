<aside class="pe-lg-4 bg-white p-4 rounded-4 shadow-sm" style="font-family: system-ui, -apple-system, sans-serif;">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="fw-semibold mb-0 text-dark" style="font-size: 0.85rem; letter-spacing: 0.5px;">FILTRAR</h6>
        <i class="fas fa-times text-muted" style="cursor: pointer;"></i>
    </div>

    <div class="mb-4">
        <div class="input-group border rounded-3 overflow-hidden">
            <span class="input-group-text bg-white border-0 text-muted ps-3">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" class="form-control border-0 shadow-none ps-2" placeholder="Buscar..." style="font-size: 0.9rem;">
        </div>
    </div>

    <div class="mb-4">
        <h6 class="fw-semibold mb-3 text-dark" style="font-size: 0.8rem; letter-spacing: 0.5px;">CATEGORÍA</h6>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ url('/tienda/consola') }}" class="btn rounded-pill px-3 py-1 {{ (strtolower($categoria) == 'consola' || strtolower($categoria) == 'todos') ? 'text-white border-0' : 'btn-outline-secondary text-dark border' }}" style="{{ (strtolower($categoria) == 'consola' || strtolower($categoria) == 'todos') ? 'background-color: #6c5ce7;' : '' }} font-size: 0.85rem;">
                Consolas
            </a>
            
            <a href="{{ url('/tienda/juego') }}" class="btn rounded-pill px-3 py-1 {{ strtolower($categoria) == 'juego' ? 'text-white border-0' : 'btn-outline-secondary text-dark border' }}" style="{{ strtolower($categoria) == 'juego' ? 'background-color: #6c5ce7;' : '' }} font-size: 0.85rem;">
                Juegos
            </a>

            <a href="{{ url('/tienda/accesorio') }}" class="btn rounded-pill px-3 py-1 {{ strtolower($categoria) == 'accesorio' ? 'text-white border-0' : 'btn-outline-secondary text-dark border' }}" style="{{ strtolower($categoria) == 'accesorio' ? 'background-color: #6c5ce7;' : '' }} font-size: 0.85rem;">
                Accesorios
            </a>
        </div>
    </div>

    @if(strtolower($categoria) == 'consola' || strtolower($categoria) == 'todos')
    <div class="mb-4">
        <h6 class="fw-semibold mb-3 text-dark" style="font-size: 0.8rem; letter-spacing: 0.5px;">MARCA</h6>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Sony</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Nintendo</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Sega</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Microsoft</button>
        </div>
    </div>
    @endif

    @if(strtolower($categoria) == 'juego')
    <div class="mb-4">
        <h6 class="fw-semibold mb-3 text-dark" style="font-size: 0.8rem; letter-spacing: 0.5px;">CONSOLA</h6>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">NES</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">SNES</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Sega Genesis</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">PS1</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">PS2</button>
        </div>
    </div>
    @endif

    <div class="mb-4">
        <h6 class="fw-semibold mb-3 text-dark" style="font-size: 0.8rem; letter-spacing: 0.5px;">CONDICIÓN</h6>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Nuevo</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Usado</button>
            <button class="btn btn-outline-secondary text-dark border rounded-pill px-3 py-1" style="font-size: 0.85rem;">Reacondicionado</button>
        </div>
    </div>

    <div class="mb-4">
        <h6 class="fw-semibold mb-3 text-dark" style="font-size: 0.8rem; letter-spacing: 0.5px;">ORDENAR POR</h6>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn text-white rounded-3 px-3 py-1" style="background-color: #6c5ce7; font-size: 0.85rem;">Popularidad</button>
            <button class="btn btn-outline-secondary text-dark border rounded-3 px-3 py-1" style="font-size: 0.85rem;">Más nuevo</button>
            <button class="btn btn-outline-secondary text-dark border rounded-3 px-3 py-1" style="font-size: 0.85rem;">Más viejo</button>
            <button class="btn btn-outline-secondary text-dark border rounded-3 px-3 py-1" style="font-size: 0.85rem;">Mayor precio</button>
            <button class="btn btn-outline-secondary text-dark border rounded-3 px-3 py-1" style="font-size: 0.85rem;">Menor precio</button>
        </div>
    </div>

    <div class="mb-2">
        <h6 class="fw-semibold mb-3 text-dark" style="font-size: 0.8rem; letter-spacing: 0.5px;">RANGO DE PRECIO</h6>
        <div class="row g-2">
            <div class="col-6">
                <input type="number" class="form-control rounded-3 border text-center text-muted shadow-none" placeholder="Min Precio" style="font-size: 0.85rem; padding-top: 0.6rem; padding-bottom: 0.6rem;">
            </div>
            <div class="col-6">
                <input type="number" class="form-control rounded-3 border text-center text-muted shadow-none" placeholder="Max Precio" style="font-size: 0.85rem; padding-top: 0.6rem; padding-bottom: 0.6rem;">
            </div>
        </div>
    </div>

</aside>