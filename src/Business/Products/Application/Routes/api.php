<?php

use Illuminate\Support\Facades\Route;
use Products\Application\Http\Controllers\API\ProductController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'getProducts']);
    Route::get('/{skuCode}', [ProductController::class, 'getProductBySkuCode']);
});
