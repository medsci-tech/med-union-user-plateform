<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\InterfaceCalled\V1\Register::class => [
            \App\Listeners\RegisterEventListeners\CreateUserAndRelativeDatasets::class,
            \App\Listeners\RegisterEventListeners\AddBean::class,
            \App\Listeners\RegisterEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\Learn::class => [
            \App\Listeners\LearnEventListeners\AddBean::class,
            \App\Listeners\LearnEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\Consume::class => [
            \App\Listeners\ConsumeEventListeners\AddBean::class,
            \App\Listeners\ConsumeEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\ModifyBeanManually::class => [
            \App\Listeners\ModifyBeanManuallyEventListeners\AddBean::class,
            \App\Listeners\ModifyBeanManuallyEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\QueryUser::class => [
            \App\Listeners\QueryUserEventListeners\QueryForResult::class,
        ],
        \App\Events\InterfaceCalled\V1\QueryUserBeanLogs::class => [
            \App\Listeners\QueryUserBeanLogsEventListeners\QueryForResult::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
