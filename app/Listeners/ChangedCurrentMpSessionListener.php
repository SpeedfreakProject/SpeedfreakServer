<?php

namespace Speedfreak\Listeners;

use Speedfreak\Contracts\State;
use Speedfreak\Events\Multiplayer\ChangedCurrentMpSession;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangedCurrentMpSessionListener implements ShouldQueue
{
    /**
     * @var State
     */
    private $state;

    /**
     * Create the event listener.
     * @param State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Handle the event.
     *
     * @param  ChangedCurrentMpSession  $event
     * @return void
     */
    public function handle(ChangedCurrentMpSession $event)
    {
        $this->state->saveSessionData($event->getCurrentMpSessionId());
    }
}
