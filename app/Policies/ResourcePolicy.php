<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy extends ModelPolicy
{
    protected $model = 'resource';

    use HandlesAuthorization;
}
