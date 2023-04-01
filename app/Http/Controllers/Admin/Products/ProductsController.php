<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\SEO;
use App\Models\Categories\Categories;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Categories\SubCategories;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {

        HandleSpladeFileUploads::forRequest($request);

        $request->validate([
            'name' => ['required', 'string', 'max:256'],
            'slug' => ['required', 'string','unique:products'],
            'category_id' => ['required', 'array','min:1'],
            'subcategory_id' => ['required', 'array','min:1'],
            'file' => ['required', 'file', 'image'],
            'keywords' => ['nullable','string', 'max:256'],
            'meta_description' => ['nullable','string', 'max:256'],
            'description' => ['nullable', 'string', 'max:1000'],
            'draft' => ['nullable', 'numeric'],
        ]);
        $data = array();
        $image = $request->file;
        $interventionImage = Image::make($image);

        $thumbnail =  Str::random(20).$image->hashName();
        Storage::disk('wishes')->put("product/thumbnail/" . $thumbnail, (string) $interventionImage->encode('jpg', 15));
        $data['thumbnail'] = $thumbnail;


        // low product image
        $low_image_name =  Str::random(20).$image->hashName();
        //image manipulation
      //  $interventionImage = Image::make($image);
       // $interventionImage->resize(1000, 850); // width x height

        // create a new Image instance for inserting
        // $watermark = Image::make('backend/img/watermark_pattern_file.png');
        // $interventionImage->insert($watermark, 'center');

        Storage::disk('wishes')->put("product/low/" . $low_image_name, (string) $interventionImage->encode('jpg', 40));
        $data['low_quality'] = $low_image_name;

        // medium product image
        $medium_image_name =  Str::random(20).$image->hashName();
        //image manipulation
       // $interventionImage = Image::make($image);
       // $interventionImage->resize(1000, 850); // width x height

        // create a new Image instance for inserting
        // $watermark = Image::make('backend/img/watermark_pattern_file.png');
        // $interventionImage->insert($watermark, 'center');

        Storage::disk('wishes')->put("product/medium/" . $medium_image_name, (string) $interventionImage->encode('jpg', 60));
        $data['medium_quality'] = $medium_image_name;

        // high product image
        $high_image_name =  Str::random(20).$image->hashName();
        //image manipulation
      //  $interventionImage = Image::make($image);
        Storage::disk('wishes')->put("product/high/" . $high_image_name, (string) $interventionImage->encode('jpg', 85));
        $data['high_quality'] = $high_image_name;

      //  dd($data);



    //    $subCats = SubCategories::findMany($request->subcategory_id);
    //    foreach ($subCats as $key => $subCat)
    //    {
    //         $cats = null;
    //    }


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
