<?php

namespace Nh\Trackable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Track extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description'
    ];

    /**
     * Get the model record associated with the user.
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
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
        return Str::lower(class_basename($this->trackable_type));
    }

}
