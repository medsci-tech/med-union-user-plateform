<?php

namespace App\Core\Authorization\Role;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Core\Authorization\Role
 */
class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['user_id', 'role_id'];
    public $timestamps = false;

}
