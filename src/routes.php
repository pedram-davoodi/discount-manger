<?php

use Illuminate\Support\Facades\Route;
use pedram\discount\Controllers\DiscountController;

Route::prefix('/discount-manager')->group(function () {
    Route::controller(DiscountController::class)->group(function () {
        Route::get('/index', 'index');
    });
});
