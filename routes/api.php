<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\JwtController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/signup', [JwtController::class, 'register']);
    Route::post('/signin', [JwtController::class, 'login']);
    Route::get('/user', [JwtController::class, 'user']);
    Route::post('/token-refresh', [JwtController::class, 'refresh']);
    Route::post('/signout', [JwtController::class, 'signout']);
});
