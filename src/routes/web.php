<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReviewController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login.index');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.login');
});

Route::prefix('admin')->middleware('auth.administrators:administrators')->group(function () {
    Route::get('index', [AdministratorController::class, 'index'])->name('admin.index');
    Route::post('confirm', [AdministratorController::class, 'confirm'])->name('admin.user.confirm');
    Route::post('register', [AdministratorController::class, 'store'])->name('admin.user.register');
    Route::post('import', [AdministratorController::class, 'import'])->name('admin.import');
    Route::get('review', [AdministratorController::class, 'showReview'])->name('admin.review');
    Route::delete('delete', [AdministratorController::class, 'remove'])->name('admin.remove');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::get('/', [ShopController::class, 'index'])->name('root');
Route::post('/search', [ShopController::class, 'search']);
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');

Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/logout', [AuthController::class, 'destroy']);
    Route::post('/booking', [BookingController::class, 'booking']);
    Route::get('/detail/{id}/review', [ReviewController::class, 'create'])->name('review');
    Route::post('/detail/{id}/record', [ReviewController::class, 'record'])->name('record');
    Route::get('/detail/{id}/update', [ReviewController::class, 'update'])->name('update');
    Route::delete('/detail/{id}/delete', [ReviewController::class, 'removeReview'])->name('remove');
    Route::get('/detail/{id}/all', [ReviewController::class, 'allReview'])->name('show.all');
    Route::post('/favorite', [FavoriteController::class, 'store']);
    Route::delete('/delete-favorite', [FavoriteController::class, 'destroy']);
    Route::get('/mypage', [MyPageController::class, 'show'])->name('mypage');
    Route::delete('/cancel', [MyPageController::class, 'destroy']);
});
