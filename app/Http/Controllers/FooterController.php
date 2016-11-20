<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use Illuminate\Support\Facades\Input;

class FooterController extends Controller
{
    public function store(Request $request)
    {
        $data = Input::all();
        $this->validate($request, [
            'name' => 'required',
            'message' => 'required',
            'email' => 'required',
        ]);
        if($data) {
            Mail::send('partials.feedback_message', ['data' => $data], function($message) use ($data) {
                $message->from($data['email'], 'feedback from '.$data['name']);
                $message->to('rajeshs142@gmail.com', 'rajesh')->subject('feedback from '.$data['name']);
            });
        }
        return view('home');
    }

}
