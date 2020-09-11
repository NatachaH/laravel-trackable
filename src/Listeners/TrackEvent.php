<?php

namespace Nh\Trackable\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TrackEvent
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
          $name = $event->name ?? 'undefined';
          $comment = $event->comment ?? null;
          $event->model->addTrack($name,$comment);
    }
}