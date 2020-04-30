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
        $model->addTrack('updated');
    }

    /**
     * Deleted a model
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleted($model)
    {
        $model->addTrack('deleted');
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
