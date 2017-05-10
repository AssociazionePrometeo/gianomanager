<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy extends ModelPolicy
{
    protected $model = 'reservation';

    use HandlesAuthorization;
}
