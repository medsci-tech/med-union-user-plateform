<?php


namespace App\Business\Application;


use App\Business\Enterprise\Enterprise;

/**
 * Class ApplicationBelongsToEnterprise
 * @package App\Business\Application
 * @mixin Application
 */
trait ApplicationBelongsToEnterprise
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Enterprise
     */
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}