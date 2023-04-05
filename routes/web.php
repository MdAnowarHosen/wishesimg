<?php

use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Categories\SubCategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Products\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Products\ProductsController as FrontendProductsProductsController;

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

Route::middleware(['splade'])->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Route::get('/', function () {
    //     return view('welcome', [
    //         'canLogin' => Route::has('login'),
    //         'canRegister' => Route::has('register'),
    //         'laravelVersion' => Application::VERSION,
    //         'phpVersion' => PHP_VERSION,
    //     ]);
    // });



    Route::controller(HomeController::class)->group(function ()
    {
        Route::get('/', 'index')->name('/');
    });

    Route::controller(FrontendProductsProductsController::class)->group(function ()
    {
        Route::prefix('images')->name('images.')->group(function()
        {
            Route::get('/{mainCatSlug}', 'mainCatProducts')->name('main.products');
            Route::get('/{mainCatSlug}/{subCategorySlug}', 'subCatProducts')->name('subcat.products');

        });

        Route::get('/{productSlug}', 'show')->name('show.product');
    });


    Route::middleware(['auth'])->prefix('wishes/admin')->name('admin.')->group(function ()
    {

        Route::controller(DashboardController::class)->group(function ()
        {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        /**
         * Categories Routes
         */
        Route::controller(CategoriesController::class)->group(function ()
        {
            Route::get('/categories', 'index')->name('categories');
            Route::get('/categories/add', 'add')->name('categories.add');
            Route::post('/categories/add', 'store')->name('categories.store');
            Route::get('/category/edit/{category}', 'edit')->name('category.edit');
            Route::patch('/categories/update/{category}', 'update')->name('categories.update');
            Route::delete('/categories/delete/{category}', 'destroy')->name('category.delete');
        });

        Route::resource('sub-categories',SubCategoriesController::class,['names' => ['index' => 'sub-categories.index','create'=> 'sub-category.create', 'store' => 'sub-category.store', 'edit'=> 'sub-category.edit', 'update' => 'sub-category.update', 'destroy' => 'sub-category.destroy']])->except('show');
        Route::resource('products',ProductsController::class,['names' => ['index' => 'products.index','create'=> 'products.create', 'store' => 'products.store', 'show' => 'products.show', 'edit'=> 'products.edit', 'update' => 'products.update', 'destroy' => 'products.destroy']]);
        Route::get('products/get/subcategory/{category}',[ProductsController::class,'getSubCategory'])->name('get.subcategory');
        // product edit get category
        Route::get('products/{product}/get/subcategory/{category}',[ProductsController::class,'getSubCategoryEdit'])->name('get.subcategory.edit');


    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
    });
});
