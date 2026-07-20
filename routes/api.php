<?php
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoriesController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/products', [ProductsController::class, 'store4']);
    Route::put('auth/products/{product}', [AuthController::class, 'update']);

    Route::post('/categories', [ProductCategoriesController::class, 'store2']);
    Route::put('/categories/{categorys}', [ProductCategoriesController::class, 'update2']);
    Route::delete('/categories/{categorys}', [ProductCategoriesController::class, 'destroy']);

    //users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{users}', [UserController::class, 'show']);
});

// productsController
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/{product}', [ProductsController::class, 'show']);
//  Route::post('/products', [ProductsController::class, 'store']);
//  Route::put('/products/{product}', [ProductsController::class, 'update']);
//  Route::delete('/products/{product}', [ProductsController::class, 'destroy']);
// Route::get('/products/{products}', [ProductsController::class, 'shows']);
Route::post('/products', [ProductsController::class, 'store2']);
Route::post('/products', [ProductsController::class, 'store3']);
Route::put('/products/{product}', [ProductsController::class, 'update2']);
Route::put('/products/{product}', [ProductsController::class, 'update3']);

Route::get('/categories', [ProductCategoriesController::class, 'index']);
Route::get('/categories/{category}', [ProductCategoriesController::class, 'show']);
Route::post('/categories', [ProductCategoriesController::class, 'store']);
Route::put('/categories/{categorys}', [ProductCategoriesController::class, 'update']);

Route::get('/categories/{categorys}', [ProductCategoriesController::class, 'shows']);

// users
Route::post('/users', [UserController::class, 'store']);
