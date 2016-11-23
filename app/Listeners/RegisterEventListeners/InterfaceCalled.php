<?php

namespace App\Listeners\RegisterEventListeners;

use App\Business\Log\BeanLog;
use App\Business\Log\InterfaceLog;
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
     * @param  RegisterEvent  $event
     * @return void
     */
    public function handle(RegisterEvent $event)
    {
        $this->createInterfaceLog($event);
    }

    /**
     * @param RegisterEvent $event
     */
    protected function createInterfaceLog(RegisterEvent $event)
    {
        $event->interfaceLog = InterfaceLog::create([
            'token_id'        => \Auth::user()->token()->id,
            'request_method'  => $event->request->method(),
            'request_url'     => $event->request->url(),
            'request_content' => collect($event->request->all())->toJson()
        ]);
    }
}
