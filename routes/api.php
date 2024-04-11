<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// importar controladores
use App\Http\Controllers\productoController;

// usando el prefijo de api para cada ruta
Route::group([
    'prefix' => '',
], function () {
    Route::resource('/productos', productoController::class);
});