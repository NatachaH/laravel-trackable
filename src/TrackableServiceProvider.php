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
            __DIR__.'/../database/migrations/2020_04_29_000000_create_tracks_table.php' => base_path('database/migrations/2020_04_29_000000_create_tracks_table.php')
        ], 'trackable');

    }
}
