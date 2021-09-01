<?php

namespace Nh\Trackable\Listeners;

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

        // Event should be like:
        // $event->name (created/updated/deleted)
        // $event->model (the model who is tracked)
        // $event->relation (the model in relation)
        // $event->number (number of relation affected)


        if(in_array('Nh\Trackable\Traits\Trackable', class_uses($event->model)))
        {
            $name        = $event->name ?? 'undefined';
            $relation    = $event->relation ?? null;
            $number      = $event->number ?? 1;
            $comment     = $event->comment ?? null;

            $event->model->addTrack($name,$relation,$number,$comment);
        }
    }
}
