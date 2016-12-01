<?php

namespace App\Events\Statistics;

use App\Business\Project\Project;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserRegistered
{
    public $target_user;
    public $project;
    use InteractsWithSockets, SerializesModels;

    /**
     *
     * Create a new event instance.
     *
     * @param User   $target_user
     * @param Project $project
     */
    public function __construct($target_user, $project= null)
    {
        $this->target_user = $target_user;
        $this->project = $project;
    }
}
