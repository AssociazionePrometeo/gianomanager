<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends ModelPolicy
{
    protected $model = 'user';

    use HandlesAuthorization;
}
