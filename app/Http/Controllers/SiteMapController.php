<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session; 

class SiteMapController extends Controller
{
    public function index()
    {
       return view('sitemap');
    }
}
