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
<body class="d-flex flex-column min-vh-100 bg-light">
    <div class="container-xl py-4 py-md-5 flex-grow-1">
        <div class="row">
            
            <div class="col-12 col-lg-3 d-none d-lg-block">
                <x-sidebar :categoria="$categoria" />
            </div>

            <div class="col-12 col-lg-9">
                <div class="row g-4">
                    @forelse($productos as $producto)
                        <div class="col-12 col-md-6 col-lg-4">
                            <x-carta-producto :producto="$producto" />
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-ghost text-muted mb-3" style="font-size: 3rem;"></i>
                            <h4 class="text-muted fw-light">No hay productos en esta sección todavía.</h4>
                        </div>
                    @endforelse
                </div>
            </div>
            
        </div>
    </div>
    
    <x-footer />
</body>
</html>