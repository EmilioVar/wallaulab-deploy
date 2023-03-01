<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;


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

Route::get('/', [PublicController::class, 'index'])->name('home');

/* ADS */
/* Create Ads */
Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');
/* Edit Ad */
Route::get('ad/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
/* Update Ad */
Route::put('/ad/{ad}/edit', [AdController::class, 'update'])->name('ads.update');
/* IMAGE DELETE */
/* Delete Ad */
Route::delete('/ads/delete/{ad}', [AdController::class,'delete'])->name('ad.destroy');
/* Category Ads */
Route::get('/category/{category:name}/ads', [PublicController::class,'adsByCategory'])->name('category.ads');
/* Show Ad */
Route::get('/ads/{ad}', [AdController::class,'show'])->name("ads.show");

/* Become Revisor */
Route::get('revisor/become', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('revisor.become');
/* Make Revisor */
Route::get('revisor/{user}/make',[RevisorController::class,'makeRevisor'])->middleware('auth')->name('revisor.make');

/** Middlewares
 * Accept Ads
 * Reject Ads
 * Revisor Dashboard
 */
Route::middleware(['isRevisor'])->group(function () {
    Route::patch('/revisor/ad/{ad}/accept',[RevisorController::class,'acceptAd'])->name('revisor.ad.accept');
    Route::patch('/revisor/ad/{ad}/reject',[RevisorController::class,'rejectAd'])->name('revisor.ad.reject');
    Route::get('/revisor',[RevisorController::class,'index'] )->name('revisor.home');
});

/* Locale */

Route::post('/locale/{locale}', [PublicController::class,'setLocale'])->name('locale.set');

/* search */

Route::get("/search",[PublicController::class,'search'])->name('search');

/* User */
/* Dashboard */
Route::get("/dashboard",[UserController::class,'index'])->name('user.dashboard');