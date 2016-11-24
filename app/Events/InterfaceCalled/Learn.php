<?php

namespace App\Events\InterfaceCalled;

use App\Business\Bean\BeanRate;
use App\Business\Log\BeanLog;
use App\Http\Requests\ThirdPartyInterfaces\V1\LearnRequest;
use App\User;


class Learn extends InterfaceCalledEvent
{

    /**
     * @var User
     */
    public $user;
    /**
     * @var null|BeanLog
     */
    public $beanLog;

    /**
     * @var null|BeanRate
     */
    public $beanRate;

    /**
     * @var LearnRequest
     */
    public $request;

    /**
     * Learn constructor.
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(\Illuminate\Http\Request $request)
    {
        parent::__construct($request);
        $this->user = $this->getTargetUserByPhone($request);
        $this->beanRate = BeanRate::where('name', 'register')->firstOrFail();
    }
}
