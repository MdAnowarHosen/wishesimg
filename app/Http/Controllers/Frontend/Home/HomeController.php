<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories\Categories;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\SEO;

class HomeController extends Controller
{
    //

    public function index()
    {
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
