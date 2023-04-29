<?php

namespace App\Providers;

use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use App\Models\Categories\Categories;
use Illuminate\Support\Facades\Request;
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
        /**
         * set default layout
         */
        if (Request::is('wishes/admin/*'))
        {
            Splade::setRootView('layouts.adminLayout');
        }
        elseif(Request::is('login') || Request::is('register') || Request::is('forgot-password'))
        {
            Splade::setRootView('root');
        }
        else
        {
            Splade::setRootView('layouts.frontendLayout');
        }

        SpladeTable::defaultSearchDebounce(1000);

        $boot_categories = Categories::whereStatus(1)->orderBy('name','asc')->get();
        $rightSideRandProduct = Product::whereStatus(1)->inRandomOrder()->take(6)->get();

        view()->share('boot_categories', $boot_categories);
        view()->share('rightSideRandProduct', $rightSideRandProduct);

    }
}
