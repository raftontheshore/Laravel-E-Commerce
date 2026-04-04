<style>
    /* ── Sidebar ─────────────────────────────────────────────── */
    .cat-sidebar {
        background: #0f0f0f;
        border: 1px solid #222;
        border-radius: 12px;
        padding: 20px;
        font-family: var(--font-sans, system-ui, sans-serif);
    }

    /* Header */
    .cat-sidebar .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #1e1e1e;
    }
    .cat-sidebar .sidebar-header span {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #fff;
    }
    .cat-sidebar .sidebar-header i {
        color: #444;
        cursor: pointer;
        font-size: 13px;
        transition: color 0.15s;
    }
    .cat-sidebar .sidebar-header i:hover { color: #aaa; }

    /* Search */
    .cat-sidebar .sidebar-search {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #1c1c1c;
        border: 1px solid #2e2e2e;
        border-radius: 7px;
        padding: 0 12px;
        margin-bottom: 24px;
        transition: border-color 0.15s;
    }
    .cat-sidebar .sidebar-search:focus-within { border-color: #555; }
    .cat-sidebar .sidebar-search i { color: #444; font-size: 12px; }
    .cat-sidebar .sidebar-search input {
        background: transparent;
        border: none;
        outline: none;
        color: #ccc;
        font-size: 13px;
        padding: 9px 0;
        width: 100%;
    }
    .cat-sidebar .sidebar-search input::placeholder { color: #444; }

    /* Section label */
    .cat-sidebar .filter-label {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #555;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .cat-sidebar .filter-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #1e1e1e;
    }

    .cat-sidebar .filter-section { margin-bottom: 22px; }

    /* Pills — inactive */
    .cat-sidebar .filter-pill {
        display: inline-block;
        font-size: 12px;
        padding: 5px 13px;
        border-radius: 6px;
        border: 1px solid #2a2a2a;
        background: #161616;
        color: #888;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
        white-space: nowrap;
    }
    .cat-sidebar .filter-pill:hover {
        background: #1e1e1e;
        color: #ddd;
        border-color: #444;
    }

    /* Pills — active */
    .cat-sidebar .filter-pill.active {
        background: #c0392b;
        border-color: #c0392b;
        color: #fff;
        font-weight: 500;
    }
    .cat-sidebar .filter-pill.active:hover {
        background: #e74c3c;
        border-color: #e74c3c;
    }

    /* Price inputs */
    .cat-sidebar .price-input {
        background: #1c1c1c;
        border: 1px solid #2a2a2a;
        border-radius: 7px;
        color: #ccc;
        font-size: 12px;
        padding: 8px 10px;
        text-align: center;
        outline: none;
        width: 100%;
        transition: border-color 0.15s;
        -moz-appearance: textfield;
    }
    .cat-sidebar .price-input::-webkit-outer-spin-button,
    .cat-sidebar .price-input::-webkit-inner-spin-button { -webkit-appearance: none; }
    .cat-sidebar .price-input:focus { border-color: #555; }
    .cat-sidebar .price-input::placeholder { color: #3a3a3a; }

    .cat-sidebar .price-sep {
        color: #333;
        font-size: 13px;
        flex-shrink: 0;
    }
</style>

<aside class="cat-sidebar">

    {{-- Header --}}
    <div class="sidebar-header">
        <span>Filtrar</span>
        <i class="fas fa-times"></i>
    </div>

    {{-- Search --}}
    <div class="sidebar-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar...">
    </div>

    {{-- Categoría --}}
    <div class="filter-section">
        <div class="filter-label">Categoría</div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ url('/tienda/consola') }}"
               class="filter-pill {{ (strtolower($categoria) == 'consola' || strtolower($categoria) == 'todos') ? 'active' : '' }}">
                Consolas
            </a>
            <a href="{{ url('/tienda/juego') }}"
               class="filter-pill {{ strtolower($categoria) == 'juego' ? 'active' : '' }}">
                Juegos
            </a>
            <a href="{{ url('/tienda/accesorio') }}"
               class="filter-pill {{ strtolower($categoria) == 'accesorio' ? 'active' : '' }}">
                Accesorios
            </a>
        </div>
    </div>

    {{-- Marca (consolas) --}}
    @if(strtolower($categoria) == 'consola' || strtolower($categoria) == 'todos')
    <div class="filter-section">
        <div class="filter-label">Marca</div>
        <div class="d-flex flex-wrap gap-2">
            <button class="filter-pill">Sony</button>
            <button class="filter-pill">Nintendo</button>
            <button class="filter-pill">Sega</button>
            <button class="filter-pill">Microsoft</button>
        </div>
    </div>
    @endif

    {{-- Consola (juegos) --}}
    @if(strtolower($categoria) == 'juego')
    <div class="filter-section">
        <div class="filter-label">Consola</div>
        <div class="d-flex flex-wrap gap-2">
            <button class="filter-pill">NES</button>
            <button class="filter-pill">SNES</button>
            <button class="filter-pill">Sega Genesis</button>
            <button class="filter-pill">PS1</button>
            <button class="filter-pill">PS2</button>
        </div>
    </div>
    @endif

    {{-- Condición --}}
    <div class="filter-section">
        <div class="filter-label">Condición</div>
        <div class="d-flex flex-wrap gap-2">
            <button class="filter-pill">Nuevo</button>
            <button class="filter-pill">Usado</button>
            <button class="filter-pill">Reacondicionado</button>
        </div>
    </div>

    {{-- Ordenar por --}}
    <div class="filter-section">
        <div class="filter-label">Ordenar por</div>
        <div class="d-flex flex-wrap gap-2">
            <button class="filter-pill active">Popularidad</button>
            <button class="filter-pill">Más nuevo</button>
            <button class="filter-pill">Más viejo</button>
            <button class="filter-pill">Mayor precio</button>
            <button class="filter-pill">Menor precio</button>
        </div>
    </div>

    {{-- Rango de precio --}}
    <div class="filter-section mb-0">
        <div class="filter-label">Rango de precio</div>
        <div class="d-flex align-items-center gap-2">
            <input type="number" class="price-input" placeholder="Mín">
            <span class="price-sep">—</span>
            <input type="number" class="price-input" placeholder="Máx">
        </div>
    </div>

</aside>