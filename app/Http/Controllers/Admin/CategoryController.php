<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use Cocur\Slugify\Slugify;

class CategoryController extends Controller
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
    public function index()
    {
        $category = new Category;
        $data = [ 'data' => $category->all()];
        return view('partials.admin.admin-categories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $data = [ 'data' => $category->all()];
        return view('partials.admin.admin-categories', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slugify = new Slugify();
        $category = new Category;
        $category->name = $request->input('category');
        $category->category_slug = $slugify->slugify($request->input('category'));
        
        // thumb img
        $thumb_file = $request->file('thumb_img');
        if($thumb_file) {
            $name = $thumb_file->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $thumb_file->move('img', $name);
            $category->thumb_img = '/img/'.$name;
        }
        else {
            $category->thumb_img = '/img/breads_g.png';            
        }
        
        // hero img
        $hero_file = $request->file('hero_img');
        if($hero_file) {
            $name = $hero_file->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $hero_file->move('img', $name);
            $category->hero_img = '/img/'.$name;
        }
        else {
            $category->hero_img = '/img/c_breads_tp.png';
        }
        
        $category->url = $request->input('url');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect()->action('CategoryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = new Category;
        $data = [ 'data' => $category->find($id)];
        return view('partials.admin.admin-show-category', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = new Category;
        $data = [ 'data' => $category->find($id)];
        return view('partials.admin.admin-edit-category', $data);
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
        $categories = new Category();
        $category = $categories->find($id);
        $category->name = $request->input('category');
        $category->category_slug = $slugify->slugify($request->input('category'));

        // thumb img
        $thumb_file = $request->file('thumb_img');
        if($thumb_file) {
            $name = $thumb_file->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $thumb_file->move('img', $name);
            $category->thumb_img = '/img/'.$name;
        }
        else {
            $category->thumb_img = '/img/breads_g.png';            
        }
        
        // hero img
        $hero_file = $request->file('hero_img');
        if($hero_file) {
            $name = $hero_file->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $hero_file->move('img', $name);
            $category->hero_img = '/img/'.$name;
        }
        else {
            $category->hero_img = '/img/c_breads_tp.png';
        }
        $category->url = $request->input('url');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect()->action('CategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = new Category;
        $category->destroy($id);
        return redirect()->action('CategoryController@index');
    }
}
