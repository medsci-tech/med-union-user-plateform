<?php

namespace App\Listeners\V1\QueryUserBeanLogsEventListeners;

use App\Events\InterfaceCalled\V1\QueryUserBeanLogs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueryForResult
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
