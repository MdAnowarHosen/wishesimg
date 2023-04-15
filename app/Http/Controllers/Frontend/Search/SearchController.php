<?php

namespace App\Http\Controllers\Frontend\Search;

use Illuminate\Http\Request;
use App\Models\Search\Search;
use App\Models\Products\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
            /**
             * store search data
             */
            $this->storeSearch($item);
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

    /**
     * private function to store search data
     */
    private function storeSearch($item)
    {
         /**
           * store search data
           */
          $lower_search_key = strtolower($item);
          $user_id = null;
          $search = null;
          if (Auth::check() && Auth::user()->is_admin == false)
          {
                  $user_id = Auth::id();
          }
          //store data without admin
          if (Auth::check())
          {
              if ((Auth::user()->is_admin == false))
              {
                  $search = array();
                  $search['user_id'] = $user_id;
                  $search['keywords'] = $lower_search_key;
              }
          }
          else
          {
              $search = array();
              $search['user_id'] = $user_id;
              $search['keywords'] = $lower_search_key;

          }
            /**
             * if search variable is not null then store data
             */
            if (isset($search) && $search != null)
            {
                DB::beginTransaction();
                try
                {
                    Search::create($search);
                    DB::commit();
                }
                catch (\Throwable $th)
                {
                   DB::rollBack();
                }
            }
    }

}
