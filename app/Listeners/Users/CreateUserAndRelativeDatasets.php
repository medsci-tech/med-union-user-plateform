<?php

namespace App\Listeners\Users;

use App\Business\Bean\Bean;
use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\Register;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserAndRelativeDatasets
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
        $user = $event->user = User::create([
            'phone' => $event->request->input('phone'),
            'name' => $event->request->input('name', null),
            'email' => $event->request->input('email', null),
            'openid' => $event->request->input('openid', null),
            'unionid' => $event->request->input('unionid', null),
            'password' => ($password = $event->request->input('password', null)) ? bcrypt($password) : null
        ]);
        $user->bean()->save(
            Bean::create(['number' => 0])
        );
        $bean_rate = $event->beanRate = BeanRate::where('name_en', 'register')->first();
        $event->project = $bean_rate->project()->first();
        $event->request->created_user = $user;
    }
}
