<?php

namespace App\Listeners\V1\LearnEventListeners;

use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\V1\Learn;
use Carbon\Carbon;

class AddBean
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
     * @param  Learn  $event
     * @return void
     */
    public function handle(Learn $event)
    {
        $key = 'LEARN-' . Carbon::today()->format('Ymd') . '-' . $event->user->id;
        if (!\Cache::has($key)) {
            \Cache::put($key, 0, Carbon::now()->addDays(2));
        }
        if (($learn_count_today = \Cache::increment($key)) <= 5) {
            //每日学习最多给5次迈豆，如果超过就跳过。此处increment在redis中是原子操作，在其它cache driver下可能非原子。和前一行的条件判断，在多线程下也可能导致同步问题。这里最好用redis的事务加锁。由于目前服务器环境是否能装redis还没确定，这里暂时先这么处理。
            $event->user->modifyBeanAccordingToBeanRate($event->beanRate);
        }

        $chance_remains_today = 5 - $learn_count_today;
        $event->chance_remains_today = $chance_remains_today > 0 ? $chance_remains_today : 0;
    }
}
