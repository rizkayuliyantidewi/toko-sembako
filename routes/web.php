<?php

use App\Http\Controllers\Backoffice\CustomerController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\ProductCategoryController;
use App\Http\Controllers\Backoffice\ProductController;
use App\Http\Controllers\Backoffice\TransactionController;
use App\Http\Controllers\Landing\PageController;
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

Route::group([
    'as' => 'landing.',
], function() {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/product/detail/{id}', [PageController::class, 'productDetail'])->name('product.detail');
});

Route::get('/blank', function () {
    return view('blank');
});

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);

Route::group([
    'middleware' => 'auth',
    'as' => 'dashboard.',
], function() {
    Route::get('/home', DashboardController::class)->name('home');
    Route::resource('products', ProductController::class);
    Route::resource('product/categories', ProductCategoryController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('customers', CustomerController::class);
});
