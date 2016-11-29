<?php

namespace App\Listeners\V1\ModifyBeanManuallyEventListeners;

use App\Events\InterfaceCalled\V1\ModifyBeanManually;
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
