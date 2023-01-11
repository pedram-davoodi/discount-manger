<?php

use Illuminate\Support\Facades\Route;
use pedram\discount\Controllers\DiscountController;
use pedram\discount\Controllers\OfferController;

Route::prefix('/discount-manager')->group(function () {

    Route::controller(OfferController::class)->prefix('/offers')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
    });

});
