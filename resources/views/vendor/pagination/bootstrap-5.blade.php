@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">

        {{-- Mobile: solo anterior/siguiente --}}
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                    </li>
                @endif

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </div>

        {{-- Desktop: contador + números --}}
        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

            {{-- Contador --}}
            <div class="small" style="color: #555;">
                Mostrando
                <span style="color: #aaa;">{{ $paginator->firstItem() }}</span>
                –
                <span style="color: #aaa;">{{ $paginator->lastItem() }}</span>
                de
                <span style="color: #aaa;">{{ $paginator->total() }}</span>
                resultados
            </div>

            {{-- Números de página --}}
            <div>
                <ul class="pagination mb-0">

                    {{-- Anterior --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Páginas --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Siguiente --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    <style>
        .pagination {
            gap: 4px;
        }
        .pagination .page-link {
            background-color: #1a1a1a;
            border-color: #333;
            color: #aaa;
            border-radius: 6px !important;
            transition: all 0.2s;
        }
        .pagination .page-link:hover {
            background-color: #2a2a2a;
            border-color: #555;
            color: #fff;
        }
        .pagination .page-item.active .page-link {
            background-color: #c0392b;
            border-color: #c0392b;
            color: #fff;
        }
        .pagination .page-item.disabled .page-link {
            background-color: #111;
            border-color: #222;
            color: #444;
        }
    </style>
@endif