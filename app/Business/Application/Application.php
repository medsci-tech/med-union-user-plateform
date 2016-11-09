<?php

namespace App\Business\Application;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\Application\Application
 *
 * @mixin \Eloquent
 */
class Application extends Model
{
    use ApplicationHasProjects;
    use ApplicationBelongsToEnterprise;
}
