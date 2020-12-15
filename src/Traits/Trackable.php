<?php
namespace Nh\Trackable\Traits;

use App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Models\Track;

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
    public function addTrack($event, $relation = null, $comment = null)
    {
        // Create a new Track
        $track = new Track;

        // Fill the track
        $track->fill([
          'event' => $event,
          'relation' => $relation,
          'comment' => $comment
        ]);

        // If there is an Auth, associate it
        if(Auth::check())
        {
          $track->user()->associate(Auth::user());
        }

        // Save the track
        $this->tracks()->save($track);
    }

}
