<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ProductPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->orderBy('category.name', 'desc')
                      ->get();
        return view('admin.add-story', ['category' => $category, 'sub_category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('product')
                    ->where('product.id', $id)                        
                    ->first();

        $category = DB::table('product')
                    ->where('product.id', $id)
                    -> select('product.category_id')
                    ->first();

        // add sub_category2_id later
        $product_categories = DB::table('product')
                    ->where('product.id', $id)
                    -> select('product.category_id','product.sub_category_id')
                    ->first();
        foreach($product_categories as $product_category) {
            $category_names[] = DB::table('category')
                    ->where('category.id', $product_category)
                    -> select('category.name', 'category_slug')
                    ->get();
        }
        
        // enable if we are using sub category 2
        // if($product_categories->sub_category2_id) {
//             $final_category = $product_categories->sub_category2_id;
//             $cat_type = 'sub_category2_id';
//         }
//         else
        if($product_categories->sub_category_id) {
            $final_category = $product_categories->sub_category_id;
            $cat_type = 'sub_category_id';
        }
        else {
            $final_category = $product_categories->category_id;
            $cat_type = 'category_id';
        }

        
        $products = DB::table('product')
                    ->where('product.'.$cat_type, $final_category)
                    ->paginate(16);

        return view('product_single', [ 'product' => $product, 'products' => $products, 'product_categories' => $category_names ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showSlug($slug)
    {
        $product = DB::table('product')
                    ->where('product.product_slug', '=', $slug)
                    ->select('product.id')
                    ->first();

        if (!$product) {
            abort(404);
        }
        return $this->show($product->id);
    }
}
