<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Banner;

use DB;

use Session;

class ProductComposer
{
    //public $movieList = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->product = DB::table('product')
                        ->select('name', 'product_slug', 'id')
                        ->where('product.name', '<>', '')
                        ->get();
        Session::put('items', $this->product);
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('product' , $this->product);
    }
}