<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Products\ProductsController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Categories\SubCategoriesController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['splade'])->group(function () {
    Route::middleware([
        'auth:sanctum',
        'auth',
        config('jetstream.auth_session'),
        'verified',
        'admin'
    ])->prefix('wishes/admin')->name('admin.')->group(function ()
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
});
