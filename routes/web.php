<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-api-route', function() {
    return 'Esta rota funciona';
});

Route::get('/short-links/{code}', [ShortLinkController::class, 'show'])
    ->middleware('guest')
    ->name('short-links.show');
