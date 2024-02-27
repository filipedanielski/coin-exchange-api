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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('exchange')
    ->namespace("App\Domains\Exchange\Http\Controllers")
    ->group(app_path('Domains/Exchange/Http/Routes/api.php'));

Route::prefix('wallet')
    ->namespace("App\Domains\Wallet\Http\Controllers")
    ->group(app_path('Domains/Wallet/Http/Routes/api.php'));
