<?php

namespace App\Events\InterfaceCalled;

use App\Business\Bean\BeanRate;
use App\Business\Log\BeanLog;
use App\Business\Project\Project;
use App\Http\Requests\ThirdPartyInterfaces\RegisterRequest;
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
     * @var float
     */
    public $beansBefore = 0;

    /**
     * @var float
     */
    public $beansAfter = 0;

    /**
     * @var null|BeanRate
     */
    public $beanRate;
    /**
     * @var null|Project
     */
    public $project;

    /**
     * Register constructor.
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(\Illuminate\Http\Request $request)
    {
        parent::__construct($request);
        $this->user = null;
        $this->beanLog = null;
        $this->beanRate = null;
        $this->project = null;
    }
}
