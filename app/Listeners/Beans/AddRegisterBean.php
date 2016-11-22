<?php

namespace App\Listeners\Beans;

use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\Register;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddRegisterBean
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
     * @param  Register  $event
     * @return void
     */
    public function handle(Register $event)
    {
        $user = $event->user;
        $bean_rate = $event->beanRate;
        $project = $event->project;

        \DB::transaction(function () use ($user, $event, $project, $bean_rate) {
            \DB::table('projects')->lockForUpdate();
            \DB::table('beans')->lockForUpdate();
            $bean = $user->bean()->first()->fresh();
            $event->beansBefore = $bean->number;

            $project->minusBean($bean_rate->rate);
            $user->addBean($bean_rate->rate);

            $bean = $bean->fresh();
            $event->beansAfter = $bean->number;
        });
    }
}