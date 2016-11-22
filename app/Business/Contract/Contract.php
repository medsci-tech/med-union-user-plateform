<?php

namespace App\Business\Contract;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Business\Contract\Contract
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $serial
 * @property float $amount_of_money
 * @property float $rate_of_beans
 * @property integer $amount_of_beans
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Business\Project\Project $project
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereSerial($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereAmountOfMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereRateOfBeans($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereAmountOfBeans($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereDeletedAt($value)
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereDescription($value)
 * @property string $name_en 合同名称英文，用于检索
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Contract\Contract whereNameEn($value)
 */
class Contract extends Model
{
    use ContractBelongsToProject;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'name_en',
        'serial',
        'description',
        'project_id',
        'amount_of_money',
        'rate_of_beans',
        'amount_of_beans'
    ];

    /**
     * @param array $array
     * @return Model|Contract
     */
    public static function create(array $array = [])
    {
        $array = array_add($array, 'serial', time());
        $array = array_add($array, 'amount_of_beans', $array['amount_of_money'] * $array['rate_of_beans']);

        return parent::create($array);
    }
}
