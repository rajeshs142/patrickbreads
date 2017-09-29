<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Product;

use Cocur\Slugify\Slugify;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '%'.$request->input('search').'%';
        $sort = $request->input('sort');
        $sort = $sort ? 'product.'.$sort : 'product.updated_at';
        $product = DB::table('product')
                    ->when($search, function ($query) use ($search) {
                        return $query->where('product.name', 'like', $search)
                                    ->orWhere('category.name', 'like', $search)
                                    ->orWhere('users.name', 'like', $search);
                    })
                    ->join('category', 'product.category_id', '=', 'category.id')
                    ->join('users', 'product.created_by', '=', 'users.id')
                    ->select('product.id', 'product.name', 'product.tags', 'category.name as category', 'users.name as username', 'product.updated_at' )
                    ->orderBy($sort, 'desc')
                    ->get();

        $data = [ 'data' => $product];
        return view('partials.admin.admin-product', $data);
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
        $category = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->join('product', 'category.id', '=', 'product.category_id')
                      ->orderBy('category.name', 'desc')
                      ->distinct()->get();
        $sub_category = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->join('product', 'category.id', '=', 'product.sub_category_id')
                      ->orderBy('category.name', 'desc')
                      ->distinct()->get();
        $sub_category2 = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->join('product', 'category.id', '=', 'product.sub_category2_id')
                      ->orderBy('category.name', 'desc')
                      ->distinct()->get();
        $users = DB::table('users')
                  ->select('users.name as username', 'users.id as id')
                  ->orderBy('username', 'desc')
                  ->get();
        return view('partials.admin.admin-add-product', ['category' => $category, 'users' => $users, 'sub_category' => $sub_category, 'sub_category2' => $sub_category2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        $slugify = new Slugify();
        $product = new Product;
        $product->name = $request->input('name');
        $product->product_slug = $slugify->slugify($product->name);;
        $product->category_id = $request->input('category');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->ingredients = $request->input('ingredients');
        // $product->sub_category_id = $request->input('sub_category');
        $product->sub_category2_id = $request->input('sub_category2');
        $product->manufacturer_id = 1;
        
        $file = $request->file('image_url');
        if($file) {
            $name = $file->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $file->move('img', $name);
            $product->image_url = '/img/'.$name;
        
            // $file = $request->file('thumb_url');
            // $name = $file->getClientOriginalName();
            // $file->move('img', $name);
            $product->thumb_url = '/img/'.$name;
        }
        else {
            $product->image_url = '/img/breads_g.png';
            $product->thumb_url = '/img/breads_g.png';            
        }
        $product->code = $request->input('code');
        $product->color = $request->input('color');
        $product->texture = $request->input('texture');
        $product->size = $request->input('size');
        $product->pack_size = $request->input('pack_size');
        $product->unit_weight = $request->input('unit_weight');
        $product->case_weight = $request->input('case_weight');
        $product->dimensions = $request->input('dimensions');
        $product->serving_size = $request->input('serving_size');
        $product->shelf_life = $request->input('shelf_life');
        $product->storage = $request->input('storage');
        $product->energy = $request->input('energy');
        $product->allergens = $request->input('allergens');
        $product->created_by = $request->input('author');
        $product->tags = $request->input('tags');
        $product->save();
        return redirect()->action('ProductController@index');
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
                  ->where('product.id', '=', $id)
                  ->join('category', 'product.category_id', '=', 'category.id')
                  ->join('users', 'product.created_by', '=', 'users.id')
                  ->select('product.id', 'product.name',  'product.description', 'product.short_description', 'product.image_url', 'product.dimensions', 'product.serving_size', 'product.shelf_life', 'product.storage', 'product.tags', 'category.name as category', 'users.name as username', 'product.created_at', 'product.updated_at' )
                  ->first();

        $data = [ 'data' => $product];
        return view('partials.admin.admin-show-product', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->join('product', 'category.id', '=', 'product.category_id')
                      ->orderBy('category.name', 'desc')
                      ->distinct()->get();
        $sub_category = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->join('product', 'category.id', '=', 'product.sub_category_id')
                      ->orderBy('category.name', 'desc')
                      ->distinct()->get();
        $sub_category2 = DB::table('category')
                      ->select('category.name as category', 'category.id as id')
                      ->join('product', 'category.id', '=', 'product.sub_category2_id')
                      ->orderBy('category.name', 'desc')
                      ->distinct()->get();
        $users = DB::table('users')
                  ->select('users.name as username', 'users.id as id')
                  ->orderBy('username', 'desc')
                  ->get();

        $product = new Product;
        $data = [ 'product' => $product->find($id), 'category' => $category, 'users' => $users, 'sub_category' => $sub_category, 'sub_category2' => $sub_category2];
        return view('partials.admin.admin-edit-product', $data);
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
        $slugify = new Slugify();
        $product = new Product;
        $product = $product->find($id);
        $product->name = $request->input('name');
        $product->product_slug = $slugify->slugify($product->name);;
        $product->category_id = $request->input('category');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->ingredients = $request->input('ingredients');
        $product->sub_category_id = $request->input('sub_category');
        // $product->sub_category2_id = $request->input('sub_category2');
        $product->manufacturer_id = 1;
        
        $file = $request->file('image_url');
        if($file) {
            $name = $file->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $file->move('img', $name);
            $product->image_url = '/img/'.$name;
        
            // $file = $request->file('thumb_url');
            // $name = $file->getClientOriginalName();
            // $file->move('img', $name);
            $product->thumb_url = '/img/'.$name;
        }
        else {
            $product->image_url = '/img/breads_g.png';
            $product->thumb_url = '/img/breads_g.png';            
        }
        $product->code = $request->input('code');
        $product->color = $request->input('color');
        $product->texture = $request->input('texture');
        $product->size = $request->input('size');
        $product->pack_size = $request->input('pack_size');
        $product->unit_weight = $request->input('unit_weight');
        $product->case_weight = $request->input('case_weight');
        $product->dimensions = $request->input('dimensions');
        $product->serving_size = $request->input('serving_size');
        $product->shelf_life = $request->input('shelf_life');
        $product->storage = $request->input('storage');
        $product->energy = $request->input('energy');
        $product->allergens = $request->input('allergens');
        $product->created_by = $request->input('author');
        $product->tags = $request->input('tags');
        $product->save();
        $product->update();
        return redirect()->action('ProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = new Product;
        $product->destroy($id);
        return redirect()->action('ProductController@index');
    }
}
