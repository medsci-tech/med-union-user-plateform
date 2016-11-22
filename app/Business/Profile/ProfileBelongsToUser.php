<?php


namespace App\Business\Profile;


use App\User;

trait ProfileBelongsToUser
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}