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
          $model->isDirty($model->getDeletedAtColumn()) &&
          $model->isDirty($model->getUpdatedAtColumn()) &&
          count($model->getDirty()) == 2
        ) { return; }
        $model->addTrack('updated');
    }

    /**
     * Deleted a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleted($model)
    {
        if(
          in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($model)) &&
          $model->isForceDeleting()
        ) {
            $model->addTrack('soft-deleted');
        } else {
            $model->addTrack('deleted');
        }
    }

    /**
     * Restored a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function restored($model)
    {
        $model->addTrack('restored');
    }

    /**
     * Force deleted a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function forceDeleted($model)
    {
        $model->addTrack('force-deleted');
    }
}
