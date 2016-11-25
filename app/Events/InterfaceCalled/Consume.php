<?php

namespace App\Events\InterfaceCalled;

use App\Business\Bean\BeanRate;
use App\Http\Requests\ThirdPartyInterfaces\V1\ConsumeRequest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class Consume
 * @package App\Events\InterfaceCalled
 */
class Consume extends InterfaceCalledEvent
{
    /**
     * @var \App\User
     */
    public $user;
    /**
     * @var BeanRate
     */
    public $beanRate;
    /**
     * @var float
     */
    public $multiplicant;

    /**
     * Consume constructor.
     * @param \App\Http\Requests\ThirdPartyInterfaces\V1\ConsumeRequest $request
     */
    public function __construct(ConsumeRequest $request)
    {
        parent::__construct($request);
        $this->user = $request->getTargetUser();
        $this->beanRate = $this->getBeanRate();
        $this->multiplicant = $request->getMultiplicant();
    }

    /**
     * @return BeanRate
     */
    protected function getBeanRate()
    {
        return BeanRate::where('name_en', 'consume')->firstOrFail();
    }
}
