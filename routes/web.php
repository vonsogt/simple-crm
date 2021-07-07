<?php

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Redirect route /home to /admin
Route::redirect('/home', '/admin');
// Disable auth register
Auth::routes(['register' => false]);

// Route group for prefix admin
Route::group([
    'prefix' =>     'admin',
    'as' =>         'admin.',
    'middleware' => 'auth',
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('employee', EmployeeController::class);

    Route::resource('company', CompanyController::class);
    // Route::get('company/send-notification', [CompanyController::class, 'sendRegisteredNotification']);

});
