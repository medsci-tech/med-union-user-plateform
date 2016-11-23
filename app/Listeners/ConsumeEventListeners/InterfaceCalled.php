<?php

namespace App\Listeners\ConsumeEventListeners;

use App\Events\InterfaceCalled\Consume;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param  Consume  $event
     * @return void
     */
    public function handle(Consume $event)
    {
        //
    }
}
