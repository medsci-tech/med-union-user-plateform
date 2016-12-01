<?php

namespace App;

use App\Business\Bean\UserHasBean;
use App\Business\Log\UserHasBeanLogs;
use App\Business\Position\UserHasPosition;
use App\Business\Profile\UserHasProfile;
use App\Business\UserRelevance\UserHasUpperUserPhone;
use App\Core\Authentication\Wechat\IsWechatUser;
use App\Core\Authorization\Role\UserHasRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
 *
 * @property integer $id
 * @property string $account
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Authorization\Role\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAccount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $openid
 * @property string $unionid
 * @property string $api_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereOpenid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUnionid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereApiToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User openID($openID)
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property string $phone
 * @property-read \App\Business\Profile\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\Position\Position[] $positions
 * @property-read \App\Business\Bean\Bean $bean
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\Log\BeanLog[] $beanLogs
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhone($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\UserRelevance\UpperUserPhone[] $upperUserPhones
 * @property mixed $bean_number
 * @property-read mixed $upper_user
 */
class User extends Authenticatable
{
    use Notifiable;
    use UserHasRole;
    use UserHasProfile;
    use UserHasPosition;
    use UserHasBean;
    use UserHasUpperUserPhone;
    use UserHasBeanLogs;
    use IsWechatUser;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
