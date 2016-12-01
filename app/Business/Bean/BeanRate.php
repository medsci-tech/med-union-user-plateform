<?php

namespace App\Business\Bean;

use Illuminate\Database\Eloquent\Model;
use App\Business\Project\Project;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BeanRate
 *
 * @package App\Business\Bean
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name 规则名
 * @property string $name_en 规则英文名，用于检索
 * @property integer $bean_rate_type_id 关联迈豆规则类型id
 * @property integer $project_id 关联的项目名称
 * @property integer $rate 规则比率，例如学习一次返20迈豆，就设为20
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Business\Bean\BeanRateType $bean_rate_type
 * @property-read \App\Business\Project\Project $project
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereNameEn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereBeanRateTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRate whereDeletedAt($value)
 */
class BeanRate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rate',
        'name',
        'name_en'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|BeanRateType
     */
    public function bean_rate_type()
    {
        return $this->belongsTo(BeanRateType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
