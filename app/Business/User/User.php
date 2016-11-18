<?php

namespace App\Business\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'account',
        'password',
        'name',
        'email'
    ];
}
