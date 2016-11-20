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

        $product_categories = DB::table('product')
                    ->where('product.id', $id)
                    -> select('product.category_id','product.sub_category_id','product.sub_category2_id')
                    ->first();
        foreach($product_categories as $product_category) {
            $category_names[] = DB::table('category')
                    ->where('category.id', $product_category)
                    -> select('category.name', 'category_slug')
                    ->get();
        }
        $products = DB::table('product')
                    ->where('product.category_id', $category->category_id)
                    ->get();

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
