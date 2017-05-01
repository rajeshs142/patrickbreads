<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Category;

use Config;

class CategoryPageController extends Controller
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
        //
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
        $category = DB::table('category')
                    ->where('category.id', $id)
                    ->select('category.id', 'category.name', 'category.category_slug', 'category.hero_img', 'category.thumb_img', 'category.url', 'category.parent_id')
                    ->first();

        $category_id = DB::table('category')
                     ->where('category.id', $id)
                     ->select('category.id', 'category.name', 'category.category_slug', 'category.hero_img', 'category.thumb_img', 'category.url', 'category.parent_id')
                     ->first();

        $parent_category_id = DB::table('category')
                    ->where('category.id', $id)
                    ->select('category.parent_id')
                    ->first();
        if ($parent_category_id->parent_id) {
          $parent_category = DB::table('category') 
                      ->where('category.id', $parent_category_id->parent_id)
                      ->select('category.id', 'category.name', 'category.category_slug', 'category.hero_img', 'category.thumb_img', 'category.url', 'category.parent_id')
                      ->first();
        } else {
          $parent_category = null;
        }
        $subCategories = DB::table('category')
                    ->where('category.parent_id', $id)
                    ->select('category.id', 'category.name', 'category.category_slug', 'category.hero_img', 'category.thumb_img', 'category.url', 'category.parent_id')
                    ->get();
        
        $category_products = DB::table('product')
                    ->where('product.category_id', $id)                        
                    ->orWhere('product.sub_category_id', $id)
                    ->orWhere('product.sub_category2_id', $id)
                    ->select('product.id', 'product.name', 'product.thumb_url', 'product.product_slug')
                    ->paginate(16);
        return view('category', [ 'category' => $category, 'categories' => $subCategories, 'parent_category' => $parent_category, 'products' =>  $category_products ]);
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
        $category = DB::table('category')
                    ->where('category.category_slug', '=', $slug)
                    ->select('category.id')
                    ->first();

        if (!$category) {
            abort(404);
        }
        return $this->show($category->id);
    }
}
