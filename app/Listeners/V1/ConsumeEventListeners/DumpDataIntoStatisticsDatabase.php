<?php

namespace App\Listeners\V1\ConsumeEventListeners;

use App\Events\InterfaceCalled\V1\Consume;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DumpDataIntoStatisticsDatabase
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
