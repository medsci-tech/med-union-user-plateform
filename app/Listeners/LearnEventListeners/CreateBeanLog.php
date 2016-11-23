<?php

namespace App\Listeners\LearnEventListeners;

use App\Events\InterfaceCalled\Learn;
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
     * @param  Learn  $event
     * @return void
     */
    public function handle(Learn $event)
    {
        //
    }
}
