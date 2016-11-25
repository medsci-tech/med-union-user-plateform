<?php

namespace App\Listeners\QueryUserEventListeners;

use App\Events\InterfaceCalled\QueryUser;


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
     * @param  QueryUser  $event
     * @return void
     */
    public function handle(QueryUser $event)
    {
        $event->request->setResultSet($event->user->fresh(['profile', 'bean'])->makeHidden([
            'created_at', 'updated_at'
        ])->toArray());
    }
}
