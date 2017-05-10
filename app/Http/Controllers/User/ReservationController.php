<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Resource;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservation.
     *
     * @return Response
     */
    public function index()
    {
      $user = Auth::user();

      return view('user.reservations.index', compact('user'));
    }
    /**
     * Show the form for creating a new reservation.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $resources = Resource::pluck('name', 'id');

        return view('user.reservations.create', compact('user', 'resources'));
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'resource_id' => 'required|exists:resources,id',
          'starts_at' => 'required|date|after:yesterday',
          'ends_at' => 'required|date',
        ]);
        $reservation = new Reservation($request->only('starts_at', 'ends_at'));
        $reservation->user()->associate(Auth::user());
        $reservation->resource()->associate($request->get('resource_id'));
        $reservation->save();

        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified reservation from storage.
     *
     * @param  Reservation  $reservation
     * @return Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index');
    }

}
