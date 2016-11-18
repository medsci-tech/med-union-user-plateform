<?php


namespace App\Business\Position;


use App\User;

/**
 * Class PositionBelongsToUser
 * @package App\Business\Position
 * @mixin Position
 */
trait PositionBelongsToUser
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}