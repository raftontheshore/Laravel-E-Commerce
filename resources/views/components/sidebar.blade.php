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
{{-- CATEGORÍA --}}
<div class="filter-section">
    <div class="filter-label">Categoría</div>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ url('/tienda/todos') }}"
           class="filter-pill {{ $categoria == 'todos' ? 'active' : '' }}">Todos</a>
        <a href="{{ url('/tienda/consola') }}"
           class="filter-pill {{ $categoria == 'consola' ? 'active' : '' }}">Consolas</a>
        <a href="{{ url('/tienda/videojuego') }}"
           class="filter-pill {{ $categoria == 'videojuego' ? 'active' : '' }}">Juegos</a>
        <a href="{{ url('/tienda/periferico') }}"
           class="filter-pill {{ $categoria == 'periferico' ? 'active' : '' }}">Periféricos</a>
    </div>
</div>

    {{-- CONDICIÓN --}}
    <div class="filter-section">
        <div class="filter-label">Condición</div>
        <div class="d-flex flex-wrap gap-2">
            @foreach(['nuevo' => 'Nuevo', 'usado' => 'Usado', 'reacondicionado' => 'Reacondicionado'] as $val => $label)
                <a href="{{ request()->fullUrlWithQuery(['condicion' => $val]) }}"
                   class="filter-pill {{ request('condicion') == $val ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- CONSOLA/MARCA --}}
    <div class="filter-section">
        <div class="filter-label">Consola</div>
        <div class="d-flex flex-wrap gap-2">
            @foreach(['PS1', 'PS2', 'Nintendo 64', 'Sega Genesis', 'Xbox'] as $consola)
                <a href="{{ request()->fullUrlWithQuery(['consola' => $consola]) }}"
                   class="filter-pill {{ request('consola') == $consola ? 'active' : '' }}">
                    {{ $consola }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- ORDENAR --}}
    <div class="filter-section">
        <div class="filter-label">Ordenar por</div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ request()->fullUrlWithQuery(['orden' => 'nuevo']) }}"
               class="filter-pill {{ request('orden', 'nuevo') == 'nuevo' ? 'active' : '' }}">Más nuevo</a>
            <a href="{{ request()->fullUrlWithQuery(['orden' => 'precio_asc']) }}"
               class="filter-pill {{ request('orden') == 'precio_asc' ? 'active' : '' }}">Menor precio</a>
            <a href="{{ request()->fullUrlWithQuery(['orden' => 'precio_desc']) }}"
               class="filter-pill {{ request('orden') == 'precio_desc' ? 'active' : '' }}">Mayor precio</a>
        </div>
    </div>

    {{-- PRECIO --}}
    <div class="filter-section mb-0">
        <div class="filter-label">Rango de precio</div>
        <form method="GET" action="{{ url('/tienda/' . $categoria) }}">
            @foreach(request()->except(['precio_min', 'precio_max']) as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}">
            @endforeach
            <div class="d-flex align-items-center gap-2">
                <input type="number" name="precio_min" class="price-input"
                       placeholder="Mín" value="{{ request('precio_min') }}">
                <span class="price-sep">—</span>
                <input type="number" name="precio_max" class="price-input"
                       placeholder="Máx" value="{{ request('precio_max') }}">
            </div>
            <button type="submit" class="filter-pill active w-100 mt-2 text-center border-0">
                Aplicar
            </button>
        </form>
    </div>

    {{-- LIMPIAR FILTROS --}}
    @if(request()->hasAny(['condicion', 'consola', 'orden', 'precio_min', 'precio_max']))
    <div class="mt-3">
        <a href="{{ url('/tienda/' . $categoria) }}"
           class="filter-pill w-100 text-center d-block"
           style="color:#e74c3c;border-color:#c0392b;">
            <i class="bi bi-x-circle me-1"></i> Limpiar filtros
        </a>
    </div>
    @endif

</aside>