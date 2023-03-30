<?php

namespace App\Http\Controllers\Admin\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\SubCategoryAddRequest;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\SpladeTable;
use App\Models\Categories\Categories;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\Categories\SubCategories;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        SEO::title('All Sub Categories');

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%");
                });
            });
        });

        $subCategories = QueryBuilder::for(SubCategories::class)
        ->defaultSort('name')
        ->allowedSorts('name','slug','description')
        ->allowedFilters('name','slug','category_id','description', $globalSearch)
        ->paginate()
        ->withQueryString();

        $categories = Categories::pluck('name','id')->toArray();

        return view('admin.sub-categories.all',[
            'subCategories' => SpladeTable::for($subCategories)
            ->defaultSort('name')
            ->withGlobalSearch()
            ->column('name', sortable:true,searchable:true)
            ->column('slug', sortable:true,searchable:true)
            ->column('description', sortable:true,searchable:true)
            ->selectFilter('category_id',$categories)
            ->column('action')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub-categories.add',[
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryAddRequest $request)
    {
        $create = SubCategories::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        if ($create)
        {
            Toast::title('Success!')
            ->message('Sub Category added successfully')
            ->success()
             ->autoDismiss(5);
            return redirect()->back();
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to add sub category')
            ->warning()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategories $subCategory)
    {
        SEO::title('Edit Sub Category');
        return view('admin.sub-categories.edit',[
            'subCategory' => $subCategory,
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategories $subCategory)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => "required|unique:sub_categories,slug,$subCategory->id",
            'category_id' => 'required|numeric',
            'description' => 'nullable|max:256'
        ]);

       $update = $subCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        if ($update)
        {
            Toast::title('Success!')
            ->message('Sub Category updated successfully')
            ->success()
             ->autoDismiss(5);
            return redirect()->back();
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to update sub category')
            ->warning()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategories $subCategory)
    {
        $destroy = $subCategory->delete();
        if ($destroy)
        {
            Toast::title('Success!')
            ->message('Sub Category deleted successfully')
            ->success()
             ->autoDismiss(5);
            return redirect()->back();
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to delete sub category')
            ->warning()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }
}
