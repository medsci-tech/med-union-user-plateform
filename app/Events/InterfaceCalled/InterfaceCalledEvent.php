<?php


namespace App\Events\InterfaceCalled;


use App\Business\Log\BeanLog;
use App\Business\Log\InterfaceLog;
use App\User;
use Illuminate\Http\Request;

/**
 * Class InterfaceCalledEvent
 * @package App\Events\InterfaceCalled
 */
class InterfaceCalledEvent
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var null|InterfaceLog
     */
    public $interfaceLog;

    /**
     * Register constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->interfaceLog = null;
    }
}