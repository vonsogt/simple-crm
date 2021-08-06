<?php

use App\Http\Controllers\Admin\API\V1\CompanyController as V1CompanyController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController;
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



// Redirect route /home to /admin
// Added language switch feature
Route::redirect('/home', 'en/admin');

Route::redirect('/', '/en');

// Language
Route::group(['prefix' => '{lang?}', 'where' => ['lang' => '[a-zA-Z]{2}']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    // Disable auth register
    Auth::routes(['register' => false]);

    // Route group for prefix admin
    Route::group([
        'prefix' =>     'admin',
        'as' =>         'admin.',
        'middleware' => 'jwt.verify',
    ], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::resource('employee', EmployeeController::class);
        Route::resource('company', CompanyController::class);

        // API V1 routes
        Route::group([
            'prefix' =>     'api/v1/',
            'as' =>         'api.v1.',
        ], function () {
            Route::get('company-options', [V1CompanyController::class, 'companyOptions'])->name('company-options');
        });
    });
});
