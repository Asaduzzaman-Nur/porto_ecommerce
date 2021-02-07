

<?php

use App\Http\Controllers\Staff\BrandController;
use App\Http\Controllers\Staff\CategoryController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::prefix('staff/')->name('staff.')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Brand Route

    //Route::get('brands', [BrandController::class, 'index'])->name('brands');
    //we are defining route for brand with resource method for less code
    Route::resource('brand', BrandController::class);

    //Category Routes
    Route::resource('category', CategoryController::class );
    Route::resource('product', ProductController::class );
});
