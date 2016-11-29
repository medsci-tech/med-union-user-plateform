<?php

namespace App\Events\InterfaceCalled\V0;

use App\Business\Bean\BeanRate;
use App\Business\Log\BeanLog;
use App\Events\InterfaceCalled\InterfaceCalledEvent;
use App\Http\Requests\ThirdPartyInterfaces\V0\LearnRequest;
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
     * @var integer
     */
    public $chance_remains_today;

    /**
     * Learn constructor.
     * @param LearnRequest $request
     */
    public function __construct(LearnRequest $request)
    {
        parent::__construct($request);
        $this->user = $request->getTargetUser();
        $this->beanRate = $this->getBeanRate();
        $this->chance_remains_today = 0;
    }

    /**
     * @return BeanRate
     */
    protected function getBeanRate()
    {
        return BeanRate::where('name_en', 'learn')->firstOrFail();
    }
}
