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
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after:yesterday',
            'end_time' => 'required|date_format:H:i',
        ]);
        $reservation = new Reservation;
        $this->updateTimeFields($reservation, $request);
        $reservation->user()->associate(Auth::user());
        $reservation->resource()->associate($request->get('resource_id'));
        $reservation->save();

        return redirect()->route('reservations.index');
    }
    /**
     * Show the form for editing the specified reservation.
     *
     * @param  Reservation  $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        //$users = Auth::user();
        $resources = Resource::pluck('name', 'id');

        return view('user.reservations.edit', compact('reservation', 'resources'));
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
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after:yesterday',
            'end_time' => 'required|date_format:H:i',
        ]);

        $reservation->user()->associate(Auth::user());
        $reservation->resource()->associate($request->get('resource_id'));
        $this->updateTimeFields($reservation, $request);
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

}
