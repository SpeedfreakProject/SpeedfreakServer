<?php

namespace Speedfreak\Events\Multiplayer;

use Speedfreak\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChangedCurrentMpSession extends Event
{
    use SerializesModels;

    protected $mpSessionId = 0;

    /**
     * Create a new event instance.
     * @param int $mpSessionId
     */
    public function __construct(int $mpSessionId)
    {
        $this->mpSessionId = $mpSessionId;
    }

    public function getCurrentMpSessionId()
    {
        return $this->mpSessionId;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
