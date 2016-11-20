<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Nav;

use DB;

use Config;

class NavComposer
{
    //public $movieList = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->nav = Nav::tree();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('nav' , $this->nav);
    }
}