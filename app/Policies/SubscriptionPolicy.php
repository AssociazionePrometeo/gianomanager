<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy extends ModelPolicy
{
  protected $model = 'subscription';

  use HandlesAuthorization;
}
