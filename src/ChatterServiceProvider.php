<?php

namespace DevDojo\Chatter;

use Illuminate\Support\ServiceProvider;

class ChatterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/devdojo/chatter/assets'),
        ], 'chatter_assets');

        $this->publishes([
            __DIR__.'/../config/chatter.php' => config_path('chatter.php')
        ], 'chatter_config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'chatter_migrations');
        // include the routes file
        include __DIR__.'/Routes/web.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'chatter');
    }
}
