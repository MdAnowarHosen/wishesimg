<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('frontend.home.index',[
            'products' => Product::whereStatus(1)->orderBy('id','desc')->take(27)->get(),
        ]);
    }

    public function show($productSlug)
    {
        return view('frontend.products.product-page',[
            'product' => Product::whereSlug($productSlug)->firstOrFail(),
            'randProducts' => Product::inRandomOrder()->take(27)->get(),
        ]);
    }
}
