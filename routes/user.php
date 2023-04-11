<?php

use App\Http\Controllers\Frontend\Download\DownloadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Products\ProductsController as FrontendProductsController;

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
    });

    Route::controller(FrontendProductsController::class)->group(function ()
    {
        Route::prefix('images')->name('images.')->group(function()
        {
            Route::get('/{mainCatSlug}', 'mainCatProducts')->name('main.products');
            Route::get('/{mainCatSlug}/{subCategorySlug}', 'subCatProducts')->name('subcat.products');

        });
        Route::get('/{productSlug}', 'show')->name('show.product');
    });

    Route::controller(DownloadController::class)->prefix('download')->name('download.')->group(function ()
    {
        Route::post('/{slug}', 'downloadPost')->name('post.req');
        Route::get('/high/{slug}', 'downloadHigh')->name('high');
     ;
    });

});
