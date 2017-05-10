<?php

namespace App\Policies;

use App\User;
use App\Card;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy extends ModelPolicy
{
    protected $model = 'card';

    use HandlesAuthorization;

    public function disable(User $user, Card $card)
    {
        return $this->isOwner($user, $card);
    }

    public function enable(User $user, Card $card)
    {
        return $this->isOwner($user, $card);
    }

    protected function isOwner(User $user, Card $card)
    {
        return  $user->id === $card->user->id;
    }
}
