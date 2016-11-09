<?php


namespace App\Business\Project;

use App\Business\Contract\Contract;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ProjectHasContracts
 * @package App\Business\Project
 * @mixin Project
 */
trait ProjectHasContracts
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Builder|Contract[]
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * @param \App\Business\Contract\Contract $contract
     * @return Project $this
     */
    public function addContract(Contract $contract)
    {
        $this->contracts()->save($contract);
        return $this;
    }
}