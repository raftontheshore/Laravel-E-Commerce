{{--
    ============================================================
    COMPONENTE: Sidebar de Filtros (cat-sidebar)
    ------------------------------------------------------------
    Panel lateral del catálogo de productos. Permite filtrar
    por categoría, marca, condición, orden y rango de precio.
    Recibe: $categoria (string con la categoría activa actual)

    Secciones actualmente desactivadas (comentadas en HTML):
      - Header con botón de cerrar
      - Buscador de texto
      - Filtro por marca / consola (condicional por $categoria)
      - Filtro por condición
      - Ordenar por
      - Rango de precio
    ============================================================
--}}

<style>
    /* --- Contenedor principal del sidebar ---
       Fondo levemente más claro que el negro base para diferenciarse
       del fondo de página, con borde y esquinas redondeadas. */
    .cat-sidebar {
        background: #181818;
        border: 1px solid #303030;
        border-radius: 12px;
        padding: 20px;
        font-family: var(--font-sans, system-ui, sans-serif);
    }

    /* --- Encabezado del sidebar ---
       Título a la izquierda y un ícono de cerrar (×) a la derecha.
       border-bottom separa visualmente el header del contenido. */
    .cat-sidebar .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #2a2a2a;
    }
    .cat-sidebar .sidebar-header span {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.8px;
        text-transform: uppercase;
        color: #fff;
    }
    /* Ícono de cerrar: aclara en hover como feedback visual */
    .cat-sidebar .sidebar-header i {
        color: #555;
        cursor: pointer;
        font-size: 13px;
        transition: color 0.15s;
    }
    .cat-sidebar .sidebar-header i:hover { color: #ccc; }

    /* --- Buscador interno del sidebar ---
       :focus-within ilumina el borde cuando el input está enfocado,
       sin necesidad de JS. */
    .cat-sidebar .sidebar-search {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #222;
        border: 1px solid #333;
        border-radius: 7px;
        padding: 0 12px;
        margin-bottom: 24px;
        transition: border-color 0.15s;
    }
    .cat-sidebar .sidebar-search:focus-within { border-color: #666; }
    .cat-sidebar .sidebar-search i { color: #555; font-size: 12px; }
    .cat-sidebar .sidebar-search input {
        background: transparent;
        border: none;
        outline: none;
        color: #ddd;
        font-size: 13px;
        padding: 9px 0;
        width: 100%;
    }
    .cat-sidebar .sidebar-search input::placeholder { color: #555; }

    /* --- Etiqueta de sección (ej: "Categoría", "Marca") ---
       El ::after dibuja una línea horizontal que se estira para
       ocupar el espacio restante, como un separador integrado. */
    .cat-sidebar .filter-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #888;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .cat-sidebar .filter-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #2a2a2a;
    }

    /* Espaciado uniforme entre secciones de filtro */
    .cat-sidebar .filter-section { margin-bottom: 22px; }

    /* --- Pills de filtro (inactivas) ---
       Estilo discreto con fondo oscuro. white-space: nowrap evita
       que el texto se parta en dos líneas. */
    .cat-sidebar .filter-pill {
        display: inline-block;
        font-size: 12px;
        padding: 5px 13px;
        border-radius: 6px;
        border: 1px solid #383838;
        background: #222;
        color: #aaa;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
        white-space: nowrap;
    }
    .cat-sidebar .filter-pill:hover {
        background: #2a2a2a;
        color: #fff;
        border-color: #555;
    }
    /* --- Pills de filtro (activas) ---
       Rojo de marca tanto en fondo como en borde para resaltar
       la selección actual. */
    .cat-sidebar .filter-pill.active {
        background: #c0392b;
        border-color: #c0392b;
        color: #fff;
        font-weight: 600;
    }
    .cat-sidebar .filter-pill.active:hover {
        background: #e74c3c;
        border-color: #e74c3c;
    }

    /* --- Inputs de rango de precio ---
       -moz-appearance y -webkit-appearance eliminan las flechas
       nativas de los inputs numéricos en Firefox y Chrome/Safari. */
    .cat-sidebar .price-input {
        background: #222;
        border: 1px solid #333;
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
    .cat-sidebar .price-input:focus { border-color: #666; }
    .cat-sidebar .price-input::placeholder { color: #444; }

    /* Guión separador entre los inputs de precio mínimo y máximo */
    .cat-sidebar .price-sep {
        color: #444;
        font-size: 13px;
        flex-shrink: 0;
    }
</style>

<aside class="cat-sidebar">

    {{-- ── Buscador de texto (actualmente desactivado) ──────────────
    --}}
    <!--
    <div class="sidebar-header">
        <span>Filtrar</span>
        <i class="fas fa-times"></i>
    </div>
    <div class="sidebar-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar...">
    </div>
    -->

    {{-- Filtro por categoría. Marca como 'active' la pill que coincide
         con $categoria; 'consola' y 'todos' comparten el mismo estado activo. --}}
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

    {{-- ── Filtros adicionales (actualmente desactivados) ───────────
         Incluyen: Marca/Consola (condicional por $categoria),
         Condición, Ordenar por, y Rango de precio.
    --}}
    <!--
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

    <div class="filter-section">
        <div class="filter-label">Condición</div>
        <div class="d-flex flex-wrap gap-2">
            <button class="filter-pill">Nuevo</button>
            <button class="filter-pill">Usado</button>
            <button class="filter-pill">Reacondicionado</button>
        </div>
    </div>

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

    <div class="filter-section mb-0">
        <div class="filter-label">Rango de precio</div>
        <div class="d-flex align-items-center gap-2">
            <input type="number" class="price-input" placeholder="Mín">
            <span class="price-sep">—</span>
            <input type="number" class="price-input" placeholder="Máx">
        </div>
    </div>
    -->

</aside>