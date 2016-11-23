<?php

namespace App\Listeners\QueryUserBeanLogsEventListeners;

use App\Events\InterfaceCalled\QueryUserBeanLogs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InterfaceSucceed
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
     * @param  QueryUserBeanLogs  $event
     * @return void
     */
    public function handle(QueryUserBeanLogs $event)
    {
        //
    }
}
