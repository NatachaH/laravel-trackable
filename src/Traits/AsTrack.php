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
       * Get the translated event name.
       *
       * @return string
       */
      public function getEventNameAttribute()
      {
          $translation = config('trackable.translations.events');
          return \Lang::has($translation.'.'.$this->event) ? __($translation.'.'.$this->event) : Str::ucfirst($this->event);
      }

      /**
       * Get the color of the event.
       *
       * @return string
       */
      public function getEventColorAttribute()
      {
          return config('trackable.events.'.$this->event.'.color') ?? config('trackable.events.default.color');
      }

      /**
       * Get the icon of the event.
       *
       * @return string
       */
      public function getEventIconAttribute()
      {
          return config('trackable.events.'.$this->event.'.icon') ?? config('trackable.events.default.icon');
      }

      /**
       * Get the parent model name in lowercase.
       *
       * @return string
       */
      public function getModelAttribute()
      {
          return Str::kebab(class_basename($this->trackable_type));
      }

      /**
       * Get the parent model translated name.
       *
       * @return string
       */
      public function getModelNameAttribute()
      {
          $translation = config('trackable.translations.models');
          return \Lang::has($translation.'.'.$this->model) ? trans_choice($translation.'.'.$this->model,1) : Str::ucfirst($this->model);
      }

      /**
       * Get the relation model name in lowercase.
       *
       * @return string
       */
      public function getRelationModelAttribute()
      {
          return Str::kebab(class_basename($this->relation_type));
      }

      /**
       * Get the relation model translated name.
       *
       * @return string
       */
      public function getRelationNameAttribute()
      {
          $translation = config('trackable.translations.relations');
          return \Lang::has($translation.'.'.$this->relation_model) ? trans_choice($translation.'.'.$this->relation_model,1) : Str::ucfirst($this->relation_model);
      }

      /**
       * Get the relation icon.
       *
       * @return string
       */
      public function getRelationIconAttribute()
      {
          return config('trackable.relations.'.$this->relation_model.'.icon') ?? config('trackable.relations.default.icon');
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
