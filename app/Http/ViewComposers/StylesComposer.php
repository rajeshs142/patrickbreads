<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use Config;

class StylesComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $headerStyles = Config::get('styles.header');
        $bannerStyles = Config::get('styles.banner');
        $footerStyles = Config::get('styles.footer');
        $navStyles = Config::get('styles.nav');
        $navTopStyles = Config::get('styles.nav-top');
        $galleryStyles = Config::get('styles.gallery');
        $heroStyles = Config::get('styles.hero');
        $herotextStyles = Config::get('styles.herotext');
        $storyStyles = Config::get('styles.story');
        $parallaxStyles = Config::get('styles.parallax');
        $categoriesStyles = Config::get('styles.categories');
        $productsListStyles = Config::get('styles.products-list');
        $productSingleStyles = Config::get('styles.product-single');

        $view->with([
            'galleryStyles' => $galleryStyles,
            'footerStyles' => $footerStyles,
            'navStyles' => $navStyles,
            'navTopStyles' => $navTopStyles,
            'bannerStyles' => $bannerStyles,
            'headerStyles' => $headerStyles,
            'heroStyles' => $heroStyles,
            'storyStyles' => $storyStyles,
            'parallaxStyles' => $parallaxStyles,
            'categoriesStyles' => $categoriesStyles,
            'productsListStyles' => $productsListStyles,
            'productSingleStyles' => $productSingleStyles,
            'herotextStyles' => $herotextStyles
        ]);
    }
}