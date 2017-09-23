<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cataloguebrand;

class CataloguebrandsController extends Controller
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
        $cataloguebrands = new Cataloguebrand;
        $data = [ 'data' => $cataloguebrands->all()];
        return view('partials.admin.admin-cataloguebrands', $data);
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
        $cataloguebrands = new Cataloguebrand;
        // $cataloguebrands->name = $request->input('cataloguebrands');
        $logo = $request->file('logo');
        $name = $logo->getClientOriginalName();
        $logo->move('img/cataloguebrands', $name);
        $cataloguebrands->logo = '/img/cataloguebrands/'.$name;
        
        $cobrand = $request->file('cobrand_logo');
        $name = $cobrand->getClientOriginalName();
        $cobrand->move('img/cataloguebrands', $name);
        $cataloguebrands->cobrand_logo = '/img/cataloguebrands/'.$name;
        
        $backgroundimage = $request->file('background_image');
        $name = $backgroundimage->getClientOriginalName();
        $backgroundimage->move('img/cataloguebrands', $name);
        $cataloguebrands->background_image = '/img/cataloguebrands/'.$name;
        
        $cataloguebrands->banner = $request->input('banner');
        $cataloguebrands->email = $request->input('email');
        $cataloguebrands->phone_number = $request->input('phone_number');
        $cataloguebrands->website = $request->input('website');
        $cataloguebrands->background_color = $request->input('background_color');
        $cataloguebrands->footertext1 = $request->input('footertext1');
		$cataloguebrands->footertext2 = $request->input('footertext2');
		$cataloguebrands->no_of_products = $request->input('no_of_products');
        $cataloguebrands->save();
        return redirect()->action('CataloguebrandsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cataloguebrands = new Cataloguebrand;
        $data = [ 'data' => $cataloguebrands->find($id)];
        return view('partials.admin.admin-show-cataloguebrands', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cataloguebrands = new Cataloguebrand;
        $data = [ 'data' => $cataloguebrands->find($id)];
        return view('partials.admin.admin-edit-cataloguebrands', $data);
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
        $cataloguebrands = new Cataloguebrand;
        $cataloguebrands = $cataloguebrands->find($id);
        // $cataloguebrands->name = $request->input('cataloguebrands');
        
        $logo = $request->file('logo');
        // print_r($file);
        if($logo) {
	        $name = $logo->getClientOriginalName();
	        $logo->move('img/cataloguebrands', $name);
	        $cataloguebrands->logo = '/img/cataloguebrands/'.$name;
            
        }
        $cobrand = $request->file('cobrand_logo');
        if($cobrand) {
	        $name = $cobrand->getClientOriginalName();
	        $cobrand->move('img/cataloguebrands', $name);
	        $cataloguebrands->cobrand_logo = '/img/cataloguebrands/'.$name;
            
        }
        $backgroundimage = $request->file('background_image');
        if($backgroundimage) {
	        $name = $backgroundimage->getClientOriginalName();
	        $backgroundimage->move('img/cataloguebrands', $name);
	        $cataloguebrands->background_image = '/img/cataloguebrands/'.$name;
            
        }
        $cataloguebrands->banner = $request->input('banner');
        $cataloguebrands->email = $request->input('email');
        $cataloguebrands->phone_number = $request->input('phone_number');
        $cataloguebrands->website = $request->input('website');
        $cataloguebrands->background_color = $request->input('background_color');
        $cataloguebrands->footertext1 = $request->input('footertext1');
		$cataloguebrands->footertext2 = $request->input('footertext2');
		$cataloguebrands->no_of_products = $request->input('no_of_products');
        $cataloguebrands->save();
        return redirect()->action('CataloguebrandsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cataloguebrands = new Cataloguebrand;
        $cataloguebrands->destroy($id);
        return redirect()->action('CataloguebrandsController@index');
    }
}
