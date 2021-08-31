<?php
namespace Nh\Trackable\Traits;

use Illuminate\Support\Str;

trait AsTrack
{

      /**
       * Get the owning trackable model.
       * @return Illuminate\Database\Eloquent\Model
       */
      public function trackable()
      {
          return $this->morphTo();
      }

      /**
       * Get the relation model.
       * @return Illuminate\Database\Eloquent\Model
       */
      public function relation()
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
       * Get the model name in lowercase.
       *
       * @return string
       */
      public function getRelationModelAttribute()
      {
          return Str::kebab(class_basename($this->relation_type));
      }

      /**
       * Get the user name if exist.
       *
       * @return string
       */
      public function getUsernameAttribute()
      {
          return $this->user ? $this->user->name : config('app.name');
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
