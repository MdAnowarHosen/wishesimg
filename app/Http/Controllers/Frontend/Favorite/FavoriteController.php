<?php

namespace App\Http\Controllers\Frontend\Favorite;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class FavoriteController extends Controller
{
       /**
     * add bookmark
     */
    public function addFavorite(Request $request)
    {
        $product = Product::whereSlug($request->slug)->first();

        if ($product != null)
        {
            /**
             * send product to checkFavorite private method to check that
             * product already added to favorite list or not
             *
             */
            $check = $this->checkFavorite($product);
            /**
             * if bookmark already exists then remove it
             */
            if ($check == true)
            {
                Toast::title('Already added!')
                ->message('Product already added to favorite!')
                ->warning()
                ->autoDismiss(5);
                return redirect()->back();
            }
            else
            {
                DB::beginTransaction();
                try
                {
                    Auth::user()->favorites()->attach($product->id);
                    DB::commit();
                    Toast::title('Success')
                    ->message('Added to favorite')
                    ->success()
                    ->autoDismiss(5);
                    return redirect()->back();

                }
                catch (\Throwable $th)
                {
                    DB::rollBack();
                    Toast::title('Failed!')
                    ->message('Failed to add into favorite!')
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
    private function checkFavorite($product)
    {
        $check = Auth::user()->favorites->contains($product->id);
        if ($check == true)
        {
            return $check;
        }
        else
        {
            return null;
        }
    }

    public function removeFavorite(Request $request)
    {
        $product = Product::whereSlug($request->slug)->first();
        if ($product != null)
        {
            $check = $this->checkFavorite($product);
            if ($check == true)
            {
                $delete = Auth::user()->favorites()->detach($product->id);
                if ($delete != null)
                {
                    Toast::title('Success')
                    ->message('Removed from favorite')
                    ->success()
                    ->autoDismiss(5);
                    return redirect()->back();
                }
                else
                {
                    Toast::title('Failed!')
                    ->message('Failed to remove from favorite!')
                    ->warning()
                    ->autoDismiss(5);
                    return redirect()->back();
                }
            }
            else
            {
                Toast::title('Failed!')
                ->message('That product not found to your favorite list!')
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
