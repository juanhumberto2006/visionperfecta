<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ruta principal redirige a la tienda
Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');

Auth::routes();

// Rutas de administración
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// Rutas de la tienda
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/catalog', [App\Http\Controllers\ShopController::class, 'catalog'])->name('shop.catalog');
Route::get('/shop/category/{id}', [App\Http\Controllers\ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'product'])->name('shop.product');
Route::get('/shop/search', [App\Http\Controllers\ShopController::class, 'search'])->name('shop.search');

// Rutas del carrito
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

// Rutas de checkout
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/paypal', [App\Http\Controllers\CheckoutController::class, 'paypal'])->name('checkout.paypal');
Route::get('/checkout/complete', [App\Http\Controllers\CheckoutController::class, 'complete'])->name('checkout.complete');
Route::get('/checkout/factura/{referencia}', [App\Http\Controllers\CheckoutController::class, 'descargarFactura'])->name('checkout.factura')->middleware('auth');


//rutas para categorias
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth');
//rutas para crear categorias
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create')->middleware('auth');
//rutas para guardar categorias
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store')->middleware('auth');
//rutas para mostrar categorias
Route::get('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show')->middleware('auth');
//rutas para editar categorias
Route::get('/admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit')->middleware('auth');
//rutas para actualizar categorias
Route::put('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update')->middleware('auth');
//rutas para eliminar categorias
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('auth');



//rutas para sucursales
Route::get('/admin/sucursales', [App\Http\Controllers\SucursalController::class, 'index'])->name('sucursales.index')->middleware('auth');
//rutas para crear sucursales
Route::get('/admin/sucursales/create', [App\Http\Controllers\SucursalController::class, 'create'])->name('sucursales.create')->middleware('auth');
//rutas para guardar sucursales
Route::post('/admin/sucursales/create', [App\Http\Controllers\SucursalController::class, 'store'])->name('sucursales.store')->middleware('auth');
//rutas para mostrar sucursales
Route::get('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'show'])->name('sucursales.show')->middleware('auth');
//rutas para editar sucursales
Route::get('/admin/sucursales/{id}/edit', [App\Http\Controllers\SucursalController::class, 'edit'])->name('sucursales.edit')->middleware('auth');
//rutas para actualizar sucursales
Route::put('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'update'])->name('sucursales.update')->middleware('auth');
//rutas para eliminar sucursales
Route::delete('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'destroy'])->name('sucursales.destroy')->middleware('auth');




//rutas para productos
Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index')->middleware('auth');
//rutas para crear productos
Route::get('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create')->middleware('auth');
//rutas para guardar productos
Route::post('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store')->middleware('auth');
//rutas para mostrar productos
Route::get('/admin/producto/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('producto.show')->middleware('auth');
//rutas para editar productos
Route::get('/admin/producto/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit')->middleware('auth');
//rutas para actualizar productos
Route::put('/admin/producto/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update')->middleware('auth');
//rutas para eliminar productos
Route::delete('/admin/producto/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.destroy')->middleware('auth');





//rutas para proveedores
Route::get('/admin/proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores.index')->middleware('auth');
//rutas para guardar proveedores
Route::post('/admin/proveedor/create', [App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedores.store')->middleware('auth');
//rutas para actualizar proveedores
Route::put('/admin/proveedor/{id}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedores.update')->middleware('auth');
//rutas para eliminar proveedores
Route::delete('/admin/proveedor/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedores.destroy')->middleware('auth');




//ruta para compras
Route::get('/admin/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras.index')->middleware('auth');
//ruta para crear compras
Route::get('/admin/compras/create', [App\Http\Controllers\CompraController::class, 'create'])->name('compras.create')->middleware('auth');
//ruta para guardar compras
Route::post('/admin/compras/create', [App\Http\Controllers\CompraController::class, 'store'])->name('compras.store')->middleware('auth');
//ruta para mostrar compras
Route::get('/admin/compra/{id}/edit', [App\Http\Controllers\CompraController::class, 'edit'])->name('compras.edit')->middleware('auth');
