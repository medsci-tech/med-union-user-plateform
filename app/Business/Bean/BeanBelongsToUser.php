<?php


namespace App\Business\Bean;


use App\User;

/**
 * Class BeanBelongsToUser
 * @package App\Business\Bean
 * @mixin User
 */
class BeanBelongsToUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo| User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}