<?php

namespace App\Listeners\Beans;

use App\Events\InterfaceCalled\Learn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddLearnBean
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
