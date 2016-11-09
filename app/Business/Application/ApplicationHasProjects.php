<?php


namespace App\Business\Application;


use App\Business\Project\Project;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class HasProjects
 * @package App\Business\Application
 * @mixin Application
 */
trait ApplicationHasProjects
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Builder|Project[]
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    /**
     * @param \App\Business\Project\Project $project
     * @return Application $this
     */
    public function addProject(Project $project)
    {
        $this->projects()->save($project);
        return $this;
    }
}