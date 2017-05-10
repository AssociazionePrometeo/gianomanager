<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy extends ModelPolicy
{
    protected $model = 'role';

    use HandlesAuthorization;
}
