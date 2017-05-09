<?php

namespace App\Policies;

use App\User;
use App\Card;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the card.
     *
     * @param  \App\User  $user
     * @param  \App\Card  $card
     * @return mixed
     */
    public function view(User $user, Card $card)
    {
        //
    }

    /**
     * Determine whether the user can create cards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the card.
     *
     * @param  \App\User  $user
     * @param  \App\Card  $card
     * @return mixed
     */
    public function update(User $user, Card $card)
    {
        //
    }

    /**
     * Determine whether the user can delete the card.
     *
     * @param  \App\User  $user
     * @param  \App\Card  $card
     * @return mixed
     */
    public function delete(User $user, Card $card)
    {
        //
    }

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
