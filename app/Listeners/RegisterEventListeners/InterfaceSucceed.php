<?php

namespace App\Listeners\RegisterEventListeners;

use App\Events\InterfaceCalled\Register as RegisterEvent;

class InterfaceSucceed
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
        $event->interfaceLog->update([
            'succeed' => 1
        ]);
    }
}
