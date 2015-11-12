<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        //SITE
        view()->composer('site.partials.categories-menu', \App\Http\ViewComposers\CategoriesMenuComposer::class);
        view()->composer('site.partials.social-links', \App\Http\ViewComposers\SocialLinksComposer::class);
        view()->composer('site.partials.top-nav', \App\Http\ViewComposers\TopNavComposer::class);
        view()->composer('site.partials.bottom-nav', \App\Http\ViewComposers\BottomNavComposer::class);

        //ROOT
        view()->composer('root.partials.top-nav', \App\Http\ViewComposers\Root\TopNavComposer::class);
        view()->composer('root.partials.settings-menu', \App\Http\ViewComposers\Root\SettingsMenuComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
