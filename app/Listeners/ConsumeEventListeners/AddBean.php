<?php

namespace App\Listeners\ConsumeEventListeners;

use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\Consume;
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
     * @param  Consume  $event
     * @return void
     */
    public function handle(Consume $event)
    {
        $event->user->modifyBeanAccordingToBeanRate($event->beanRate, $event->cash_paid_by_beans);

        if ($event->user->hasUpperUser()) {
            $upper = $event->user->upperUser();
            $upper->modifyBeanAccordingToBeanRate(
                BeanRate::where('name_en', 'cash_consume_upper_feedback')->firstOrFail(),
                $event->cash_paid
            );

        }
    }
}
