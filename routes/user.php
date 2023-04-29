<?php

use App\Http\Controllers\Frontend\Bookmark\BookmarkController;
use App\Http\Controllers\Frontend\Contact\ContactController;
use App\Http\Controllers\Frontend\Download\DownloadController;
use App\Http\Controllers\Frontend\Favorite\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Products\ProductsController as FrontendProductsController;
use App\Http\Controllers\Frontend\Search\SearchController;

/*
|--------------------------------------------------------------------------
| User's Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['splade'])->group(function () {

    Route::controller(HomeController::class)->group(function ()
    {
        Route::get('/', 'index')->name('/');
        Route::get('/about', 'about')->name('about');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/help', 'help')->name('help');
        Route::get('/sitemap', 'sitemap')->name('sitemap');
    });

    /**
     * Download routes
     */
    Route::controller(DownloadController::class)->prefix('download')->name('download.')->group(function ()
    {
        Route::post('/{slug}', 'downloadPost')->name('post.req');
        Route::get('/high/{slug}', 'downloadHigh')->name('high');
     ;
    });

    Route::middleware(['auth','verified'])->group(function () {
        /**
         * Bookmark Routes
         *
         */
        Route::controller(BookmarkController::class)->prefix('bookmarks')->name('bookmark.')->group(function ()
        {
            Route::get('/', 'show')->name('show');
            Route::post('/add', 'addBookmark')->name('add');
            Route::post('/remove', 'removeBookmark')->name('remove');

        });
                /**
         * Favorite products Routes
         *
         */
        Route::controller(FavoriteController::class)->prefix('favorite')->name('favorite.')->group(function ()
        {
            Route::post('/add', 'addFavorite')->name('add');
            Route::post('/remove', 'removeFavorite')->name('remove');

        });

    });

    /**
     * search routes
     */
    Route::get('search',[SearchController::class,'index'])->name('search');

    /**
     * contact routes
     */
    Route::controller(ContactController::class)->prefix('contact')->group(function ()
    {
        Route::get('/', 'contact')->name('contact');
        Route::post('/store', 'store')->name('contact.store');

    });
    /**
     * products routes
     * those routes should be always at bottom
     */
    Route::controller(FrontendProductsController::class)->group(function ()
    {
        Route::prefix('images')->name('images.')->group(function()
        {
            Route::get('/{mainCatSlug}', 'mainCatProducts')->name('main.products');
            Route::get('/{mainCatSlug}/{subCategorySlug}', 'subCatProducts')->name('subcat.products');

        });
        Route::get('/{productSlug}', 'show')->name('show.product');
    });


});
