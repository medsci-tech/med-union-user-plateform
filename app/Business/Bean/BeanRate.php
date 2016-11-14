<?php

namespace App\Business\Bean;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BeanRate
 *
 * @package App\Business\Bean
 * @property-read \App\Business\Bean\BeanRateType $type
 * @mixin \Eloquent
 */
class BeanRate extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|BeanRateType
     */
    public function type()
    {
        return $this->belongsTo(BeanRateType::class);
    }
}
