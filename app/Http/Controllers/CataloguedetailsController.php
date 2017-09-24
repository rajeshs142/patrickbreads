<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cataloguedetail;

use Validator;

class CataloguedetailsController extends Controller
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
        $cataloguedetails = new Cataloguedetail;
        $data = [ 'data' => $cataloguedetails->all()];
        return view('partials.admin.admin-cataloguedetails', $data);
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
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
           'image' => 'required'
        ]);
        // $slugify = new Slugify();
        $cataloguedetails = new Cataloguedetail;
        // $cataloguedetails->name = $request->input('cataloguedetails');
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('img/cataloguedetails', $name);
        $cataloguedetails->image = '/img/cataloguedetails/'.$name;
        $cataloguedetails->brand_id = $request->input('brand_id');
        $cataloguedetails->price = $request->input('price');
        $cataloguedetails->title = $request->input('title');
        $cataloguedetails->weight = $request->input('weight');
        $cataloguedetails->packsize = $request->input('packsize');
		$cataloguedetails->action_btn = $request->input('action_btn');
        $cataloguedetails->save();
        return redirect()->action('CataloguedetailsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cataloguedetails = new Cataloguedetail;
        $data = [ 'data' => $cataloguedetails->find($id)];
        return view('partials.admin.admin-show-cataloguedetails', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cataloguedetails = new Cataloguedetail;
        $data = [ 'data' => $cataloguedetails->find($id)];
        return view('partials.admin.admin-edit-cataloguedetails', $data);
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
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required'
        ]);
        
        $cataloguedetails = new Cataloguedetail;
        $cataloguedetails = $cataloguedetails->find($id);
        // $cataloguedetails->name = $request->input('cataloguedetails');
        
        $file = $request->file('image');
        // print_r($file);
        if($file) {
	        $name = $file->getClientOriginalName();
	        $file->move('img/cataloguedetails', $name);
	        $cataloguedetails->image = '/img/cataloguedetails/'.$name;
        }
        $cataloguedetails->brand_id = $request->input('brand_id');
        $cataloguedetails->price = $request->input('price');
        $cataloguedetails->title = $request->input('title');
        $cataloguedetails->weight = $request->input('weight');
        $cataloguedetails->packsize = $request->input('packsize');
        $cataloguedetails->action_btn = $request->input('action_btn');
        $cataloguedetails->save();
        return redirect()->action('CataloguedetailsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cataloguedetails = new Cataloguedetail;
        $cataloguedetails->destroy($id);
        return redirect()->action('CataloguedetailsController@index');
    }
}
