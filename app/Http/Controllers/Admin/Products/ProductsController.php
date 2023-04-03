<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\Uploader;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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
use App\Models\Products\SubcatProduct;
use App\Models\Products\Updater;
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
                        ->orWhere('slug', 'LIKE', "%{$value}%")
                        ->orWhere('description', 'LIKE', "%{$value}%");
                        // ->orWhere('categories.name', 'LIKE', "%{$value}%")
                        // ->orWhere('subcategories.name', 'LIKE', "%{$value}%");
                });
            });
        });

        $products = QueryBuilder::for(Product::class)
        ->defaultSort('-id')
        ->allowedSorts('id','name','slug','description','categories.id','subcategories.id','categories.name','subcategories.name')
        ->allowedFilters('name','slug','description','categories.id','subcategories.id','categories.name','subcategories.name', $globalSearch)
        ->paginate()
        ->withQueryString();

        $categories = Categories::whereStatus(1)->pluck('name','id')->toArray();
        $subcategories = SubCategories::whereStatus(1)->pluck('name','id')->toArray();

        return view('admin.products.all',[
            'products' => SpladeTable::for($products)
            ->defaultSort('-id')
            ->withGlobalSearch()
            ->column('id', sortable:true,searchable:true,)
            ->column('image')
            ->column('name', sortable:true,searchable:true)
            ->column('slug', sortable:true,searchable:true)
            ->column('description', sortable:true,searchable:true)
           ->column(
                key: 'categories.name',
                label: 'Category',
                sortable: true,
                searchable:true
            )
            ->column(
                key: 'subcategories.name',
                label: 'Sub Category',
                sortable: true,
                searchable:true
            )
            ->selectFilter(
                key: 'categories.id',
                options: $categories
            )
            ->selectFilter(
                key: 'subcategories.id',
                options: $subcategories
            )
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
            return SubCategories::whereIn('category_id',$arr)->get();

        }
        catch (\Throwable $th)
        {
            return 502;
        }


 }

    /**
     * Get categories id for product edit
    */
    public function getSubCategoryEdit(Product $product, $category)
    {
        try
        {
            $arr = explode(',',$category);
           return SubCategories::whereIn('category_id',$arr)->get();

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
            $image = $request->file('file');
            $interventionImage = Image::make($image);

            $thumbnail =  Str::random(25).$image->hashName();
            Storage::disk('wishes')->put("product/thumbnail/" . $thumbnail, (string) $interventionImage->encode('jpg', 15));
            $files['thumbnail'] = $thumbnail;


            // low product image
            $low_image_name =  Str::random(25).$image->hashName();
            //image manipulation
          //  $interventionImage = Image::make($image);
           // $interventionImage->resize(1000, 850); // width x height

            // create a new Image instance for inserting
            // $watermark = Image::make('backend/img/watermark_pattern_file.png');
            // $interventionImage->insert($watermark, 'center');

            Storage::disk('wishes')->put("product/low/" . $low_image_name, (string) $interventionImage->encode('jpg', 40));
            $files['low_quality'] = $low_image_name;

            // medium product image
            $medium_image_name =  Str::random(25).$image->hashName();
            //image manipulation
           // $interventionImage = Image::make($image);
           // $interventionImage->resize(1000, 850); // width x height

            // create a new Image instance for inserting
            // $watermark = Image::make('backend/img/watermark_pattern_file.png');
            // $interventionImage->insert($watermark, 'center');

            Storage::disk('wishes')->put("product/medium/" . $medium_image_name, (string) $interventionImage->encode('jpg', 60));
            $files['medium_quality'] = $medium_image_name;

            // high product image
            $high_image_name =  Str::random(25).$image->hashName();
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

            /**
             * keep data to pivot tables
             */
            $product->categories()->attach($request->category_id);
            $product->subcategories()->attach($request->subcategory_id);

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
    public function edit(Product $product)
    {
        SEO::title('Edit Product');
        $categories = Categories::whereStatus(1)->get();
        $subcategories = SubCategories::whereIn('category_id',$product->categories->pluck('id'))->get();
        return view('admin.products.edit',[
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddProductRequest $request, Product $product)
    {

        $old = $product;
        $info = array();

        if ($request->name != $product->name)
        {
           $info['name'] = $request->name;
        }
        if ($request->slug != $product->slug)
        {
            $info['slug'] = $request->slug;
        }
        if ($request->keywords != null && $request->keywords != $product->keywords)
        {
            $info['keywords'] = $request->keywords;
        }
        if ($request->meta_description != null && $request->meta_description != $product->meta_description)
        {
            $info['meta_description'] = $request->meta_description;
        }
        if ($request->description != null && $request->description != $product->description)
        {
            $info['description'] = $request->description;
        }

        $files = array();
        $image = $request->file('file');

        if ($image != null)
        {

        $interventionImage = Image::make($image);

        $thumbnail =  Str::random(25).$image->hashName();
        Storage::disk('wishes')->put("product/thumbnail/" . $thumbnail, (string) $interventionImage->encode('jpg', 15));
        $files['thumbnail'] = $thumbnail;


        // low product image
        $low_image_name =  Str::random(25).$image->hashName();
        //image manipulation
        //  $interventionImage = Image::make($image);
        // $interventionImage->resize(1000, 850); // width x height

        // create a new Image instance for inserting
        // $watermark = Image::make('backend/img/watermark_pattern_file.png');
        // $interventionImage->insert($watermark, 'center');

        Storage::disk('wishes')->put("product/low/" . $low_image_name, (string) $interventionImage->encode('jpg', 40));
        $files['low_quality'] = $low_image_name;
        // medium product image
        $medium_image_name =  Str::random(25).$image->hashName();
        //image manipulation
        // $interventionImage = Image::make($image);
        // $interventionImage->resize(1000, 850); // width x height
        // create a new Image instance for inserting
        // $watermark = Image::make('backend/img/watermark_pattern_file.png');
        // $interventionImage->insert($watermark, 'center');

       Storage::disk('wishes')->put("product/medium/" . $medium_image_name, (string) $interventionImage->encode('jpg', 60));
        $files['medium_quality'] = $medium_image_name;

        // high product image
        $high_image_name =  Str::random(25).$image->hashName();
        //image manipulation
        //  $interventionImage = Image::make($image);
        Storage::disk('wishes')->put("product/high/" . $high_image_name, (string) $interventionImage->encode('jpg', 85));
        $files['high_quality'] = $high_image_name;
        }

        DB::beginTransaction();
        try
        {
            $data = array_merge($info,$files);
            $update = Product::whereId($product->id)->update($data);
            if ($update)
            {


                /**
                 * check category added or removed or not! if added or removed
                 * then make the change to database
                 */
                $catData = CategoryProducts::whereProduct_id($product->id)->pluck('category_id');
                $catsArray = json_decode($catData);
                $addCats=array_diff($request->categories,$catsArray);
                $removedCats=array_diff($catsArray,$request->categories);
                if ($addCats != null || $removedCats != null)
                {
                    /**
                     * add / remove categories for that product
                     */
                    $product->categories()->sync($request->categories);
                }

                  /**
                 * check subcategory added or removed or not! if added or removed
                 * then make the change to database
                 */
                $SubCatData = SubcatProduct::whereProduct_id($product->id)->pluck('subcategory_id');
                $subCatsArray = json_decode($SubCatData);
                $addSubCats=array_diff($request->subcategories,$subCatsArray);
                $rmSubCats=array_diff($subCatsArray,$request->subcategories);

                if ($addSubCats != null || $rmSubCats != null)
                {
                    /**
                     * add / remove subcategories for that product
                     */
                    $product->subcategories()->sync($request->subcategories);
                }

                /**
                 * remove old product photo
                 *
                 */
                    $path = "product/thumbnail/" . $old->thumbnail;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
                    $path = "product/low/" . $old->low_quality;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
                    $path = "product/medium/" . $old->medium_quality;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
                    $path = "product/high/" . $old->high_quality;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }

                    // store updater data
                    Updater::create([
                        'product_id' => $product->id,
                        'updater_id' => Auth::id(),
                    ]);

                DB::commit();
                Toast::title('Success')
                ->message('Product updated successfully')
                ->success()
                ->autoDismiss(5);
                return redirect()->back();
            }
        }
        catch (\Throwable $th)
        {
            DB::rollBack();
                    /**
                     * remove recently uploaded product photo
                     *
                     */
                    $path = "product/thumbnail/" . $thumbnail;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
                    $path = "product/low/" . $low_image_name;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
                    $path = "product/medium/" . $medium_image_name;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
                    $path = "product/high/" . $old->high_quality;
                    if (Storage::disk('wishes')->exists($path))
                    {
                        Storage::disk('wishes')->delete($path);
                    }
            Toast::title('Failed')
            ->message('Failed to update product')
            ->danger()
            ->autoDismiss(5);
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try
        {
            $old = $product;
            $delete = $product->delete();
            if ($delete)
            {
                $path = "product/thumbnail/" . $old->thumbnail;
                if (Storage::disk('wishes')->exists($path))
                {
                    Storage::disk('wishes')->delete($path);
                }
                $path = "product/low/" . $old->low_quality;
                if (Storage::disk('wishes')->exists($path))
                {
                    Storage::disk('wishes')->delete($path);
                }
                $path = "product/medium/" . $old->medium_quality;
                if (Storage::disk('wishes')->exists($path))
                {
                    Storage::disk('wishes')->delete($path);
                }
                $path = "product/high/" . $old->high_quality;
                if (Storage::disk('wishes')->exists($path))
                {
                    Storage::disk('wishes')->delete($path);
                }
                DB::commit();
                Toast::title('Success')
                ->message('Successfully product has been deleted')
                ->success()
                ->autoDismiss(5);
                return redirect()->back();
            }
            else
            {
                Toast::title('Failed')
                ->message('Something went to wrong')
                ->warning()
                ->autoDismiss(5);
                return redirect()->back();
            }
        }
        catch (\Throwable $th)
        {
            DB::rollBack();
            Toast::title('Failed')
            ->message('Failed to delete product')
            ->danger()
            ->autoDismiss(5);
            return redirect()->back();
        }
    }
}
