<?php

namespace Nh\Trackable\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Nh\Addressable\Events\AddressEvent;

class TrackAddressListener
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
    public function handle(AddressEvent $event)
    {
          $event->model->addTrack($event->name);
    }
}
