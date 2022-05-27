<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TokenGeneratorController;

Route::apiResource('products', ProductController::class)->name('api.products', 'products');
Route::apiResource('category', CategoryController::class)->name('api.category', 'category');

Route::post('token/generator', TokenGeneratorController::class)->name('api.token.generator', 'token.generator');