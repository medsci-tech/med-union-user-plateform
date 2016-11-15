<?php

namespace App\Business\Bean;

use Illuminate\Database\Eloquent\Model;
use App\Business\Project\Project;

/**
 * Class BeanRate
 *
 * @package App\Business\Bean
 * @property-read \App\Business\Bean\BeanRateType $type
 * @mixin \Eloquent
 */
class BeanRate extends Model
{

    protected $fillable = [
        'rate',
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
