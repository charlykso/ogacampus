<?php

use App\Http\Controllers\Users\DashboardController as UsersDashboardController;
use App\Http\Controllers\Users\EventController;
use App\Http\Controllers\Users\ItemController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\ServiceController;
use App\Http\Controllers\Users\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Users', 'middleware' => ['auth', 'isUser'], 'prefix' => 'account'], function () {
    Route::get('/', [UsersDashboardController::class, 'index'])->name('account.dashboard');
    Route::get('/edit', [UsersDashboardController::class, 'edit'])->name('account.edit');
    Route::get('/verification', [UsersDashboardController::class, 'verify'])->name('account.verify.page');
    Route::post('/photo/upload', [ProfileController::class, 'uploadPhoto'])->name('profile.photo.upload');

    Route::post('/edit', [ProfileController::class, 'update'])->name('profile.update');

    Route::group(['prefix' => 'manage'], function () {
        Route::get('/events', [EventController::class, 'index'])->name('account.manage.events');
        Route::get('/events/all', [EventController::class, 'all'])->name('account.manage.events.all');
        Route::get('/services', [ServiceController::class, 'index'])->name('account.manage.services');
        Route::get('/services/all', [ServiceController::class, 'all'])->name('account.manage.services.all');
        Route::get('/shops', [ShopController::class, 'index'])->name('account.manage.shops');
        Route::get('/shops/all', [ShopController::class, 'all'])->name('account.manage.shops.all');
        Route::get('/items/all', [ItemController::class, 'all'])->name('account.manage.items.all');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/events', [EventController::class, 'create'])->name('account.post.events');
        Route::get('/events/{uuid}/edit', [EventController::class, 'edit'])->name('account.post.events.edit');
        Route::get('/services/{uuid}/edit', [ServiceController::class, 'edit'])->name('account.post.services.edit');
        Route::get('/items/{uuid}/edit', [ItemController::class, 'edit'])->name('account.post.items.edit');
        Route::get('/shops/{uuid}/edit', [ShopController::class, 'edit'])->name('account.post.shops.edit');
        Route::post('/events', [EventController::class, 'store'])->name('account.store.events');
        Route::post('/items', [ItemController::class, 'store'])->name('account.store.items');
        Route::post('/shops', [ShopController::class, 'store'])->name('account.store.shops');
        Route::post('/services', [ServiceController::class, 'store'])->name('account.store.services');
        Route::post('/items/{uuid}', [ItemController::class, 'update'])->name('account.update.items');
        Route::post('/events/{uuid}', [EventController::class, 'update'])->name('account.update.events');
        Route::post('/shops/{uuid}', [ShopController::class, 'update'])->name('account.update.shops');
        Route::post('/services/{uuid}', [ServiceController::class, 'update'])->name('account.update.services');
        Route::get('/services', [ServiceController::class, 'create'])->name('account.post.services');
        Route::get('/items', [ItemController::class, 'create'])->name('account.post.items');
        Route::get('/shops', [ShopController::class, 'create'])->name('account.post.shops');
    });
});
