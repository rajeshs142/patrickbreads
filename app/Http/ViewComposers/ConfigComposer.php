<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use Config;

class ConfigComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $heroConfig = Config::get('sections.hero');
        $heroTxtConfig = Config::get('sections.herotext');
        $storyConfig = Config::get('sections.story.content');
        $parallaxConfig = Config::get('sections.parallax');
        $galleryConfig = Config::get('sections.gallery');
        $categoriesConfig = Config::get('sections.categories');
        $feedbackConfig = Config::get('sections.feedback');
        $footerConfig = Config::get('sections.footer');

        $view->with([
            'heroConfig' => $heroConfig,
            'heroTxtConfig' => $heroTxtConfig,
            'storyConfig' => $storyConfig,
            'parallaxConfig' => $parallaxConfig,
            'galleryConfig' => $galleryConfig,
            'categoriesConfig' => $categoriesConfig,
            'footerConfig' => $footerConfig,
            'feedbackConfig' => $feedbackConfig
        ]);
    }
}