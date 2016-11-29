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
            \App\Listeners\V1\RegisterEventListeners\CreateUserAndRelativeDatasets::class,
            \App\Listeners\V1\RegisterEventListeners\AddBean::class,
            \App\Listeners\V1\RegisterEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\Learn::class => [
            \App\Listeners\V1\LearnEventListeners\AddBean::class,
            \App\Listeners\V1\LearnEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\Consume::class => [
            \App\Listeners\V1\ConsumeEventListeners\AddBean::class,
            \App\Listeners\V1\ConsumeEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\ModifyBeanManually::class => [
            \App\Listeners\V1\ModifyBeanManuallyEventListeners\AddBean::class,
            \App\Listeners\V1\ModifyBeanManuallyEventListeners\DumpDataIntoStatisticsDatabase::class,
        ],
        \App\Events\InterfaceCalled\V1\QueryUser::class => [
            \App\Listeners\V1\QueryUserEventListeners\QueryForResult::class,
        ],
        \App\Events\InterfaceCalled\V1\QueryUserBeanLogs::class => [
            \App\Listeners\V1\QueryUserBeanLogsEventListeners\QueryForResult::class,
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
