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
        //$old_reservation = Reservation::where('starts_at', '<', $request->get('ends_at'))->where('ends_at', '>', $request->get('starts_at'))->where('resource_id', $request->get('resource_id'))->first();
        if(is_null(Reservation::JustIsReserved($request->get('starts_at'), $request->get('ends_at'), $request->get('resource_id')))){
        $reservation = new Reservation($request->only('starts_at', 'ends_at'));
        $reservation->resource()->associate($request->get('resource_id'));
        $reservation->user()->associate(Auth::user());
        $reservation->save();
      }else{
        flash(__('resources.justreserved'), 'error');
      }
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
