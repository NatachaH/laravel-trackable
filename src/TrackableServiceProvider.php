<?php
namespace Nh\Trackable;

use Illuminate\Support\ServiceProvider;

class TrackableServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // VENDORS
        $this->publishes([
            __DIR__.'/../config/trackable.php' => config_path('trackable.php'),
            __DIR__.'/../resources/lang' => base_path('lang'),
            __DIR__.'/Models/Track.php' => app_path('Models/Track.php')
        ], 'trackable');

        // MIGRATIONS
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/2020_04_29_000000_create_tracks_table.php');

    }
}
