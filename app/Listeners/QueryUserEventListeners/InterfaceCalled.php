<?php

namespace App\Listeners\QueryUserEventListeners;

use App\Events\InterfaceCalled\QueryUser;
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
     * @param  QueryUser  $event
     * @return void
     */
    public function handle(QueryUser $event)
    {
        //
    }
}
