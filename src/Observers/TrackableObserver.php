<?php

namespace Nh\Trackable\Observers;

class TrackableObserver
{
    /**
     * Created a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function created($model)
    {
        $model->addTrack('created');
    }

    /**
     * Updated a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function updated($model)
    {
        if(
          in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($model)) &&
          $model->isDirty($model->getDeletedAtColumn()) && $model->isDirty($model->getUpdatedAtColumn()) &&
          count($model->getDirty()) == 2
        ) {
          $event = 'restored';
        } else {
          $event = 'updated';
        }

        $model->addTrack($event);
    }

    /**
     * Deleted a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleted($model)
    {
        if(in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($model))) {
            $event = $model->isForceDeleting() ? 'force-deleted' : 'soft-deleted';
        } else {
            $event = 'deleted';
        }

        $model->addTrack($event);
    }

}
