<?php

namespace App\Events\Statistics;

use App\Business\Log\BeanLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BeanActivity
{
    use InteractsWithSockets, SerializesModels;

    public $beanLog;

    /**
     * Create a new event instance.
     *
     * @param \App\Business\Log\BeanLog $beanLog
     */
    public function __construct($beanLog)
    {
        $this->beanLog = $beanLog;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
