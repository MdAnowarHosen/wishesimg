<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories\Categories;
use App\Models\Products\CategoryProducts;
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
        $product =  Product::whereSlug($productSlug)->firstOrFail();
        $thoseCat = Categories::whereId($product->randCat->first()->id)->first();
        $thoseCatsPro = $thoseCat->products->take(15);


        // dd($product->randCat->first()->id);
        // dd($thoseCatsPro);
       // dd($product->categories->pluck('id')->toArray());
        return view('frontend.products.product-page',[
            'product' => $product,
            'randProducts' => Product::inRandomOrder()->take(27)->get(),
            'thoseCatsPro' => $thoseCatsPro,
        ]);
    }
}
