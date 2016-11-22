<?php


namespace App\Business\Log;


use App\User;

/**
 * Class UserHasBeanLogs
 * @package App\Business\Log
 * @mixin User
 */
trait UserHasBeanLogs
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|BeanLog[]
     */
    public function beanLogs()
    {
        return $this->hasMany(BeanLog::class);
    }
}