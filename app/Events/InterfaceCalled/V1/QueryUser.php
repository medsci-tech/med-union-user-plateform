<?php

namespace App\Events\InterfaceCalled\V1;

use App\Events\InterfaceCalled\InterfaceCalledEvent;
use App\Http\Requests\ThirdPartyInterfaces\V1\QueryUserInformationRequest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QueryUser extends InterfaceCalledEvent
{
    public $user;

    /**
     * @var QueryUserInformationRequest
     */
    public $request;

    public function __construct(QueryUserInformationRequest $request)
    {
        parent::__construct($request);
        $this->user = $request->getTargetUser();
    }

}
