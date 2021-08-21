<?php

use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\CompanyApiController;
use App\Http\Controllers\API\V2\Auth\LoginController;
use App\Http\Controllers\API\V2\EmployeeApiController;
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

// API V1
Route::group([
    'as' =>         'api.v1.',
    'prefix' =>     'v1',
], function () {
    // API V1 AuthController
    // Route::post('register', [AuthController::class, 'register'])->name('auth.register'); // Disabled
    Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('auth/token-refresh', [AuthController::class, 'tokenRefresh'])->name('auth.token-refresh');
    Route::get('user-profile', [AuthController::class, 'userProfile'])->name('user-profile');

    // CompanyApiController
    Route::get('company', [CompanyApiController::class, 'showCompany'])->name('company.show');
    Route::get('company-employees', [CompanyApiController::class, 'getCompanyEmployees'])->name('company-employees');
});

// API V2
Route::group([
    'as' =>         'api.v2.',
    'prefix' =>     'v2',
], function () {
    // API V2 LoginController
    Route::post('auth/login-user', [LoginController::class, 'loginUser'])->name('auth.login-user');
    Route::post('auth/login-employee', [LoginController::class, 'loginEmployee'])->name('auth.login-employee');
    Route::get('employee-profile', [LoginController::class, 'employeeProfile'])->name('employee-profile');

    // EmployeeApiController
    Route::get('employee-company', [EmployeeApiController::class, 'employeeCompany'])->name('employee-company');
});
