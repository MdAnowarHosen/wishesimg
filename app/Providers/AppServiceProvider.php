<?php

namespace App\Providers;

use App\Models\Categories\Categories;
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
        view()->share('boot_categories', $boot_categories);

    }
}
