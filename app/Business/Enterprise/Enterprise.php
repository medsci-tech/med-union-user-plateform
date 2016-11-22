<?php

namespace App\Business\Enterprise;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Business\Enterprise\Enterprise
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\Application\Application[] $applications
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereDeletedAt($value)
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereDescription($value)
 * @property string $name_en 企业名称英文，用于检索
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Enterprise\Enterprise whereNameEn($value)
 */
class Enterprise extends Model
{
    use EnterpriseHasApplications;
    use EnterpriseBelongsToUser;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'name_en',
        'description',
    ];
}
