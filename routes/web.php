<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/chargers', [\App\Http\Controllers\ChargersController::class, 'index'])->name('chargers');

Route::get('/favourites', [\App\Http\Controllers\FavouriteController::class, 'index'])->middleware('auth')->name('favourite.index');
Route::post('/favourite/add', [\App\Http\Controllers\FavouriteController::class, 'addToFavourite'])->name('favourite.add');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [\App\Http\Controllers\Admin\UsersController::class, 'create'])->name('admin.user.create');
        Route::post('/', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('admin.user.delete');
        Route::get('/data', [\App\Http\Controllers\Admin\UsersController::class, 'data'])->name('admin.user.data');

    });

    Route::group(['prefix' => 'chargers'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\ChargersController::class, 'index'])->name('admin.charger.index');
        Route::get('/create', [\App\Http\Controllers\Admin\ChargersController::class, 'create'])->name('admin.charger.create');
        Route::post('/', [\App\Http\Controllers\Admin\ChargersController::class, 'store'])->name('admin.charger.store');
        Route::get('/edit/{charger}', [\App\Http\Controllers\Admin\ChargersController::class, 'edit'])->name('admin.charger.edit');
        Route::put('/{charger}', [\App\Http\Controllers\Admin\ChargersController::class, 'update'])->name('admin.charger.update');
        Route::delete('/{charger}', [\App\Http\Controllers\Admin\ChargersController::class, 'delete'])->name('admin.charger.delete');
        Route::get('/data', [\App\Http\Controllers\Admin\ChargersController::class, 'data'])->name('admin.charger.data');

    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
