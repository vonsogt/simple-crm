<?php

use App\Http\Controllers\Admin\API\V1\CompanyController as V1CompanyController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PreferenceController;
use App\Http\Controllers\Admin\TranslationController;
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
Route::redirect('/home', '/admin');

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

    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);

    // Import
    Route::post('company-import-excel', [CompanyController::class, 'importExcel'])->name('company.import-excel');
    Route::post('employee-import-excel', [EmployeeController::class, 'importExcel'])->name('employee.import-excel');

    // Admin's preference route
    Route::get('preferences', [PreferenceController::class, 'index'])->name('preference.index');
    Route::put('preferences/{user}', [PreferenceController::class, 'update'])->name('preference.update');

    // Translations
    Route::get('translation', [TranslationController::class, 'index'])->name('translation.index');
    Route::get('translation/{id}', [TranslationController::class, 'show'])->name('translation.show');

    // API V1 routes
    Route::group([
        'prefix' =>     'api/v1/',
        'as' =>         'api.v1.',
    ], function () {
        Route::get('company-options', [V1CompanyController::class, 'companyOptions'])->name('company-options');
    });
});
