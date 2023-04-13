<?php

namespace App\Http\Controllers\Frontend\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\Facades\Toast;

class SearchController extends Controller
{
    /**
     * search system
     */
    public function index(Request $request)
    {
        $request->validate([
            'query' => 'max:255',
        ]);

        $form_data = request()->query();
        $item = $form_data['query'];

        if ($item != null)
        {
            $products = Product::search($item)->where('status',1)->paginate(45);
            SEO::title(ucfirst($item));
            return view('frontend.search.index',[
                'products' => $products,
                'title' => ucfirst($item)
            ]);
        }
        else
        {
            Toast::title('Attention!')
            ->message('Please type a query to search!')
            ->warning()
            ->autoDismiss(5);
            return redirect()->back();
        }

    }


}
