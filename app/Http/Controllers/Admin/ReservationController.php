<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Resource;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $reservations = Reservation::all();

        return view('admin.reservations.index', compact('reservations'));
    }
    /**
     * Show the form for creating a new reservation.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->getUsers();
        $resources = Resource::pluck('name', 'id');

        return view('admin.reservations.create', compact('users', 'resources'));
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
            'user_id' => 'required|exists:users,id',
            'resource_id' => 'required|exists:resources,id',
            'starts_at' => 'required|date|after:yesterday',
            'ends_at' => 'required|date',
        ]);
        $reservation = new Reservation($request->only('starts_at', 'ends_at'));
        $reservation->user()->associate($request->get('user_id'));
        $reservation->resource()->associate($request->get('resource_id'));
        $reservation->save();

        return redirect()->route('admin.reservations.index');
    }

    /**
     * Show the form for editing the specified reservation.
     *
     * @param  Reservation  $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        $users = $this->getUsers();
        $resources = Resource::pluck('name', 'id');

        return view('admin.reservations.edit', compact('reservation', 'users', 'resources'));
    }

    /**
     * Update the specified reservation in storage.
     *
     * @param  Reservation $reservation
     * @param Request $request
     * @return Response
     */
    public function update(Reservation $reservation, Request $request)
    {
        $this->validate($request, [
            'resource_id' => 'required|exists:resources,id',
            'user_id' => 'required|exists:users,id',
            'starts_at' => 'required|date|after:yesterday',
            'ends_at' => 'required|date',
        ]);

        $reservation->user()->associate($request->get('user_id'));
        $reservation->resource()->associate($request->get('resource_id'));
        $reservation->starts_at = $request->get('starts_at');
        $reservation->ends_at = $request->get('ends_at');
        $reservation->save();

        return redirect()->route('admin.reservations.index');
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

        return redirect()->route('admin.reservations.index');
    }
    
    protected function getUsers()
    {
        return User::all('name', 'email', 'id')->mapWithKeys(function($user) {
            return [$user->id => "{$user->name} ({$user->email})"];
        });
    }
}
