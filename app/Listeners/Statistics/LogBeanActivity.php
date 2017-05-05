<?php

namespace App\Listeners\Statistics;

use App\Business\Statistic\User\Bean;
use App\Business\Statistic\User\User;
use App\Events\Statistics\BeanActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MongoDB\BSON\UTCDateTime;


class LogBeanActivity
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
     * @param  BeanActivity  $event
     * @return void
     */
    public function handle(BeanActivity $event)
    {
        $bean_log = $event->beanLog;
        Bean::create([
            'user_phone' => $bean_log->user->phone,
            'user_role' => ($bean_log->user->profile != null && $bean_log->user->profile->role != null)? $bean_log->user->profile->role:'user',
            'rule_type_name_en' => $bean_log->beanRate->bean_rate_type->name_en,
            'rule_name_en' => $bean_log->beanRate->name_en,
            'company_name_en' => $bean_log->beanRate->project->application->enterprise->name_en,
            'app_name_en' => $bean_log->beanRate->project->application->name_en,
            'project_name_en' => $bean_log->beanRate->project->name_en,
            'posted_beans' => ($bean_log->user_beans_after - $bean_log->user_beans_before) / $bean_log->beanRate->rate,
            'saved_beans' => ($bean_log->user_beans_after - $bean_log->user_beans_before),
            'create_time' => new UTCDateTime($bean_log->created_at->timestamp * 1000),
        ]);

        if ($u = User::where('phone', $bean_log->user->phone)->first()) {
            $u->update([
                'total_beans' => $bean_log->user_beans_after
            ]);
        }
    }
}
