<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class ModelPolicy
{
    use HandlesAuthorization;

    protected $model;

    public function before(User $user)
    {
        // Admins are super powerful!
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function __call($ability, $arguments)
    {
        $user = $arguments[0];

        return $user->permissions->has($this->model . '-' . $ability);
    }
}
