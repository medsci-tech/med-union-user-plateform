<?php

namespace App\Business\Profile;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\Profile\Profile
 *
 * @property integer $id
 * @property integer $user_id 关联的user表记录。注意user表用来存储用户鉴权信息，profiles表是该用户的个人资料，二者为一对一关系，允许为空。
 * @property string $role 用户角色。这里是资料中用户的分类，不涉及逻辑，注意跟role表区分。
 * @property string $title 职称
 * @property string $office 科室
 * @property string $province 省份
 * @property string $city 城市
 * @property string $hospital_name 所属医院名称
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereOffice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereProvince($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereHospitalName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Profile\Profile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use ProfileBelongsToUser;
}
