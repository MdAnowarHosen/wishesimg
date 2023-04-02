<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\Uploader;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\SpladeTable;
use App\Models\Categories\Categories;
use Intervention\Image\Facades\Image;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Storage;
use App\Models\Categories\SubCategories;
use App\Models\Products\CategoryProducts;
use App\Http\Requests\Admin\Products\AddProductRequest;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        SEO::title('All Products');

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%");
                });
            });
        });

        $products = QueryBuilder::for(Product::class)
        ->defaultSort('-id')
        ->allowedSorts('id','name','slug','description')
        ->allowedFilters('name','slug','description', $globalSearch)
        ->paginate()
        ->withQueryString();

      //  $categories = Categories::pluck('name','id')->toArray();

        return view('admin.products.all',[
            'products' => SpladeTable::for($products)
            ->defaultSort('-id')
            ->withGlobalSearch()
            ->column('id', sortable:true,searchable:true,)
            ->column('image')
            ->column('name', sortable:true,searchable:true)
            ->column('slug', sortable:true,searchable:true)
            ->column('description', sortable:true,searchable:true)
           // ->selectFilter('category_id',$categories)
            ->column('action'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        SEO::title('Add Product');

        return view('admin.products.add',[
            'categories' => Categories::whereStatus(1)->get(),
        ]);
    }

    /**
     * get sub category
     */
    public function getSubCategory($category)
    {
        try
        {
            $arr = explode(',',$category);
            $count = count($arr);
            $subCats = [];
            for ($i=0; $i <$count ; $i++)
            {
                 $subCat = SubCategories::where('category_id',$arr[$i])->get();
                 if ($subCat != null)
                 {
                     $subCats[] = $subCat;
                 }
            }

            if ($subCats != null && count($subCats)>0)
            {
                return $subCats;
            }
            else
            {
                return 404;
            }

        }
        catch (\Throwable $th)
        {
            return 502;
        }


 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {

        HandleSpladeFileUploads::forRequest($request);

        try {
            $files = array();
            $image = $request->file;
            $interventionImage = Image::make($image);

            $thumbnail =  Str::random(20).$image->hashName();
            Storage::disk('wishes')->put("product/thumbnail/" . $thumbnail, (string) $interventionImage->encode('jpg', 15));
            $files['thumbnail'] = $thumbnail;


            // low product image
            $low_image_name =  Str::random(20).$image->hashName();
            //image manipulation
          //  $interventionImage = Image::make($image);
           // $interventionImage->resize(1000, 850); // width x height

            // create a new Image instance for inserting
            // $watermark = Image::make('backend/img/watermark_pattern_file.png');
            // $interventionImage->insert($watermark, 'center');

            Storage::disk('wishes')->put("product/low/" . $low_image_name, (string) $interventionImage->encode('jpg', 40));
            $files['low_quality'] = $low_image_name;

            // medium product image
            $medium_image_name =  Str::random(20).$image->hashName();
            //image manipulation
           // $interventionImage = Image::make($image);
           // $interventionImage->resize(1000, 850); // width x height

            // create a new Image instance for inserting
            // $watermark = Image::make('backend/img/watermark_pattern_file.png');
            // $interventionImage->insert($watermark, 'center');

            Storage::disk('wishes')->put("product/medium/" . $medium_image_name, (string) $interventionImage->encode('jpg', 60));
            $files['medium_quality'] = $medium_image_name;

            // high product image
            $high_image_name =  Str::random(20).$image->hashName();
            //image manipulation
          //  $interventionImage = Image::make($image);
            Storage::disk('wishes')->put("product/high/" . $high_image_name, (string) $interventionImage->encode('jpg', 85));
            $files['high_quality'] = $high_image_name;


            // product info
            $info = [
                'name' => $request->name,
                'slug' => $request->slug,
                'keywords' => $request->keywords,
                'meta_description' => $request->meta_description,
                'description' => $request->description,
            ];

            // merge the array
            $data = array_merge($info,$files);

            //create product
            $product = Product::create($data);

            $product->categories()->attach($request->category_id);
            $product->subCategories()->attach($request->subcategory_id);
            // $subCats = SubCategories::findMany($request->subcategory_id);
            // foreach ($subCats as $key => $subCat)
            // {
            //         CategoryProducts::create([
            //             'category_id' => $subCat->category_id,
            //             'subcategory_id' => $subCat->id,
            //             'product_id' => $product->id,
            //         ]);
            // }

            /**
             * Create Uploader data
             */

             Uploader::create([
                'product_id' => $product->id,
                'uploader_id' => Auth::id(),
             ]);

             /**
              * show success toast
              */
             Toast::title('Success!')
             ->message('Product added successfully')
             ->success()
              ->autoDismiss(5);
             return redirect()->back();

        }
        catch (\Throwable $th)
        {
            Toast::title('Failed!')
            ->message('Something went to wrong')
            ->danger()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
