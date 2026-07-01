<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WallpaperController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::controller(WallpaperController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/search', 'search')->name('wallpapers.search');
});

Route::prefix('agents')->name('characters.')->controller(CharacterController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('view');
});

Route::prefix('tags')->name('tags.')->controller(TagController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('view');
});

Route::prefix('artists')->name('artists.')->controller(ArtistController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('view');
});

Route::prefix('articles')->name('posts.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{category:slug}', 'category')->name('category');
    Route::get('/{post}', 'show')->name('view');
});

/*
|--------------------------------------------------------------------------
| Sitemap Routes
|--------------------------------------------------------------------------
*/

Route::controller(SitemapController::class)->group(function () {
    Route::get('/sitemap.xml', 'index')->name('sitemap.index');

    Route::get('/sitemap-wallpapers.xml', 'wallpaperIndex')->name('sitemap.wallpapers.index');
    Route::get('/sitemap-wallpapers-{page}.xml', 'wallpapers')
        ->whereNumber('page')
        ->name('sitemap.wallpapers.page');

    Route::get('/sitemap-characters.xml', 'characterIndex')->name('sitemap.characters.index');
    Route::get('/sitemap-characters-{page}.xml', 'characters')
        ->whereNumber('page')
        ->name('sitemap.characters.page');

    Route::get('/sitemap-tags.xml', 'tagIndex')->name('sitemap.tags.index');
    Route::get('/sitemap-tags-{page}.xml', 'tags')
        ->whereNumber('page')
        ->name('sitemap.tags.page');
});

/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/

Route::view('/app', 'pages.download')->name('download');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-of-service', 'pages.tos')->name('tos');

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'login')->name('login.firebase');
});

Route::redirect('/register', '/login');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::controller(FavoriteController::class)->group(function () {
        Route::get('/favorites', 'index')->name('favorites.index');
        Route::post('/wallpapers/{id}/favorite', 'toggle')
            ->whereNumber('id')
            ->name('wallpapers.favorite');
    });

    Route::prefix('settings')->name('settings.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Wallpaper Dynamic Routes
|--------------------------------------------------------------------------
|
| Keep these at the very bottom so they don't conflict with other routes.
|
*/

Route::controller(WallpaperController::class)->group(function () {
    Route::get('/{id}', 'redirectToSlug')
        ->whereNumber('id')
        ->name('wallpapers.redirect');

    Route::post('/{id}', 'download')
        ->name('wallpapers.download');

    Route::get('/{slug}', 'show')
        ->name('wallpapers.view');
});