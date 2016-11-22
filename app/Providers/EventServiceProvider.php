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
        'App\Events\InterfaceCalled\Register' => [
            'App\Listeners\Logs\Interfaces\Called\Register',
            'App\Listeners\Users\CreateUserAndRelativeDatasets',
            'App\Listeners\Beans\AddRegisterBean',
            'App\Listeners\Logs\Beans\Register',
            'App\Listeners\Logs\Statistics\Register',
            'App\Listeners\Logs\Interfaces\Succeed\Register',
        ],
        'App\Events\InterfaceCalled\Learn' => [
            'App\Listeners\Logs\Interfaces\Called\Learn',
            'App\Listeners\Beans\AddLearnBean',
            'App\Listeners\Logs\Beans\Learn',
            'App\Listeners\Logs\Statistics\Learn',
            'App\Listeners\Logs\Interfaces\Succeed\Learn',
        ],
        'App\Events\InterfaceCalled\Consume' => [
            'App\Listeners\Logs\Interfaces\Called\Consume',
            'App\Listeners\Beans\AddConsumeBean',
            'App\Listeners\Logs\Beans\Consume',
            'App\Listeners\Logs\Statistics\Consume',
            'App\Listeners\Logs\Interfaces\Succeed\Consume',
        ],
        'App\Events\InterfaceCalled\ModifyBeanManually' => [
            'App\Listeners\Logs\Interfaces\Called\ModifyBeanManually',
            'App\Listeners\Beans\ModifyBeanManually',
            'App\Listeners\Logs\Beans\ModifyBeanManually',
            'App\Listeners\Logs\Statistics\ModifyBeanManually',
            'App\Listeners\Logs\Interfaces\Succeed\ModifyBeanManually',
        ],
        'App\Events\InterfaceCalled\QueryUser' => [
            'App\Listeners\Logs\Interfaces\Called\QueryUserBean',
            'App\Listeners\Logs\Interfaces\Succeed\QueryUserBean',
        ],
        'App\Events\InterfaceCalled\QueryUserBeanLogs' => [
            'App\Listeners\Logs\Interfaces\Called\QueryUserBeanLogs',
            'App\Listeners\Logs\Interfaces\Succeed\QueryUserBeanLogs',
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
