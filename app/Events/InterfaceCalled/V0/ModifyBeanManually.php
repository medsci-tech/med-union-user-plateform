<?php

namespace App\Events\InterfaceCalled\V0;

use App\Events\InterfaceCalled\InterfaceCalledEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ModifyBeanManually extends InterfaceCalledEvent
{

}
