<?php

use Illuminate\Support\Facades\Route;
use Products\Application\Http\Controllers\API\ProductController;
use Products\Application\Http\Controllers\API\ProductSetController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'getProducts']);
    Route::post('/add', [ProductController::class, 'createProduct']);
    Route::post('/update/{productId}', [ProductController::class, 'updateProduct']);
    Route::get('/{skuCode}', [ProductController::class, 'getProductBySkuCode']);
});

Route::prefix('sets')->group(function () {
    Route::get('/', [ProductSetController::class, 'getProductSets']);
    Route::post('/add', [ProductSetController::class, 'createProductSet']);
    Route::post('/update/{productSetId}', [ProductSetController::class, 'updateProductSet']);
    Route::get('/{productSetId}', [ProductSetController::class, 'getProductSetById']);
});
