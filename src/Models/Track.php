<?php

namespace Nh\Trackable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Track extends Model
{

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

    /**
     * Get the owning trackable model.
     * @return Illuminate\Database\Eloquent\Model
     */
    public function trackable()
    {
        return $this->morphTo();
    }

    /**
     * Get the model name in lowercase.
     *
     * @return string
     */
    public function getModelAttribute()
    {
        return Str::kebab(class_basename($this->trackable_type));
    }

    /**
     * Get the user name if exist.
     *
     * @return string
     */
    public function getUsernameAttribute()
    {
        return $this->user ? $this->user->name : '-';
    }

    /**
     * Get the time diff from creation date.
     *
     * @return string
     */
    public function getTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get the formated track.
     *
     * @return string
     */
    public function getFormatedAttribute()
    {
        $event = \Lang::has('trackable.event.'.$this->event) ? __('trackable.event.'.$this->event) : $this->event;
        return __('trackable.track', ['event' => $event,'time' => $this->time, 'by' => $this->username ]);
    }

}
