<?php

namespace App\Listeners\Logs\Statistics;

use App\Events\InterfaceCalled\ModifyBeanManually;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ModifyBeanManually
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
     * @param  ModifyBeanManually  $event
     * @return void
     */
    public function handle(ModifyBeanManually $event)
    {
        //
    }
}
