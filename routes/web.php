<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CheckoutController;
use App\Models\Producto;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\TiendaController;

// ============================================================
// RUTAS: Públicas (sin login)
// ============================================================
Route::get('/contacto',  [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'store']);

Route::get('/', function () {
    $productos_destacados = Producto::where('activo', 1)
                                    ->latest()
                                    ->take(4)
                                    ->get();
    $consolas = Producto::where('activo', 1)
                    ->where('tipo_producto', 'consola')
                    ->take(7)
                    ->get();
    return view('welcome', compact('productos_destacados', 'consolas'));
});

Route::get('/producto/{producto}', [ProductoController::class, 'showPublico'])
     ->name('producto.detalle');

Route::get('/tienda', fn() => redirect('/tienda/todos'));
Route::get('/tienda/{categoria?}', [TiendaController::class, 'index']);

Route::get('/sobre-mi',      fn() => view('sobre-mi'));
Route::get('/footer',        fn() => view('footer'));
Route::get('/juegos',        fn() => view('juegos'));
Route::get('/consolas',      fn() => view('consolas'));
Route::get('/nosotros',      fn() => view('nosotros'));
Route::get('/terminos',      fn() => view('terminos'));
Route::get('/privacidad',    fn() => view('privacidad'));
Route::get('/construccion',  fn() => view('construccion'));
Route::get('/faq',           fn() => view('faq'));

Route::get('/explorar', function () {
    $nuevos_productos = Producto::where('activo', 1)->where('condicion', 'nuevo')->get();
    $ofertas_juegos   = Producto::where('activo', 1)->where('porcentaje_descuento', '>', 0)
                                ->whereHas('categoria', fn($q) => $q->where('nombre', 'like', '%juego%'))
                                ->get();
    return view('explorar', compact('nuevos_productos', 'ofertas_juegos'));
});

// ============================================================
// RUTAS: Autenticadas (cualquier usuario logueado)
// ============================================================
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mis-compras', [CompraController::class, 'index'])->name('compras.index');

    Route::get('/compra-confirmada', function () {
        if (!session('total')) {
            return redirect('/');
        }
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');

    // ============================================================
    // RUTAS: Solo CLIENTES
    // ============================================================
    Route::middleware('rol:cliente')->group(function () {

        Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
        Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
        Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
        Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');

        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('/checkout/confirmacion/{id}', [CheckoutController::class, 'confirmacion'])->name('checkout.confirmacion');

    }); // fin rol:cliente

    // ============================================================
    // RUTAS: Solo ADMINS
    // ============================================================
    Route::middleware('rol:admin')->group(function () {

        Route::get('/dashboard', fn() => view('dashboard'))->name('admin.dashboard');

        // Usuarios
        Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
        Route::patch('/admin/usuarios/{user}/rol', [UsuarioController::class, 'toggleRol'])->name('admin.usuarios.rol');
        Route::delete('/admin/usuarios/{user}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');

        // Productos
        Route::get('/admin/productos',                   [ProductoController::class, 'index'])->name('admin.productos.index');
        Route::get('/admin/productos/crear',             [ProductoController::class, 'create'])->name('admin.productos.create');
        Route::post('/admin/productos',                  [ProductoController::class, 'store'])->name('admin.productos.store');
        Route::get('/admin/productos/{producto}',        [ProductoController::class, 'show'])->name('admin.productos.show');
        Route::get('/admin/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('admin.productos.edit');
        Route::patch('/admin/productos/{producto}',      [ProductoController::class, 'update'])->name('admin.productos.update');
        Route::delete('/admin/productos/{producto}',     [ProductoController::class, 'destroy'])->name('admin.productos.destroy');

        // Categorías
        Route::get('/admin/categorias',                  [CategoriaController::class, 'index'])->name('admin.categorias.index');
        Route::post('/admin/categorias',                 [CategoriaController::class, 'store'])->name('admin.categorias.store');
        Route::patch('/admin/categorias/{categoria}',    [CategoriaController::class, 'update'])->name('admin.categorias.update');
        Route::delete('/admin/categorias/{categoria}',   [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

        // Pedidos
        Route::get('/admin/pedidos',                     [PedidoController::class, 'index'])->name('admin.pedidos.index');
        Route::get('/admin/pedidos/{orden}',             [PedidoController::class, 'show'])->name('admin.pedidos.show');
        Route::patch('/admin/pedidos/{orden}/estado',    [PedidoController::class, 'updateEstado'])->name('admin.pedidos.estado');

        // Mensajes
        Route::get('/dashboard/mensajes',                [MensajeController::class, 'index'])->name('dashboard.mensajes');
        Route::patch('/dashboard/mensajes/consulta/{id}', [MensajeController::class, 'updateConsulta'])->name('dashboard.mensajes.consulta.update');
        Route::patch('/dashboard/mensajes/contacto/{id}', [MensajeController::class, 'updateContacto'])->name('dashboard.mensajes.contacto.update');
        Route::delete('/dashboard/mensajes/consulta/{id}', [MensajeController::class, 'destroyConsulta'])->name('dashboard.mensajes.consulta.destroy');
        Route::delete('/dashboard/mensajes/contacto/{id}', [MensajeController::class, 'destroyContacto'])->name('dashboard.mensajes.contacto.destroy');

    }); // fin rol:admin

}); // fin auth

require __DIR__.'/auth.php';