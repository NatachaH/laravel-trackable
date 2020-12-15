<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nh\Trackable\Traits\AsTrack;

class Track extends Model
{

    use AsTrack;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event','relation','comment'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
      'user'
    ];

    /**
     * Get the model record associated with the user.
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function user()
    {
        $userclass = class_exists('App\Models\User') ? 'App\Models\User' : 'App\User';
        return $this->belongsTo($userclass, 'user_id');
    }

}
