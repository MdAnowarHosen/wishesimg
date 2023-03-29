<?php

namespace App\Http\Controllers\Admin\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryAddRequest;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\SpladeTable;
use App\Models\Categories\Categories;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        SEO::title('All Categories');

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%");
                });
            });
        });

        $categories = QueryBuilder::for(Categories::class)
        ->defaultSort('name')
        ->allowedSorts('name','slug')
        ->allowedFilters('name','slug', $globalSearch)
        ->paginate()
        ->withQueryString();

        return view('admin.categories.all',[
            'categories' => SpladeTable::for($categories)
            ->defaultSort('name')
            ->withGlobalSearch()
            ->column('name', sortable:true,searchable:true)
            ->column('slug', sortable:true,searchable:true)
            ->column('action')
        ]);
    }

    public function add()
    {
        SEO::title('Add Category');
        return view('admin.categories.add');
    }

    public function store(CategoryAddRequest $request)
    {
        $create = Categories::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        if ($create)
        {
            Toast::title('Success!')
            ->message('Category added successfully')
            ->success()
             ->autoDismiss(5);
            return redirect()->back();
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to add category')
            ->warning()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }


    public function edit(Categories $category)
    {
        SEO::title('Edit Category');
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => "required|unique:categories,slug,$category->id",
        ]);

       $update = $category->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        if ($update)
        {
            Toast::title('Success!')
            ->message('Category updated successfully')
            ->success()
             ->autoDismiss(5);
            return redirect()->back();
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to update category')
            ->warning()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }

    public function destroy(Categories $category)
    {
        $destroy = $category->delete();
        if ($destroy)
        {
            Toast::title('Success!')
            ->message('Category deleted successfully')
            ->success()
             ->autoDismiss(5);
            return redirect()->back();
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to delete category')
            ->warning()
             ->autoDismiss(5);
            return redirect()->back();
        }
    }
}
