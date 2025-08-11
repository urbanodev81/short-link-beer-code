<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Rotas públicas (sem autenticação)
Route::prefix('v1')->group(function () {
    // Rota de status da API
    Route::get('/status', function () {
        return response()->json(['status' => 'API Online']);
    });

    // Rotas de autenticação
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Rotas protegidas (com autenticação)
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    // Rota do usuário autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rotas para ShortLinks (exemplo)
    Route::apiResource('shortlinks', ShortLinkController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
