<?php

namespace Speedfreak\Listeners;

use Speedfreak\Events\Multiplayer\ChangedCurrentMpSession;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangedCurrentMpSessionListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChangedCurrentMpSession  $event
     * @return void
     */
    public function handle(ChangedCurrentMpSession $event)
    {
        //
    }
}
