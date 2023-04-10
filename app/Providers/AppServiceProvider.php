<?php

namespace App\Providers;

use App\Models\Products\Product;
use App\Models\Categories\Categories;
use Illuminate\Support\ServiceProvider;
use ProtoneMedia\Splade\Facades\Splade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Splade::setRootView('layouts.frontendLayout');
        $boot_categories = Categories::whereStatus(1)->get();
        $rightSideRandProduct = Product::whereStatus(1)->inRandomOrder()->take(6)->get();

        view()->share('boot_categories', $boot_categories);
        view()->share('rightSideRandProduct', $rightSideRandProduct);

    }
}
