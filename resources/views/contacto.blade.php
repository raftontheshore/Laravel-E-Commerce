<!DOCTYPE html>
<html lang="es">
<head>
     <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="card mt-4">
            <div class="card-body">
                <h2>Formulario de contacto</h2>
                
                <form action="{{ url('/contacto') }}" method="POST"> {{-- aca agregue action --}}
                    
                    @csrf 

                   <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese su nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Ingrese su email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Enviar mensaje
                    </button>
                </form>
            </div>
        </div>
</body>
</html>
