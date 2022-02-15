<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;

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
Route::view('/', 'index')->name('index');
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/contact', 'contact')->name('contact');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/countries', [Admin\CountryController::class, 'index'])->name('admin.countries');
    Route::get('/countries/create', [Admin\CountryController::class, 'create'])->name('admin.countries.create');
    Route::get('/countries/{country}/edit', [Admin\CountryController::class, 'edit'])->name('admin.countries.edit');

    Route::get('/payment-options', [Admin\PaymentOptionController::class, 'index'])->name('admin.payment-options');
    Route::get('/payment-options/create', [Admin\PaymentOptionController::class, 'create'])->name('admin.payment-options.create');
    Route::get('/payment-options/{paymentOption}/edit', [Admin\PaymentOptionController::class, 'edit'])->name('admin.payment-options.edit');

    Route::get('/plans', [Admin\PlanController::class, 'index'])->name('admin.plans');
    Route::get('/plans/create', [Admin\PlanController::class, 'create'])->name('admin.plans.create');
    Route::get('/plans/{plan}/edit', [Admin\PlanController::class, 'edit'])->name('admin.plans.edit');

    Route::get('/companies', [Admin\CompanyController::class, 'index'])->name('admin.companies');
    Route::get('/companies/create', [Admin\CompanyController::class, 'create'])->name('admin.companies.create');
    Route::get('/companies/{company}/edit', [Admin\CompanyController::class, 'edit'])->name('admin.companies.edit');
});
