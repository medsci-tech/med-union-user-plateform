<?php


namespace App\Business\Contract;


use App\Business\Project\Project;

/**
 * Class ContractBelongsToProject
 * @package App\Business\Contract
 * @mixin Contract
 */
trait ContractBelongsToProject
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}