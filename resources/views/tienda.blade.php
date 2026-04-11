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
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #111;">
    <x-navbar />

    <div class="container-xl py-4 py-md-5 flex-grow-1">
        <div class="row g-4">

            {{-- Sidebar --}}
            <div class="col-12 col-lg-3 d-none d-lg-block">
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
            </div>

        </div>
    </div>

    <x-footer />

    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>--}}
</body>
</html>