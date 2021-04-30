<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DelegateController;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Delegate;

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



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        $customers = Customer::count();
        $delegates = Delegate::count();
        return view('dashboard.index', compact('customers', 'delegates'));
    });
    Route::resource('companies', CompanyController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('delegates', DelegateController::class);
    Route::resource('users', UserController::class);
    Route::post('profile', [UserController::class, 'profile'])->name('profile');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');