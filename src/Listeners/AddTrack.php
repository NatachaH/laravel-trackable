<?php

namespace Nh\Trackable\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddTrack
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(in_array('Nh\Trackable\Traits\Trackable', class_uses($event->model)))
        {
            $name = $event->name ?? 'undefined';
            $relation = $event->relation ?? null;
            $comment = $event->comment ?? null;
            $event->model->addTrack($name,$relation,$comment);
        }
    }
}
