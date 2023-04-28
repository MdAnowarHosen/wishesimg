<?php

namespace App\Http\Controllers\Frontend\Products;

use App\Models\Products\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\SEO;
use App\Models\Categories\Categories;
use Illuminate\Support\Facades\Storage;
use App\Models\Categories\SubCategories;

class ProductsController extends Controller
{
    public function show(string $productSlug)
    {
        $product =  Product::whereSlug($productSlug)->firstOrFail();
        $favCount = DB::table('favorites')->where('product_id',$product->id)->get()->count();

        $thoseCat = Categories::whereId($product->randCat->first()->id)->first();
        $thoseCatsPro = $thoseCat->products->take(15);

        /**
         * SEO tags
         */
        $imageUrl = 'https://www.wishesimg.com'.Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail);
        SEO::title($product->name)
        ->description($product->meta_description ?? 'Get and Download wishes and mimes images for free - Wishes Image')
        ->keywords($product->keywords);

        /**
         * Open Graph tags
         */
        SEO::openGraphType('WebPage');
        SEO::openGraphSiteName(env('APP_NAME','WishesImg'));
        SEO::openGraphTitle($product->name);
        SEO::openGraphUrl('https://www.wishesimg.com/'.$product->slug);
        SEO::openGraphImage($imageUrl);

        /**
         * Twitter tags
         */
        SEO::twitterCard('summary_large_image');
        SEO::twitterSite(env('APP_NAME','WishesImg'));
        SEO::twitterTitle($product->name);
        SEO::twitterDescription($product->meta_description ?? 'Get and Download wishes and mimes images for free - Wishes Image');
        SEO::twitterImage($imageUrl);

        /**
         * Custom Meta
         */
        SEO::metaByName('copyright', env('APP_NAME','WishesImg'));
        SEO::metaByName('language', 'EN');
        SEO::metaByName('news_keywords', $product->keywords?? 'wishes images, wishes picture, wishes photos');
        SEO::metaByName('tweetmeme-title', $product->name);

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
        $products = $category->products->reverse()->paginate(90);
        /**
         *
         * SEO
         */
        SEO::title($category->name)
        ->description($category->description ?? 'Get and Download wishes and mimes images for free - Wishes Image');
        return view('frontend.products.mainCategoriesProducts',[
            'products' => $products,
            'category' => $category->name,
        ]);

    }

    public function subCatProducts(string $mainCatSlug, string $subCategorySlug)
    {
        $category_id = Categories::whereSlug($mainCatSlug)->whereStatus(1)->firstOrFail()->id;
        $subCategory = SubCategories::whereSlug($subCategorySlug)->where('category_id',$category_id)->firstOrFail();
        $subCatPro = $subCategory->products->reverse()->paginate(90);
        /**
         * SEO
         */
        SEO::title($subCategory->name)
        ->description($subCategory->description ?? 'Get and Download wishes and mimes images for free - Wishes Image');
        return view('frontend.products.subCategoriesProducts',[
            'subCatPro' => $subCatPro,
            'subCategory' => $subCategory->name,
        ]);

    }
}
