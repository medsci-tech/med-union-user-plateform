<?php

namespace App\Listeners\ModifyBeanManuallyEventListeners;

use App\Events\InterfaceCalled\ModifyBeanManually;
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
     * @param  ModifyBeanManually  $event
     * @return void
     */
    public function handle(ModifyBeanManually $event)
    {
        //
    }
}
