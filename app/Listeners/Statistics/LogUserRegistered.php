<?php

namespace App\Listeners\Statistics;

use App\Business\Statistic\User\Relationship;
use App\Business\Statistic\User\User;
use App\Events\Statistics\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MongoDB\BSON\UTCDateTime;

class LogUserRegistered
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        dump(1);
        $target_user = $event->target_user;
        $statistics_user = User::create([
            'phone' => $target_user->phone,
            'create_time' => new UTCDateTime($target_user->created_at->timestamp * 1000),
            'role' => $target_user->profile->role,
            'project' => $event->project->name_en,
            'total_beans' => $target_user->bean_number,
            'province' => $target_user->profile->province,
            'city' => $target_user->profile->city,
            'title' => $target_user->profile->title,
            'office' => $target_user->profile->office,
            'hospital_name' => $target_user->profile->hospital_name,
        ]);

        if ($target_user->hasUpperUser()) {
            Relationship::create([
                'upstream_phone' => $target_user->upperUserPhone()->upper_user_phone,
                'downstream_phone' => $target_user->phone,
                'project_name_en' => $event->project->name_en,
                'create_time' => new UTCDateTime($target_user->upperUserPhone()->created_at->timestamp * 1000),
            ]);
        }
    }
}
