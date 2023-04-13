<?php

namespace App\Http\Controllers\Frontend\Bookmark;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Bookmark\Bookmark;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\SpladeTable;
use App\Models\Categories\Categories;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\Categories\SubCategories;

class BookmarkController extends Controller
{
    /**
     * show user bookmarks
     */
    public function show()
    {


        SEO::title('Bookmarked Products');

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where('name', 'LIKE', "%{$value}%");
        });

        $products = QueryBuilder::for(Auth::user()->bookmarks())
        ->defaultSort('name')
        ->allowedSorts('name')
         ->allowedFilters('name','categories.id','subcategories.id',$globalSearch)
         ->paginate()
         ->withQueryString();

         $categories = Categories::whereStatus(1)->pluck('name','id')->toArray();
         $subcategories = SubCategories::whereStatus(1)->pluck('name','id')->toArray();

        return view('frontend.bookmarks.show',[
            'bookmarks' => SpladeTable::for($products)
             ->defaultSort('name',)
             ->withGlobalSearch()
             ->column('image')
             ->column('name',sortable:true,searchable:true)
             ->rowLink(fn (Product $product) => route('show.product', $product->slug))
             ->withGlobalSearch()
             ->selectFilter(
                key: 'categories.id',
                label: 'Filter by category',
                options: $categories
            )
            ->selectFilter(
                key: 'subcategories.id',
                label: 'Filter by sub category',
                options: $subcategories
            )


        ]);
    }

    /**
     * add bookmark
     */
    public function addBookmark(Request $request)
    {
        $product = Product::whereSlug($request->slug)->first();


        if ($product != null)
        {
            /**
             * send product to checkBookmark private method to check that
             * product already added to bookmark or not
             *
             */
            $check = $this->checkBookmark($product);
            /**
             * if bookmark already exists then remove it
             */
            if ($check == true)
            {
                Toast::title('Already added!')
                ->message('Product already added to bookmark!')
                ->warning()
                ->autoDismiss(5);
                return redirect()->back();
            }
            else
            {
                DB::beginTransaction();
                try
                {
                    Auth::user()->bookmarks()->attach($product->id);
                    DB::commit();
                    Toast::title('Success')
                    ->message('Added to bookmark')
                    ->success()
                    ->autoDismiss(5);
                    return redirect()->back();

                }
                catch (\Throwable $th)
                {
                    DB::rollBack();
                    Toast::title('Failed!')
                    ->message('Failed to add into bookmark!')
                    ->danger()
                    ->autoDismiss(5);
                    return redirect()->back();
                }
            }
        }
        else
        {
            Toast::title('Not found!')
            ->message('Product not found!')
            ->warning()
            ->autoDismiss(5);
            return redirect()->back();
        }

    }

    /**
     * check product already bookmarked or not for a user
     */
    private function checkBookmark($product)
    {
        $check = Auth::user()->bookmarks->contains($product->id);
        if ($check == true)
        {
            return $check;
        }
        else
        {
            return null;
        }
    }

    public function removeBookmark(Request $request)
    {
        $product = Product::whereSlug($request->slug)->first();
        if ($product != null)
        {
            $check = $this->checkBookmark($product);
            if ($check == true)
            {
                $delete = Auth::user()->bookmarks()->detach($product->id);
                if ($delete != null)
                {
                    Toast::title('Success')
                    ->message('Removed from bookmark')
                    ->success()
                    ->autoDismiss(5);
                    return redirect()->back();
                }
                else
                {
                    Toast::title('Failed!')
                    ->message('Failed to remove from bookmark!')
                    ->warning()
                    ->autoDismiss(5);
                    return redirect()->back();
                }
            }
            else
            {
                Toast::title('Failed!')
                ->message('That product not found to your bookmark list!')
                ->warning()
                ->autoDismiss(5);
                return redirect()->back();
            }

        }
        else
        {
            Toast::title('Not found!')
            ->message('Product not found!')
            ->warning()
            ->autoDismiss(5);
            return redirect()->back();
        }
    }

}
