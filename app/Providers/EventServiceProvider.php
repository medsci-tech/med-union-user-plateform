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
        \App\Events\InterfaceCalled\Register::class => [
            \App\Listeners\RegisterEventListeners\InterfaceCalled::class,
            \App\Listeners\RegisterEventListeners\CreateUserAndRelativeDatasets::class,
            \App\Listeners\RegisterEventListeners\AddBean::class,
            \App\Listeners\RegisterEventListeners\DumpDataIntoStatisticsDatabase::class,
            \App\Listeners\RegisterEventListeners\InterfaceSucceed::class,
        ],
        \App\Events\InterfaceCalled\Learn::class => [
            \App\Listeners\LearnEventListeners\InterfaceCalled::class,
            \App\Listeners\LearnEventListeners\AddBean::class,
            \App\Listeners\LearnEventListeners\DumpDataIntoStatisticsDatabase::class,
            \App\Listeners\LearnEventListeners\InterfaceSucceed::class,
        ],
        \App\Events\InterfaceCalled\Consume::class => [
            \App\Listeners\ConsumeEventListeners\InterfaceCalled::class,
            \App\Listeners\ConsumeEventListeners\AddBean::class,
            \App\Listeners\ConsumeEventListeners\DumpDataIntoStatisticsDatabase::class,
            \App\Listeners\ConsumeEventListeners\InterfaceSucceed::class,
        ],
        \App\Events\InterfaceCalled\ModifyBeanManually::class => [
            \App\Listeners\ModifyBeanManuallyEventListeners\InterfaceCalled::class,
            \App\Listeners\ModifyBeanManuallyEventListeners\AddBean::class,
            \App\Listeners\ModifyBeanManuallyEventListeners\DumpDataIntoStatisticsDatabase::class,
            \App\Listeners\ModifyBeanManuallyEventListeners\InterfaceSucceed::class,
        ],
        \App\Events\InterfaceCalled\QueryUser::class => [
            \App\Listeners\QueryUserEventListeners\InterfaceCalled::class,
            \App\Listeners\QueryUserEventListeners\InterfaceSucceed::class,
        ],
        \App\Events\InterfaceCalled\QueryUserBeanLogs::class => [
            \App\Listeners\QueryUserBeanLogsEventListeners\InterfaceCalled::class,
            \App\Listeners\QueryUserBeanLogsEventListeners\InterfaceSucceed::class,
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
