<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('language', LanguageController::class)->name('language');

/** News Details Routes */
Route::get('product-details/{slug}', [HomeController::class, 'ShowNews'])->name('product-details');

/** News Details Routes */
Route::get('product', [HomeController::class, 'news'])->name('product');
Route::get('brand', [HomeController::class, 'brand'])->name('brand');

/** News Comment Routes */
Route::post('product-comment', [HomeController::class, 'handleComment'])->name('product-comment');
Route::post('product-comment-replay', [HomeController::class, 'handleReplay'])->name('product-comment-replay');

Route::delete('product-comment-destroy', [HomeController::class, 'commentDestory'])->name('product-comment-destroy');

/** Newsletter Routes */
Route::post('subscribe-productletter', [HomeController::class, 'SubscribeNewsLetter'])->name('subscribe-productletter');

/** About Page Route */
Route::get('about', [HomeController::class, 'about'])->name('about');

/** kebijakan Page Route */
Route::get('kebijakan', [HomeController::class, 'kebijakan'])->name('kebijakan');
/** Contact Page Route */
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
/** Contact Page Route */
Route::post('contact', [HomeController::class, 'handleContactFrom'])->name('contact.submit');

// Auth::routes(['reset' => true]);


use App\Http\Controllers\SitemapController;

// Sitemap Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/sitemap/sitemap-category-{language}.xml', [SitemapController::class, 'categories']);
Route::get('/sitemap/sitemap-tag.xml', [SitemapController::class, 'tags']);
Route::get('/sitemap/sitemap-product-{language}.xml', [SitemapController::class, 'productIndex']);
Route::get('/sitemap/sitemap-product-en-{category}', [SitemapController::class, 'productByCategoryEn']);
Route::get('/sitemap/sitemap-product-id-{category}', [SitemapController::class, 'productByCategoryId']);

