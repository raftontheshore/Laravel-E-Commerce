<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $categoria !== 'todos' ? ucfirst($categoria) . 's' : 'Catálogo' }} - Catacumbas</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
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
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #111;">
    <x-navbar />

    <div class="container-xl py-4 py-md-5 flex-grow-1">
        <div class="row g-4">

            {{-- Sidebar --}}
            <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                <x-sidebar :categoria="$categoria" />
            </div>

            {{-- Product grid --}}
            <div class="col-12 col-lg-9">

                <div class="row g-4">
                    @forelse($productos as $producto)
                        <div class="col-12 col-md-6 col-xl-4">
                            <x-carta-producto :producto="$producto" />
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-ghost mb-3" style="font-size: 3rem; color: #333;"></i>
                            <h5 style="color: #555; font-weight: 400;">No hay productos en esta sección todavía.</h5>
                        </div>
                    @endforelse
                </div>

                {{-- Paginación --}}
                @if($productos->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        {{ $productos->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-volverArriba />
    <x-footer />
</body>
</html>