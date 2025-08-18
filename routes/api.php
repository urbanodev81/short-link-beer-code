<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShortLinkController;

// Rotas API com prefixo '/api' automático
Route::prefix('v1')->group(function () {
    // Rota de status
    Route::get('/status', function () {
        return response()->json(['status' => 'API Online']);
    });

    // Rota de login
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/short-links', [ShortLinkController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name('short-links.store');




    // Rotas protegidas (com autenticação)
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
