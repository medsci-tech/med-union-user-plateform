<?php

namespace App\Core\Authorization\Role;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App\Core\Authorization\Role
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Authorization\Role\RoleUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Authorization\Role\RoleUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Authorization\Role\RoleUser whereRoleId($value)
 * @mixin \Eloquent
 */
class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['user_id', 'role_id'];
    public $timestamps = false;

}
