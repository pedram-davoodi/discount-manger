<?php

use Illuminate\Support\Facades\Route;
use pedram\discount\Controllers\DiscountController;
use pedram\discount\Controllers\OfferController;

Route::prefix('/discount-manager')->group(function () {

    Route::controller(OfferController::class)->name('discount.')->prefix('/offers')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create')->name('offer.create');
        Route::post('/store', 'store')->name('offer.store');
    });

});
