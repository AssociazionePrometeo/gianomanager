<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    /**
     * Display a listing of the card.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', Card::class);

        $cards = Card::all();

        return view('admin.cards.index', compact('cards'));
    }
    /**
     * Show the form for creating a new card.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', Card::class);

        $users = $this->getUsers();

        return view('admin.cards.create', compact('users'));
    }

    /**
     * Store a newly created card in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->authorize('update', Card::class);

        $this->validate($request, [
            'id' => 'required|unique:cards,id',
            'user_id' => 'required|exists:users,id',
            'active' => 'boolean',
        ]);

        $card = new Card();
        $card->id = $request->get('id');
        $card->active = $request->get('active', false);
        $card->user()->associate($request->get('user_id'));
        $card->save();

        return redirect()->route('admin.cards.index');
    }

    /**
     * Show the form for editing the specified card.
     *
     * @param  Card  $card
     * @return Response
     */
    public function edit(Card $card)
    {
        $this->authorize('update', $card);

        $users = $this->getUsers();

        return view('admin.cards.edit', compact('card', 'users'));
    }

    /**
     * Update the specified card in storage.
     *
     * @param  Card $card
     * @param Request $request
     * @return Response
     */
    public function update(Card $card, Request $request)
    {
        $this->authorize('update', $card);

        $this->validate($request, [
            'id' => 'required|unique:cards,id,'.$card->id,
            'user_id' => 'required|exists:users,id',
            'active' => 'boolean',
        ]);

        $card->id = $request->get('id');
        $card->active = $request->get('active', false);
        $card->user()->associate($request->get('user_id'));
        $card->save();

        return redirect()->route('admin.cards.index');
    }

    /**
     * Remove the specified card from storage.
     *
     * @param  Card  $card
     * @return Response
     */
    public function destroy(Card $card)
    {
        $this->authorize('delete', $card);

        $card->delete();

        return redirect()->route('admin.cards.index');
    }

    protected function getUsers()
    {
        return User::all('name', 'email', 'id')->mapWithKeys(function ($user) {
            return [$user->id => "{$user->name} ({$user->email})"];
        });
    }
}
