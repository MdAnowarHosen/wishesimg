<?php

use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Frontend\Home\HomeController;

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
        Route::get('/download', 'download')->name('download');
    });

    Route::prefix('wishes/admin')->name('admin.')->group(function ()
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
            Route::put('/categories/add', 'store')->name('categories.store');
            Route::get('/category/edit/{category}', 'edit')->name('category.edit');
            Route::patch('/categories/update/{category}', 'update')->name('categories.update');
            Route::delete('/categories/delete/{category}', 'destroy')->name('category.delete');
        });



    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
    });
});
