<?php

namespace App\Listeners\RegisterEventListeners;

use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\Register;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddBean
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
     * @param  Register  $event
     * @return void
     */
    public function handle(Register $event)
    {
        $user = $event->user;
        $bean_rate = $event->beanRate;

        $user->modifyBeanAccordingToBeanRate($bean_rate);
    }
}