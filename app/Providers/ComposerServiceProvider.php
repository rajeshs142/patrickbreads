<?php

namespace App\Providers;

use Illuminate\View\View;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // styles
        view()->composer(
            'category',
            'App\Http\ViewComposers\StylesComposer'
        );
        view()->composer(
            'product_single',
            'App\Http\ViewComposers\StylesComposer'
        );
        view()->composer(
            'home',
            'App\Http\ViewComposers\StylesComposer'
        );
        view()->composer(
            'search',
            'App\Http\ViewComposers\StylesComposer'
        );
        view()->composer(
            'layouts.app',
            'App\Http\ViewComposers\StylesComposer'
        );
        // nav
        view()->composer(
            'layouts.app',
            'App\Http\ViewComposers\NavComposer'
        );
        view()->composer(
            'partials.nav_top',
            'App\Http\ViewComposers\NavComposer'
        );
        // banner
        view()->composer(
            'partials.banner',
            'App\Http\ViewComposers\BannerComposer'
        );
        // config
        view()->composer(
            'layouts.app',
            'App\Http\ViewComposers\ConfigComposer'
        );
        view()->composer(
            'home',
            'App\Http\ViewComposers\ConfigComposer'
        );
        view()->composer(
            'category',
            'App\Http\ViewComposers\ConfigComposer'
        );
        view()->composer(
            'product_single',
            'App\Http\ViewComposers\ConfigComposer'
        );
        view()->composer(
            'search',
            'App\Http\ViewComposers\ConfigComposer'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
