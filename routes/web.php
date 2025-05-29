<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('courses', [CourseController::class, 'index'])
    ->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])
    ->name('courses.show');

Route::get('cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::get('checkout', [CheckOutController::class, 'index'])
    ->name('checkout.index');

Route::post('checkout/createPaypalOrder', [CheckOutController::class, 'createPaypalOrder'])
    ->name('checkout.createPaypalOrder');
