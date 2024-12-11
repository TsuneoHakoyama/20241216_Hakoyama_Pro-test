<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'index'])->name('root');
Route::post('/search', [ShopController::class, 'search']);
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');

Route::post('/booking', [BookingController::class, 'booking']);
Route::get('/detail/review/{id}', [ReviewController::class, 'create']);
Route::post('/detail/review/{id}', [ReviewController::class, 'record']);

