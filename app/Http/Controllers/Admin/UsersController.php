<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Users;


class UsersController extends Controller
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
        $sort = $sort ? 'users.'.$sort : 'users.updated_at';
        $users = DB::table('users')
                    ->when($search, function ($query) use ($search) {
                        return $query->where('users.name', 'like', $search)
                                    ->orWhere('users.email', 'like', $search)
                                    ->orWhere('users.admin', 'like', $search);
                    })
                    ->select('users.id', 'users.name', 'users.email', 'users.admin')
                    ->orderBy($sort, 'desc')
                    ->get();

        $data = [ 'data' => $users];
        return view('partials.admin.admin-users', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')
                  ->where('users.id', '=', $id)
                  ->select('users.id', 'users.name', 'users.email', 'users.admin', 'users.created_at', 'users.updated_at')
                  ->first();

        $data = [ 'data' => $user];
        return view('partials.admin.admin-show-user', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new Users;
        $data = [ 'user' => $user->find($id)];
        return view('partials.admin.admin-edit-user', $data);
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
        $users = new Users;
        $user = $users->find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->admin = $request->input('admin') == 'on' ? 1 : 0;
        $user->save();
        return redirect()->action('UsersController@index');
    }

}