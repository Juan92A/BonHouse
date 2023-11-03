<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');

    Route::prefix('estado-pedidos')->group(function () {
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('/', [EstadoPedidoController::class, 'index'])->name('estado-pedidos.index');
            Route::get('/create', [EstadoPedidoController::class, 'create'])->name('estado-pedidos.create');
            Route::post('/', [EstadoPedidoController::class, 'store'])->name('estado-pedidos.store');
            Route::get('/{estado_pedido}', [EstadoPedidoController::class, 'show'])->name('estado-pedidos.show');
            Route::get('/{estado_pedido}/edit', [EstadoPedidoController::class, 'edit'])->name('estado-pedidos.edit');
            Route::put('/{estado_pedido}', [EstadoPedidoController::class, 'update'])->name('estado-pedidos.update');
            Route::delete('/{estado_pedido}', [EstadoPedidoController::class, 'destroy'])->name('estado-pedidos.destroy');
        });
    });
});




Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});



//Ruta para cargar la vista de nosotros
Route::view('/nosotros', 'home.nosotros')->name('nosotros');


Route::get('/productos', [FoodController::class, 'index'])->name('food.index');




//esta es la nueva
Route::get('/VerCategorias', [FoodController::class, 'VerCategorias'])->name('food.categorias');


Route::get('/promociones', [HomeController::class, 'promociones'])->name('home.promociones');


Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');


Route::get('/carrito', [CarritoController::class, 'VerCarrito'])->name('home.carrito');
    
Route::post('/carrito/agregar-producto', [CarritoController::class, 'agregarProducto'])->name('carrito.agregarProducto');


Route::post('/carrito/eliminar-producto', 'CarritoController@eliminarProducto')->name('carrito.eliminarProducto');


Route::post('/pago/pagar', 'CarritoController@procesarPago')->name('pago.pagar');

Route::post('/carrito/eliminar-producto', [CarritoController::class, 'eliminarProducto'])->name('carrito.eliminarProducto');


// Route::post('/pedido/procesarPago', [PedidoController::class, 'procesarPedido'])->name('pago.efectivo');

Route::post('/pago/pagar', [PagoController::class, 'pagar'])->name('pago.pagar');

// Route::post('/pedido/procesar', [PedidoController::class, 'procesarPedido'])->name('pedido.procesarPedido');

Route::get('/pedido/procesarPedido', [PedidoController::class, 'procesarPedido'])->name('pedido.procesarPedido');

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Otras rutas...
});


Route::post('/Usuario/Pedido', [AdminController::class, 'pedidos'])->name('usuario.pedidos');

Route::post('/admin/detallePedido', [AdminController::class, 'detallePedido'])->name('admin.detallePedido');

Route::get('/categorias/create', [AdminController::class, 'Addcategoria'])->name('categorias.create');

Route::post('/categorias/agrega', [AdminController::class, 'agregarCategoria'])->name('categorias.agregar');

Route::get('/categorias/editar', [AdminController::class, 'EditCategorias'])->name('categorias.editar');

Route::post('/categorias/cambiarEstado', [AdminController::class, 'cambiarEstadoCategoria'])->name('cambiarEstado');

Route::post('/categorias/editar/{id_categoria}', [AdminController::class, 'showCategory'])->name('categorias.show');

Route::post('/categorias/editar/', [AdminController::class, 'actualizarcategoria'])->name('categorias.update');
Route::get('/users', [AdminController::class, 'listUsers'])->name('users.list');
Route::put('/user/update-role/{user}', [AdminController::class, 'updateRole'])->name('user.updateRole');

// Route::post('/pedido/procesar', [PedidoController::class, 'procesarPedidoT'])->name('pago.index');

// Route::post('/pedido/procesarPedido', [PedidoController::class, 'procesarPedidoT'])->name('pedido.procesarPedidos');


Route::post('/detalle-pedido',  [AdminController::class, 'detallePedido'])->name('detalle.pedido');

Route::post('/agregarproducto', [AdminController::class, 'agregarproducto'])->name('productos.create');

Route::get('/agrega-productos', [AdminController::class, 'ProductosAdd'])->name('productos.add');

Route::get('/admin/productos', [AdminController::class, 'Productos'])->name('admin.productos');

Route::post('/Admin/cambiarEstadoProducto', [AdminController::class, 'cambiarEstadoProducto'])->name('admin.cambiarEstadoProducto');

Route::get('/editar-producto', [AdminController::class, 'editarProducto'])->name('producto.editar');

Route::post('/actualizarproducto', [AdminController::class, 'actualizarproducto'])->name('actualizar.producto');

////se duplica ruta en get para evitar reconstruccion del pedido
Route::post('/Admin/Pedido', [AdminController::class, 'pedidosA'])->name('admin.pedidos');
Route::get('/Admin/Pedido', [AdminController::class, 'pedidosA'])->name('admin.pedidos');

Route::post('/Admin/Pedidos', [AdminController::class, 'cambiarEstado'])->name('admin.cambiarEstado');


Route::get('/usuario/perfil', [AdminController::class, 'perfil'])->name('usuario.perfil');

Route::get('/usuario/editperfil', [AdminController::class, 'perfilE'])->name('usuario.editperfil');

Route::post('/usuario/Editperfil', [AdminController::class, 'actualizarPerfil'])->name('usuario.actualizarPerfil');

Route::get('promociones/add', [AdminController::class, 'PromocionesAdd'])->name('promociones.create');


//*****************evento


Route::get('/eventos', [EventoController::class, 'verEvento'])->name('evento.carrito');
Route::post('/evento/agregar-producto', [EventoController::class, 'agregarProducto'])->name('evento.agregarProducto');

Route::get('/productos/eventos', [FoodController::class, 'indexEvento'])->name('food.evento');
Route::post('/carrito/eliminarProducto', [EventoController::class, 'eliminarProducto'])->name('evento.eliminarProducto');

Route::post('/pago/pagarEventos', [PagoController::class, 'pagarEvento'])->name('pago.evento');
Route::get('/pedido/procesarEvento', [PedidoController::class, 'procesarPedidoEvento'])->name('pedido.procesarEvento');

Route::get('/verEventos', [PedidoController::class, 'verEventos'])->name('pedido.verEventos');

Route::post('/verEventos', [PedidoController::class, 'verEventos'])->name('pedido.verEventos');


Route::post('/Eventos/CambiarEstado', [EventoController::class, 'cambiarEstado'])->name('evento.cambiarEstado');



Route::post('/detalle-evento',  [AdminController::class, 'detalleEvento'])->name('detalle.evento');



///cambio de vista categorias
Route::get('/VerCategorias2', [FoodController::class, 'VerCategorias2'])->name('food.categorias2');


Route::get('/VerCategorias', [FoodController::class, 'VerCategorias'])->name('food.categorias');


Route::get('/borrar', [AdminController::class, 'BorraPedidos'])->name('borrar');