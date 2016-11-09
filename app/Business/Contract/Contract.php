<?php

namespace App\Business\Contract;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\Contract\Contract
 *
 * @mixin \Eloquent
 */
class Contract extends Model
{
    use ContractBelongsToProject;
}
