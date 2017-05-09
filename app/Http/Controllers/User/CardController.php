<?php

namespace App\Http\Controllers\User;

use App\Card;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.cards.index', compact('user'));
    }

    /**
     * Disable the card.
     *
     * @param  Card  $card
     * @return \Illuminate\Http\Response
     */
    public function lock(Card $card)
    {
        $this->authorize('disable', $card);

        $card->disable()->save();

        return redirect()->route('cards.index');
    }

    /**
     * Enable the card.
     *
     * @param  Card  $card
     * @return \Illuminate\Http\Response
     */
    public function unlock(Card $card)
    {
        $this->authorize('enable', $card);

        $card->enable()->save();

        return redirect()->route('cards.index');
    }
}
