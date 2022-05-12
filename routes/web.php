<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\EvolucionCanalController;
use App\Http\Controllers\OrdenesHistoricoController;
use App\Http\Controllers\PerformanceMensualController;
use App\Http\Controllers\PublicacionesPausadasController;
use App\Http\Controllers\RankingConversionController;
use App\Http\Controllers\RankingVentasController;
use App\Http\Controllers\VentasMarcaController;
use Illuminate\Routing\RouteGroup;
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

Route::get('/', HomeController::class)->middleware(['auth'])->name('inicio');

/* APANEL */

Route::controller(SellerController::class)->group(function(){
    Route::get('/apanel/sellers', 'index')->middleware(['auth'])->name('sellers.index');
    Route::get('/apanel/sellers/crear', 'create')->middleware(['auth'])->name('sellers.create');
    Route::get('/apanel/sellers/{id}/update', 'update')->middleware(['auth'])->name('sellers.update');
    Route::get('/apanel/dashboard/{id}', 'show')->middleware(['auth'])->name('sellers.show');
});

Route::controller(PublicacionesController::class)->group(function(){
    Route::get('/apanel/publicaciones', 'index')->middleware(['auth'])->name('publicaciones.index');
    Route::get('/apanel/publicaciones/{id}/create', 'create')->middleware(['auth'])->name('publicaciones.create');
    Route::get('/apanel/publicaciones/{id}/update', 'update')->middleware(['auth'])->name('publicaciones.update');
    Route::get('/apanel/publicaciones/{id}', 'show')->middleware(['auth'])->name('publicaciones.show');
});

Route::controller(OrdenesController::class)->group(function(){
    Route::get('/apanel/ordenes', 'index')->middleware(['auth'])->name('ordenes.index');
    Route::get('/apanel/ordenes/{id}/create', 'create')->middleware(['auth'])->name('ordenes.create');
    Route::get('/apanel/ordenes/store', 'store')->middleware(['auth'])->name('ordenes.store');
    Route::get('/apanel/ordenes/{id}/update', 'update')->middleware(['auth'])->name('ordenes.update');
    Route::get('/apanel/ordenes/{id}/delete', 'destroy')->middleware(['auth'])->name('ordenes.delete');
    Route::get('/apanel/ordenes/{id}', 'show')->middleware(['auth'])->name('ordenes.show');
});

Route::controller(EvolucionCanalController::class)->group(function(){
    Route::get('/apanel/evolucion_canal/{id}', 'show')->middleware(['auth'])->name('evolucion_canal.show');
});

Route::controller(RankingVentasController::class)->group(function(){
    Route::get('/apanel/ranking_ventas/{id}', 'show')->middleware(['auth'])->name('ranking_ventas.show');
});

Route::controller(RankingConversionController::class)->group(function(){
    Route::get('/apanel/ranking_conversion/{id}', 'show')->middleware(['auth'])->name('ranking_conversion.show');
});

Route::controller(PublicacionesPausadasController::class)->group(function(){
    Route::get('/apanel/publicaciones_pausadas/{id}', 'show')->middleware(['auth'])->name('publicaciones_pausadas.show');
});

Route::controller(PerformanceMensualController::class)->group(function(){
    Route::get('/apanel/performance_mensual/{id}', 'show')->middleware(['auth'])->name('performance_mensual.show');
});

Route::controller(VentasMarcaController::class)->group(function(){
    Route::get('/apanel/ventas_marca/{id}', 'show')->middleware(['auth'])->name('ventas_marca.show');
});

Route::get('/apanel/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/apanel/fulfilment', function () {
    return view('fulfilment');
})->middleware(['auth'])->name('fulfilment');

Route::get('/apanel/categorias', function () {
    return view('categorias');
})->middleware(['auth'])->name('categorias');

Route::get('/apanel/ranking_productos', function () {
    return view('ranking_productos');
})->middleware(['auth'])->name('ranking_productos');

Route::get('/apanel/ranking_conversion', function () {
    return view('ranking_conversion');
})->middleware(['auth'])->name('ranking_conversion');

Route::get('/apanel/performance_mensual', function () {
    return view('performance_mensual');
})->middleware(['auth'])->name('performance_mensual');

Route::get('/apanel/publicaciones_pausadas', function () {
    return view('publicaciones_pausadas');
})->middleware(['auth'])->name('publicaciones_pausadas');

Route::get('/apanel/evolucion_envios', function () {
    return view('evolucion_envios');
})->middleware(['auth'])->name('evolucion_envios');

Route::get('/apanel/evolucion_canal', function () {
    return view('evolucion_canal');
})->middleware(['auth'])->name('evolucion_canal');

Route::get('/apanel/ventas_marca', function () {
    return view('ventas_marca');
})->middleware(['auth'])->name('ventas_marca');

/* REGISTRO SELLERS */

Route::get('/agregar_seller', function () {
    return view('agregar_seller');
});

Route::get('/pais', function () {
    return view('pais');
});

Route::get('/autenticar/{pais}', function ($pais) {
    return view('autenticar', compact("pais"));
});

require __DIR__.'/auth.php';

