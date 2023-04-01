<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\SEO;
use App\Models\Categories\Categories;
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

       // dd($request->category_id);

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


       $subCats = SubCategories::findMany($request->subcategory_id);
       foreach ($subCats as $key => $subCat)
       {
            $cats = null;
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
