<?php


namespace App\Business\Position;


use App\User;

/**
 * Class UserHasPosition
 * @package App\Business\Position
 * @mixin User
 */
trait UserHasPosition
{
    /**
     * @return mixed
     */
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}