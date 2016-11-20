<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Nav;

class NavController extends Controller
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
        $nav = new Nav;
        $data = [ 'data' => $nav->all() ];
        return view('partials.admin.admin-nav', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = new Nav;
        $data = [ 'data' => $nav->all()];
        return view('partials.admin.admin-nav', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nav = new Nav;
        $nav->title = $request->input('title');
        $nav->link = $request->input('link');
        $nav->order = $request->input('order');
        $nav->parent_id = $request->input('parent_id') == 0 ? NULL : $request->input('parent_id');
        $nav->direction = 'left';
        $nav->save();
        return redirect()->action('NavController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nav = new Nav;
        $data = [ 'data' => $nav->find($id) ];
        return view('partials.admin.admin-show-nav', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nav = new Nav;
        $data = [ 'data' => $nav->find($id)];
        return view('partials.admin.admin-edit-nav', $data);
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
        $nav = new Nav();
        $nav = $nav->find($id);
        $nav->title = $request->input('title');
        $nav->link = $request->input('link');
        $nav->order = $request->input('order');
        $nav->parent_id = $request->input('parent_id') == 0 ? NULL : $request->input('parent_id');
        $nav->direction = 'left';
        $nav->save();
        return redirect()->action('NavController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nav = new Nav;
        $nav->destroy($id);
        return redirect()->action('NavController@index');
    }
}
