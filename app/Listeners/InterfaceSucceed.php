<?php


namespace App\Listeners;


use App\Events\InterfaceCalled\InterfaceCalledEvent;

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
     * @param  InterfaceCalledEvent  $event
     * @return void
     */
    public function handle(InterfaceCalledEvent $event)
    {
        $event->interfaceLog->update([
            'succeed' => 1
        ]);
    }
}