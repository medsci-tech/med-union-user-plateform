<?php

namespace App\Listeners\RegisterEventListeners;

use App\Business\Bean\Bean;
use App\Business\Bean\BeanRate;
use App\Business\Profile\Profile;
use App\Business\UserRelevance\UpperUserPhone;
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
     * @param  InterfaceCalled $event
     * @return void
     */
    public function handle(Register $event)
    {
        $user = $this->createUserAndBean($event);
        $this->createUpperIfExists($event, $user);
        $this->createUserProfile($event, $user);
    }

    /**
     * @param \App\Events\InterfaceCalled\Register $event
     * @return User
     */
    protected function createUserAndBean(Register $event)
    {
        $user = $event->user = User::create([
            'phone'    => $event->request->input('phone'),
            'name'     => $event->request->input('name', null),
            'email'    => $event->request->input('email', null),
            'openid'   => $event->request->input('openid', null),
            'unionid'  => $event->request->input('unionid', null),
            'password' => ($password = $event->request->input('password', null)) ? bcrypt($password) : null
        ]);
        $user->bean()->save(
            Bean::create(['number' => 0])
        );
        return $user;
    }

    /**
     * @param \App\Events\InterfaceCalled\Register $event
     * @param User                                 $user
     */
    protected function createUpperIfExists(Register $event, $user)
    {
        if ($upper_user_phone = $event->request->input('upper_user_phone', null)) {
            if ($user->upperUserPhones()->where('phone', $upper_user_phone)->first() == null) {
                $user->upperUserPhones()->save(
                    UpperUserPhone::create([
                        'phone'  => $upper_user_phone,
                        'remark' => $event->request->input('upper_user_remark')
                    ])
                );
            }
        }
    }

    /**
     * @param \App\Events\InterfaceCalled\Register $event
     * @param User                                 $user
     */
    protected function createUserProfile(Register $event, $user)
    {
        $user->profile()->save(Profile::create([
            'role'          => $event->request->input('role', null),
            'title'         => $event->request->input('title', null),
            'office'        => $event->request->input('office', null),
            'province'      => $event->request->input('province', null),
            'city'          => $event->request->input('city', null),
            'hospital_name' => $event->request->input('hospital_name', null),
        ]));
    }
}
