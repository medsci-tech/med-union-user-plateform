<?php

namespace App\Business\Project;

use App\Exceptions\BeansNotEnoughForProjectException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Business\Project\Project
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $application_id
 * @property string $name
 * @property integer $amount_of_beans
 * @property integer $rest_of_beans
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\Contract\Contract[] $contracts
 * @property-read \App\Business\Application\Application $application
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereApplicationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereAmountOfBeans($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereRestOfBeans($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereDeletedAt($value)
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereDescription($value)
 * @property string $name_en 项目名称英文，用于检索
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Project\Project whereNameEn($value)
 */
class Project extends Model
{
    use ProjectHasContracts;
    use ProjectBelongsToApplication;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'application_id',
        'name',
        'name_en',
        'description',
    ];

    /**
     * 企业通过合约增加迈豆，充值时调用此方法
     *
     * @param float $amount
     * @return $this
     */
    public function addBean(float $amount)
    {
        \DB::transaction(function () use ($amount) {
            \DB::table('projects')->lockForUpdate();
            $fresh = $this->fresh();
            $fresh->update([
                'rest_of_beans' => $fresh->rest_of_beans + $amount
            ]);
        });

        return $this;
    }
}
