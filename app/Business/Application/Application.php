<?php

namespace App\Business\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Business\Application\Application
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $enterprise_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\Project\Project[] $projects
 * @property-read \App\Business\Enterprise\Enterprise $enterprise
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereEnterpriseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereDeletedAt($value)
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereDescription($value)
 * @property string $name_en 应用名称英文，用于检索
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Application\Application whereNameEn($value)
 */
class Application extends Model
{
    use ApplicationHasProjects;
    use ApplicationBelongsToEnterprise;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'name_en',
        'enterprise_id',
        'description'
    ];
}
