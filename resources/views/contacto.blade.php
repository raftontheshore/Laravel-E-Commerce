<!DOCTYPE html>
<html lang="es">
<head>
     <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <form action="{{ url('/contacto') }}" method="POST">
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="container mt-4">
    <h2>Formulario de Contacto</h2>
    <form action="{{ url('/contacto') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        
        <!-- Fuerza a pedir un email si o si -->
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <textarea name="mensaje" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
</body>
</html>
