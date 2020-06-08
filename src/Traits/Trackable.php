<?php
namespace Nh\Trackable\Traits;

use App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use Nh\Trackable\Track;

trait Trackable
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected static function bootTrackable()
    {
        static::observe(\Nh\Trackable\Observers\TrackableObserver::class);
    }

    /**
     * Get the model record associated with the tracks.
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function tracks()
    {
        return $this->morphMany(Track::class, 'trackable');
    }

    /**
      * Check if the model has some track.
      * @return boolean
      */
     public function hasTracks()
     {
        return $this->tracks()->exists();
     }

    /**
     * Add a track.
     * @param string $event
     */
    public function addTrack($name,$content = null)
    {
        // Create a new Track
        $track = new Track;

        // Define description
        $description = is_null($content) ? $this->defineDescription() : $content;

        // Fill the track
        $track->fill([
          'name' => $name,
          'description' => $description
        ]);

        // If there is an Auth, associate it
        if(Auth::check())
        {
          $track->user()->associate(Auth::user());
        }

        // Save the track
        $this->tracks()->save($track);
    }

    /**
     * Define the default description to use.
     * @return string
     */
    private function defineDescription()
    {
        if(!empty($this->trackable) && array_key_exists($this->trackable, $this->attributes)) {
          $description = $this->attributes[$this->trackable];
        } else if(array_key_exists('title', $this->attributes)) {
          $description = $this->title;
        } else if(array_key_exists('name', $this->attributes)) {
          $description = $this->name;
        } else {
          $description = null;
        }

        return $description;
    }

}
