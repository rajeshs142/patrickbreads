<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Carousel;

use Cocur\Slugify\Slugify;

class CarouselController extends Controller
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
        //
        $carousel = new Carousel;
        $data = [ 'data' => $carousel->all()];
        return view('partials.admin.admin-carousel', $data);
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
        $slugify = new Slugify();
        $carousel = new Carousel;
        // $carousel->name = $request->input('carousel');
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->move('img/carousel', $name);
        $carousel->image = '/img/carousel/'.$name;
        $carousel->heading = $request->input('heading');
        $carousel->description = $request->input('description');
		$carousel->action_btn = $request->input('action_btn');
		$carousel->link = $request->input('link');
        $carousel->save();
        return redirect()->action('CarouselController@index');
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carousel = new Carousel;
        $data = [ 'data' => $carousel->find($id)];
        return view('partials.admin.admin-show-carousel', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = new Carousel;
        $data = [ 'data' => $carousel->find($id)];
        return view('partials.admin.admin-edit-carousel', $data);
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
        $carousels = new Carousel();
        $carousel = $carousels->find($id);
        // $carousel->name = $request->input('carousel');
        
        $file = $request->file('image');
        // print_r($file);
        if($file) {
	        $name = $file->getClientOriginalName();
	        $file->move('img/carousel', $name);
	        $carousel->image = '/img/carousel/'.$name;
        }
        $carousel->heading = $request->input('heading');
        $carousel->description = $request->input('description');
		$carousel->action_btn = $request->input('action_btn');
		$carousel->link = $request->input('link');
        $carousel->save();
        return redirect()->action('CarouselController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = new Carousel;
        $carousel->destroy($id);
        return redirect()->action('CarouselController@index');
    }
}
