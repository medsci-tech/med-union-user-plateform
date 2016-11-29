<?php

namespace App\Events\InterfaceCalled\V0;

use App\Business\Bean\BeanRate;
use App\Business\Log\BeanLog;
use App\Business\Project\Project;
use App\Events\InterfaceCalled\InterfaceCalledEvent;
use App\Http\Requests\ThirdPartyInterfaces\V0\RegisterRequest;
use App\User;


/**
 * Class Register
 * @package App\Events\InterfaceCalled
 */
class Register extends InterfaceCalledEvent
{
    /**
     * @var null|User
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
     * @var null|Project
     */
    public $project;

    /**
     * @var RegisterRequest
     */
    public $request;

    /**
     * Register constructor.
     * @param RegisterRequest $request
     */
    public function __construct(RegisterRequest $request)
    {
        parent::__construct($request);
        $this->user = null;
        $this->beanLog = null;
        $this->beanRate = null;
        $this->project = null;
    }
}
