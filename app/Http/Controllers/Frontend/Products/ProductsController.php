<?php

namespace App\Http\Controllers\Frontend\Products;

use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\SEO;
use App\Models\Categories\Categories;
use App\Models\Categories\SubCategories;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function show(string $productSlug)
    {
        $product =  Product::whereSlug($productSlug)->firstOrFail();
        $favCount = DB::table('favorites')->where('product_id',$product->id)->get()->count();

        $thoseCat = Categories::whereId($product->randCat->first()->id)->first();
        $thoseCatsPro = $thoseCat->products->take(15);
        SEO::title($product->name);
        return view('frontend.products.product-page',[
            'product' => $product,
            'randProducts' => Product::inRandomOrder()->take(27)->get(),
            'thoseCatsPro' => $thoseCatsPro,
            'favCount' => $favCount,
        ]);
    }

    public function mainCatProducts(string $mainCatSlug)
    {
        $category = Categories::whereSlug($mainCatSlug)->whereStatus(1)->firstOrFail();
        $products = $category->products->paginate(90);
        return view('frontend.products.mainCategoriesProducts',[
            'products' => $products,
            'category' => $category->name,
        ]);

    }

    public function subCatProducts(string $mainCatSlug, string $subCategorySlug)
    {
        $category_id = Categories::whereSlug($mainCatSlug)->whereStatus(1)->firstOrFail()->id;
        $subCategory = SubCategories::whereSlug($subCategorySlug)->where('category_id',$category_id)->firstOrFail();
        $subCatPro = $subCategory->products->paginate(90);
        return view('frontend.products.subCategoriesProducts',[
            'subCatPro' => $subCatPro,
            'subCategory' => $subCategory->name,
        ]);

    }
}
