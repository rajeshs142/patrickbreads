<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Banner;

use DB;

use Config;

class BannerComposer
{
    //public $movieList = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->banner = DB::table('banner')
                        ->where('banner.title_left', '<>', '')
                        ->orderBy('updated_at', 'desc')
                        ->first();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('banner' , $this->banner);
    }
}