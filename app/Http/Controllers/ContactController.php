<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use Session;

use Illuminate\Support\Facades\Input;
use Validator;
//use App\Http\JsonResponse;
class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        return view('contact');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'message' => 'required',
            'email' => 'required'//,
            // 'g-recaptcha-response' => 'required|recaptcha'
        ]);
        
        print_r($request->name);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        print_r($validator->fails());
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
    
    public function sendmessage(Request $request)
    {
        // $data = Input::all();
        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'message' => $request->message,
            'phone' => $request->phone
        );

        // print_r($data);
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

        Session::flash('success', 'Email sent successfully');
        return redirect('contact');
    }

}
