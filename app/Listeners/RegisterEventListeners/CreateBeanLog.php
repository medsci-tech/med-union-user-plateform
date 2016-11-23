<?php

namespace App\Listeners\RegisterEventListeners;

use App\Business\Bean\BeanRate;
use App\Business\Log\BeanLog;
use App\Events\InterfaceCalled\Register as RegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBeanLog
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
        $user = $event->user;
        $event->beanLog = BeanLog::create([
            'user_id' => $user->id,
            'bean_rate_id' => $event->beanRate->id,
            'beans_before' => $event->beansBefore,
            'beans_after' => $event->beansAfter
        ]);
    }
}
