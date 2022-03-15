<?php

use Illuminate\Support\Facades\Route;
use Products\Application\Http\Controllers\API\ProductController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'getProducts']);
    Route::post('/add', [ProductController::class, 'createProduct']);
    Route::post('/update/{productId}', [ProductController::class, 'updateProduct']);
    Route::get('/{skuCode}', [ProductController::class, 'getProductBySkuCode']);
});

Route::prefix('sets')->group(function () {
    Route::get('/', [ProductController::class, 'getProductSets']);
    Route::post('/add', [ProductController::class, 'createProductSet']);
    Route::post('/update/{productSetId}', [ProductController::class, 'updateProductSet']);
    Route::get('/{productSetId}', [ProductController::class, 'getProductSetById']);
});
