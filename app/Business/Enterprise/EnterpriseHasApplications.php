<?php


namespace App\Business\Enterprise;


use App\Business\Application\Application;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class EnterpriseHasApplications
 * @package App\Business\Enterprise
 * @mixin Enterprise
 */
trait EnterpriseHasApplications
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Builder|Application[]
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * @param \App\Business\Application\Application $application
     * @return Enterprise $this
     */
    public function addApplication(Application $application)
    {
        $this->applications()->save($application);
        return $this;
    }

}