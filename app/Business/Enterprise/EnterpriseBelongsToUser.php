<?php


namespace App\Business\Enterprise;


use App\User;

/**
 * Class EnterpriseBelongsToUser
 * @package App\Business\Enterprise
 * @mixin Enterprise
 */
trait EnterpriseBelongsToUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|User|null
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}