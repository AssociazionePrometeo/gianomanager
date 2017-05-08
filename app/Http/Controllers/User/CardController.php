<?php

namespace App\Http\Controllers\User;

use App\Card;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
      $cards = Card::all()->where('user_id', '=', Auth::id());
      return view('user.card', compact('cards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lock(Request $id)
    {
      $card->id = get('id');
      $card->status = 'disabled';
      $card->save();

      return redirect()->route('user.card');
    }

}
