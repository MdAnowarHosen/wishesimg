<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\SEO;
use App\Models\Categories\Categories;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    //

    public function index()
    {
        SEO::title(Config::get('app.long_title'));
        return view('frontend.home.index',[
            'products' => Product::whereStatus(1)->orderBy('id','desc')->take(27)->get(),
        ]);
    }

    public function about()
    {
        SEO::title('About us');
        $aboutFile = Jetstream::localizedMarkdownPath('about.md');
        return view('frontend.pages.about', [
            'about' => Str::markdown(file_get_contents($aboutFile)),
        ]);
    }

    public function faq()
    {
        return "FAQ";
    }

    public function help()
    {
        return "Help";
    }

    public function sitemap()
    {
        $categories = Categories::whereStatus(1)->orderBy('name','asc')->get();
        $products = Product::whereStatus(1)->orderBy('id','desc')->get();
        return view('frontend.sitemap.sitemap',[
            'products' => $products,
            'categories' => $categories
        ]);
    }


}
