<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoriesController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// productsController
 Route::get('/products', [ProductsController::class, 'index']);
 Route::get('/products/{products}', [ProductsController::class, 'show']);
 Route::post('/products', [ProductsController::class, 'store']);
 Route::put('/products/{product}', [ProductsController::class, 'update']);
 Route::delete('/products/{product}', [ProductsController::class, 'destroy']);
 Route::get('/products/{products}', [ProductsController::class, 'shows']);
 Route::post('/products', [ProductsController::class, 'store2']);
 Route::post('/products', [ProductsController::class, 'store3']);
 Route::put('/products/{product}', [ProductsController::class, 'update2']);
 Route::put('/products/{product}', [ProductsController::class, 'update3']);


 Route::get('/categories', [ProductCategoriesController::class, 'index']);
 Route::get('/categories/{categorys}', [ProductCategoriesController::class, 'show']);
 Route::post('/categories', [ProductCategoriesController::class, 'store']);
 Route::put('/categories/{categorys}', [ProductCategoriesController::class, 'update']);
 Route::delete('/categories/{categories}', [ProductCategoriesController::class, 'destroy']);
 Route::get('/categories/{categorys}', [ProductCategoriesController::class, 'shows']);

 Route::post('/categories', [ProductCategoriesController::class, 'store2']);
 Route::put('/categories/{categorys}', [ProductCategoriesController::class, 'update2']);
