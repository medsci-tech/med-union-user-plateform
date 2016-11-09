<?php


namespace App\Business\Project;


use App\Business\Application\Application;

/**
 * Class ProjectBelongsToApplication
 * @package App\Business\Project
 * @mixin Project
 */
trait ProjectBelongsToApplication
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Application
     */
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}