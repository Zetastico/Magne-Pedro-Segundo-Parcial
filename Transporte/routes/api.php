<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalidaController;

use App\Http\Middleware\JwtMiddleware;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('salidas', SalidaController::class);

Route::post('/salidas', [SalidaController::class, 'store'])->middleware(JwtMiddleware::class);
Route::get('/salidas/{id}', [SalidaController::class, 'store']);

Route::put('/salidas/{id}/asientos/{numero}/{salida}', [SalidaController::class, 'update'])->middleware(JwtMiddleware::class);


Route::post('/login', [LoginController::class, 'login']);


