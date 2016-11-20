<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = '%'.$keyword.'%';
        $sort = $request->input('sort');
        $sort = $sort ? 'product.'.$sort : 'product.updated_at';
        $product = DB::table('product')
                    ->when($search, function ($query) use ($search) {
                        return $query->where('product.name', 'like', $search)
                                    ->orWhere('category.name', 'like', $search);
                    })
                    ->where('product.name', '<>', '')
                    ->join('category', 'product.category_id', '=', 'category.id')
                    ->select('product.id', 'product.name', 'product.thumb_url', 'product.image_url', 'product.product_slug', 'category.name as category', 'product.updated_at' )
                    ->orderBy($sort, 'desc')
                    ->paginate(15);

        // set path for pagination
        $product->setPath('/search?search='.$keyword);
        
        $data = [ 'product' => $product, 'search' => '<span> Search results for </span><strong>'.$keyword.'</strong>', 'keyword' => $keyword ];

        return view('search', $data);
    }
}
