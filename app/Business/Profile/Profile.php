<?php

namespace App\Business\Profile;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use ProfileBelongsToUser;
}
