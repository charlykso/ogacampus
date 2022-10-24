<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserManagerController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CountryStateController;
use App\Http\Controllers\Admin\VerificationController;
use App\Http\Controllers\Admin\GiveawayController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TicketController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Admin', 'middleware' => ['auth','isAdmin'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('getcountry', [CountryStateController::class, 'index'])->name('admin.country');
    Route::post('fetch-states', [CountryStateController::class, 'fetchState'])->name('admin.state');
      /**
     * Schools
     */
    Route::group(['prefix' => 'school'], function () {
        Route::get('/', [SchoolController::class, 'index'])->name('admin.schools');
        Route::post('/delete/{uuid}', [SchoolController::class, 'delete'])->name('admin.school.delete');
        Route::post('store', [SchoolController::class, 'store'])->name('admin.school.store');


    });
    /**
     * Profile
     */

    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/change-password', [DashboardController::class, 'changePassword'])->name('admin.profile.password');

    /**
     * Staff
     */
    Route::group(['prefix' => 'staff'], function () {
        Route::get('/', [StaffController::class, 'index'])->name('admin.staff.index');
        Route::get('create', [StaffController::class, 'create'])->name('admin.staff.create');
        Route::post('store', [StaffController::class, 'store'])->name('admin.staff.store');
        Route::put('/update/{id}', [StaffController::class, 'update'])->name('admin.staff.update');
        Route::post('/delete/{id}', [StaffController::class, 'delete'])->name('admin.staff.delete');
    });
    /**
     * Users
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserManagerController::class, 'index'])->name('admin.user.index');
        Route::get('/pending', [UserManagerController::class, 'pending'])->name('admin.user.pending');
        Route::get('/verified', [UserManagerController::class, 'verified'])->name('admin.user.verified');
        Route::get('/profile/{uuid}', [UserManagerController::class, 'show'])->name('admin.user.show');
        Route::post('/profile/change-password', [UserManagerController::class, 'changePassword'])->name('admin.user.password');
        Route::get('/report/history', [UserManagerController::class, 'report'])->name('admin.user.report');
        Route::post('/delete/{id}', [UserManagerController::class, 'delete'])->name('admin.user.delete');
        Route::get('/verify/{uuid}/{status}', [UserManagerController::class, 'verify'])->name('admin.user.verify');

    });


     /**
     * iTEMS
     */
    Route::group(['prefix' => 'items'], function () {
        Route::get('/', [ItemsController::class, 'index'])->name('admin.items.index');
        Route::get('/status/{status}', [ItemsController::class, 'status'])->name('admin.items.status');
        Route::get('/{uuid}', [ItemsController::class, 'show'])->name('admin.items.show');
        Route::post('/{uuid}', [ItemsController::class, 'updatestatus'])->name('admin.items.updatestatus');
        Route::get('/report/history', [ItemsController::class, 'report'])->name('admin.item.report');
    });

    /**
    * Events
    */
    Route::group(['prefix' => 'events'], function () {
        Route::get('/', [EventController::class, 'index'])->name('admin.events.index');
        Route::get('/status/expired', [EventController::class, 'expired'])->name('admin.events.expired');
        Route::get('/status/{pipeline}', [EventController::class, 'pipeline'])->name('admin.events.pipeline');
        Route::get('/{uuid}', [EventController::class, 'show'])->name('admin.events.show');
        Route::get('/status/{uuid}/{status}', [EventController::class, 'statusChange'])->name('admin.event.status');
        Route::get('/report/history', [EventController::class, 'report'])->name('admin.event.report');
    });

    /**
    * Orders
    */
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [TicketController::class, 'index'])->name('admin.orders.index');
        Route::get('/status/{status}', [TicketController::class, 'status'])->name('admin.orders.status');
        Route::get('/{reference}', [TicketController::class, 'show'])->name('admin.order.show');
        Route::get('/report/payment', [TicketController::class, 'report'])->name('admin.orders.payment');
    });


    /**
    * Services
    */
   Route::group(['prefix' => 'services'], function () {
       Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');
       Route::get('/expired', [ServiceController::class, 'index'])->name('admin.service.expired');
       Route::get('/status/{pipeline}', [ServiceController::class, 'pipeline'])->name('admin.service.pipeline');
       Route::get('/{uuid}', [ServiceController::class, 'show'])->name('admin.service.show');
       Route::get('/status/{uuid}/{status}', [ServiceController::class, 'statusChange'])->name('admin.service.status');
       Route::get('/report/history', [ServiceController::class, 'report'])->name('admin.service.report');
   });

   /**
    * Shops
    */
    Route::group(['prefix' => 'shops'], function () {
        Route::get('/', [ShopController::class, 'index'])->name('admin.shops.index');
        Route::get('/status/{status}', [ShopController::class, 'status'])->name('admin.shops.status');
        Route::get('/{slug}', [ShopController::class, 'show'])->name('admin.shop.show');
        Route::get('/status/{uuid}/{status}', [ShopController::class, 'update'])->name('admin.shop.update');
        Route::get('/report/history', [ShopController::class, 'report'])->name('admin.shop.report');
    });

   /**
    * Giveaways
    */
    Route::group(['prefix' => 'giveways'], function (){
        Route::get('/', [GiveawayController::class, 'index'])->name('admin.giveaway.index');
        Route::get('/active', [GiveawayController::class, 'active'])->name('admin.giveaway.active');
        Route::post('/', [GiveawayController::class, 'store'])->name('admin.giveaway.store');
    });

    /**
    * Giveways
    */
    Route::group(['prefix' => 'verification'], function (){
        Route::get('/', [VerificationController::class, 'index'])->name('admin.verification.index');
        Route::get('/status/{status]', [VerificationController::class, 'status'])->name('admin.verification.status');
        Route::put('/action/{id}', [VerificationController::class, 'update'])->name('admin.verification.update');
    });
});

