<?php

namespace App\Listeners\LearnEventListeners;

use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\Learn;

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
     * @param  Learn  $event
     * @return void
     */
    public function handle(Learn $event)
    {
        $bean_rate = $event->beanRate = BeanRate::where('name_en', 'register')->first();

        $event->user->modifyBeanAccordingToBeanRate($bean_rate);
    }
}
