<?php

namespace App\Http\Controllers;

use Config;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class CatalogueController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogue1()
    {   
        $cataloguebrands = DB::table('cataloguebrands')
                    ->select('cataloguebrands.id', 'cataloguebrands.banner', 'cataloguebrands.logo', 'cataloguebrands.email', 'cataloguebrands.phone_number', 'cataloguebrands.website', 'cataloguebrands.background_image', 'cataloguebrands.background_color', 'cataloguebrands.footertext1', 'cataloguebrands.footertext2', 'cataloguebrands.no_of_products', 'cataloguebrands.cobrand_logo')
                    ->get();
        // print_r($cataloguebrands);
        $cataloguedetails = DB::table('cataloguedetails')
                    ->select('cataloguedetails.brand_id', 'cataloguedetails.price', 'cataloguedetails.image', 'cataloguedetails.title', 'cataloguedetails.weight', 'cataloguedetails.packsize', 'cataloguedetails.action_btn')
                    ->get();

        return view('catalogue.catalogue1', [
            'cataloguedetails' => $cataloguedetails,
            'cataloguebrands' => $cataloguebrands,
            'cobrand_logo' => $cataloguebrands[0]->cobrand_logo,
            'background_image' => $cataloguebrands[0]->background_image,
            'background_color' => $cataloguebrands[0]->background_color
        ]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogue2()
    {   
        $cataloguebrands = DB::table('cataloguebrands')
                    ->select('cataloguebrands.id', 'cataloguebrands.banner', 'cataloguebrands.logo', 'cataloguebrands.email', 'cataloguebrands.phone_number', 'cataloguebrands.website', 'cataloguebrands.background_image', 'cataloguebrands.background_color', 'cataloguebrands.footertext1', 'cataloguebrands.footertext2', 'cataloguebrands.no_of_products', 'cataloguebrands.cobrand_logo', 'cataloguebrands.logo2')
                    ->get();
        // print_r($cataloguebrands);
        $cataloguedetails = DB::table('cataloguedetails')
                    ->select('cataloguedetails.brand_id', 'cataloguedetails.price', 'cataloguedetails.image', 'cataloguedetails.title', 'cataloguedetails.weight', 'cataloguedetails.packsize', 'cataloguedetails.action_btn')
                    ->get();

        
        return view('catalogue.catalogue2', [
            'cataloguedetails' => $cataloguedetails,
            'cataloguebrands' => $cataloguebrands,
            'cobrand_logo' => $cataloguebrands[0]->cobrand_logo
        ]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogue3()
    {   
        $cataloguebrands = DB::table('cataloguebrands')
                    ->select('cataloguebrands.id', 'cataloguebrands.banner', 'cataloguebrands.logo', 'cataloguebrands.email', 'cataloguebrands.phone_number', 'cataloguebrands.website', 'cataloguebrands.background_image', 'cataloguebrands.background_color', 'cataloguebrands.footertext1', 'cataloguebrands.footertext2', 'cataloguebrands.no_of_products', 'cataloguebrands.cobrand_logo', 'cataloguebrands.logo2')
                    ->get();
        // print_r($cataloguebrands);
        $cataloguedetails = DB::table('cataloguedetails')
                    ->select('cataloguedetails.brand_id', 'cataloguedetails.price', 'cataloguedetails.image', 'cataloguedetails.title', 'cataloguedetails.weight', 'cataloguedetails.packsize', 'cataloguedetails.action_btn')
                    ->get();

        return view('catalogue.catalogue3', [
            'cataloguedetails' => $cataloguedetails,
            'cataloguebrands' => $cataloguebrands,
            'cobrand_logo' => $cataloguebrands[0]->cobrand_logo
        ]);
    }
}
