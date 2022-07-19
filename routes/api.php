<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TokenGeneratorController;

Route::apiResource('products', ProductController::class)->name('api.products', 'products');
Route::apiResource('category', CategoryController::class)->name('api.category', 'category');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'show'])->name('user.show');
});

Route::get('search', SearchController::class)->name('search');
Route::post('token/generator', TokenGeneratorController::class)->name('token.generator');
