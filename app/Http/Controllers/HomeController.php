<?php

namespace App\Http\Controllers;

use Config;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')
                    ->where('category.name', '<>', '')
                    ->where('category.parent_id', 0)
                    ->select('category.id', 'category.name', 'category.category_slug', 'category.hero_img', 'category.thumb_img', 'category.url', 'category.parent_id')
                    ->get();

        $carousel = DB::table('carousel')
                    ->select('carousel.id', 'carousel.image', 'carousel.heading', 'carousel.description', 'carousel.action_btn', 'carousel.link')
                    ->get();

        // $subCategories = DB::table('category')
        //             ->where('category.name', '<>', '')
        //             ->where('category.parent_id', '<>', '')
        //             ->select('category.id', 'category.name', 'category.category_slug', 'category.hero_img', 'category.thumb_img', 'category.url', 'category.parent_id')
        //             ->get();
        
        return view('home', [
            //data
            'categories' => $categories,
            'carousel' => $carousel
        ]);
    }
}
