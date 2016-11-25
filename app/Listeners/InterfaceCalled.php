<?php

namespace App\Listeners;

use App\Business\Log\BeanLog;
use App\Business\Log\InterfaceLog;
use App\Events\InterfaceCalled\InterfaceCalledEvent;
use App\Events\InterfaceCalled\Register as RegisterEvent;

class InterfaceCalled
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InterfaceCalledEvent  $event
     * @return void
     */
    public function handle(InterfaceCalledEvent $event)
    {
        $this->createInterfaceLog($event);
    }

    /**
     * @param InterfaceCalledEvent $event
     */
    protected function createInterfaceLog(InterfaceCalledEvent $event)
    {
        $event->interfaceLog = InterfaceLog::create([
            'token_id'        => \Auth::user()->token()->id,
            'request_method'  => $event->request->method(),
            'request_url'     => $event->request->url(),
            'request_content' => collect($event->request->all())->toJson()
        ]);
    }
}
