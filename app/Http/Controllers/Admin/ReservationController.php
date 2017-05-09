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
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after:yesterday',
            'end_time' => 'required|date_format:H:i',
        ]);
        $reservation = new Reservation;
        $this->updateTimeFields($reservation, $request);
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
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after:yesterday',
            'end_time' => 'required|date_format:H:i',
        ]);

        $reservation->user()->associate($request->get('user_id'));
        $reservation->resource()->associate($request->get('resource_id'));
        $this->updateTimeFields($reservation, $request);
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

    protected function updateTimeFields(Reservation &$reservation, $request)
    {
        $reservation->starts_at = $this->parseDateTime(
            $request->get('start_date'),
            $request->get('start_time')
        );
        $reservation->ends_at = $this->parseDateTime(
            $request->get('end_date'),
            $request->get('end_time')
        );

        return $reservation;
    }

    protected function parseDateTime($date, $time)
    {
        $time = date_parse_from_format('H:i', $time);
        $time['minute'] -= $time['minute'] % 30;
        $date = new DateTime($date);
        $date->setTime($time['hour'], $time['minute']);

        return $date;
    }

    protected function getUsers()
    {
        return User::all('name', 'email', 'id')->mapWithKeys(function($user) {
            return [$user->id => "{$user->name} ({$user->email})"];
        });
    }
}
