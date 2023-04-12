<?php

namespace App\Http\Controllers\Frontend\Bookmark;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Bookmark\Bookmark;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class BookmarkController extends Controller
{
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
