<?php

namespace App\Listeners\Logs\Interfaces\Succeed;

use App\Events\InterfaceCalled\Consume;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Consume
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
