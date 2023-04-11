<?php

namespace App\Http\Controllers\Frontend\Download;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    //

    /**
     * Download product
     */
    public function downloadPost( Request $request, $slug)
    {
        /**
         * validate data
         */
        $request->validate([
            'img_ql' => 'required|numeric|max:3',
        ],
        [
            'img_ql.required' => 'Please select a image quality!',
            'img_ql.numeric' => 'Invalid image quality selected! Please select a correct one.',
            'img_ql.max' => 'max.',
        ]);


        $product = Product::whereSlug($slug)->first();

        if ($product != null)
        {

            if ($request->img_ql == 1 || $request->img_ql == '1')
            {
                return $this->low($product);
            }
            elseif($request->img_ql == 2 || $request->img_ql == '2')
            {
                return $this->medium($product);
            }
            elseif($request->img_ql == 3 || $request->img_ql == '3')
            {
                return redirect()->route('download.high',$product->slug);
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
         * Download low quality image
         */
        private function low($product)
        {
            $path = "product/low/" . $product->low_quality;

            $extension = Str::afterLast($product->low_quality, '.');

            if (Storage::disk('wishes')->exists($path))
            {
                return Storage::disk('wishes')->download($path, $product->name.'.'.$extension,['Content-Type', 'image/jpeg']);
            }
            else
            {
                Toast::title('Image Not found!')
                ->message("Woops! It's looks like image not available for download!")
                ->warning()
                 ->autoDismiss(5);
                return redirect()->back();
            }

        }

                /**
         * Download medium quality image
         */
        private function medium($product)
        {
            $path = "product/medium/" . $product->medium_quality;

            $extension = Str::afterLast($product->medium_quality, '.');

            if (Storage::disk('wishes')->exists($path))
            {
                return Storage::disk('wishes')->download($path, $product->name.'.'.$extension,['Content-Type', 'image/jpeg']);
            }
            else
            {
                Toast::title('Image Not found!')
                ->message("Woops! It's looks like image not available for download!")
                ->warning()
                 ->autoDismiss(5);
                return redirect()->back();
            }

        }

        /**
         * Download High Quality Image
         */
        public function downloadHigh($slug)
        {
            $product = Product::whereSlug($slug)->first();
            if ($product != null)
            {
                $path = "product/high/" . $product->high_quality;

                $extension = Str::afterLast($product->high_quality, '.');

                if (Storage::disk('wishes')->exists($path))
                {
                    return Storage::disk('wishes')->download($path, $product->name.'.'.$extension,['Content-Type', 'image/jpeg']);
                }
                else
                {
                    Toast::title('Image Not found!')
                    ->message("Woops! It's looks like image not available for download!")
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
