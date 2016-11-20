<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Banner;

class BannerController extends Controller
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
        $banner = new Banner;
        $data = [ 'data' => $banner->all() ];
        return view('partials.admin.admin-banner', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = new Banner;
        $data = [ 'data' => $banner->all()];
        return view('partials.admin.admin-banner', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->title_left = $request->input('title_left');
        $banner->title_right = $request->input('title_right');
        $banner->link = $request->input('link');
        $banner->save();
        return redirect()->action('BannerController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = new Banner;
        $data = [ 'data' => $banner->find($id) ];
        return view('partials.admin.admin-show-banner', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = new Banner;
        $data = [ 'data' => $banner->find($id)];
        return view('partials.admin.admin-edit-banner', $data);
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
        $banner = new Banner();
        $banner = $banner->find($id);
        $banner->title_left = $request->input('title_left');
        $banner->title_right = $request->input('title_right');
        $banner->link = $request->input('link');
        $banner->save();
        return redirect()->action('BannerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = new Banner;
        $banner->destroy($id);
        return redirect()->action('BannerController@index');
    }
}