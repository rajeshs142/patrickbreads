<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use Illuminate\Support\Facades\Input;
use \Validator;
//use App\Http\JsonResponse;
class FooterController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'message' => 'required',
            'email' => 'required'
                // ,
//             'g-recaptcha-response' => 'required|recaptcha'
        ]);

        if($validator->fails()) {
            $errors = $validator->errors();
            $errors =  json_decode($errors); 
            
            return response()->json([
                'success' => false,
                'message' => $errors
            ], 422);
        }
        else {
            $data = Input::all();
            if($data) {
                Mail::send('partials.feedback_message', ['data' => $data], function($message) use ($data) {
                    $message->from($data['email'], $data['name']);
                    $message->to(env('MAIL_USERNAME'), env('MAIL_NAME'))->subject('feedback from '.$data['name']);
                });
            }
            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully.'
            ]);
        }
    }
    
    public function footerstore(Request $request)
    {
        $data = Input::all();
        $this->validate($request, [
            'name' => 'required',
            'message' => 'required',
            'email' => 'required',
        ]);
        if($data) {
            Mail::send('partials.feedback_message', ['data' => $data], function($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to(env('MAIL_USERNAME'), env('MAIL_NAME'))->subject('feedback from '.$data['name']);
            });
        }
        return redirect()->action('HomeController@index');
    }

}
