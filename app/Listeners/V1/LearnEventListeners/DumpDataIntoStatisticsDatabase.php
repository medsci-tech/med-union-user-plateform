<?php

namespace App\Listeners\V1\LearnEventListeners;

use App\Events\InterfaceCalled\V1\Learn;
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
     * @param  Learn  $event
     * @return void
     */
    public function handle(Learn $event)
    {
        //
    }
}
