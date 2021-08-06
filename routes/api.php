<?php

use App\Http\Controllers\API\V1\Auth\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Language
Route::group(['prefix' => '{lang?}', 'where' => ['lang' => '[a-zA-Z]{2}']], function () {

    Route::group([
        'middleware' => 'api',
        'as' =>         'api.v1.auth.',
        'prefix' =>     'v1/auth',
    ], function () {
        // Route::post('register', [AuthController::class, 'register'])->name('register'); // Disabled
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('token-refresh', [AuthController::class, 'tokenRefresh'])->name('token-refresh');
    });

    Route::group([
        'middleware' => 'api',
        'as' =>         'api.v1.',
        'prefix' =>     'v1',
    ], function () {
        Route::get('user-profile', [AuthController::class, 'userProfile'])->name('user-profile');
    });
});
