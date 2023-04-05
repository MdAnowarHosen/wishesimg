<?php

namespace App\Providers;

use App\Models\Categories\Categories;
use App\Models\Products\Product;
use Illuminate\Support\ServiceProvider;

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
        $boot_categories = Categories::whereStatus(1)->get();
        $rightSideRandProduct = Product::whereStatus(1)->inRandomOrder()->take(6)->get();

        view()->share('boot_categories', $boot_categories);
        view()->share('rightSideRandProduct', $rightSideRandProduct);

    }
}
