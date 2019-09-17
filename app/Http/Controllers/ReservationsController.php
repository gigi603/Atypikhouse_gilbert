<?php

namespace App\Http\Controllers;

use App\House;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Http\Requests\ReservationRequest;
use Session;

class ReservationsController extends Controller
{ 
    /**
     * Store the reservation in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request, House $house)
    {
        $format_startdate = str_replace('/', '-', $request->start_date);
        $format_enddate = str_replace('/', '-', $request->end_date);
        $start_date = date("y-m-d", strtotime($format_startdate));
        $end_date = date("y-m-d", strtotime($format_enddate));
        
        $house_id = $request->house_id;
        $house = house::find($house_id);

        $start = new Date($start_date);
        $end = new Date($end_date);
        $days = $start->diffInDays($end) + 1;
        $total = $house->price * $days;

        $reservation = new Reservation;
        $reservation->start_date = $start_date;
        $reservation->end_date = $end_date;
        $reservation->nb_personnes = $request->nb_personnes;
        $reservation->user_id = Auth::user()->id;
        $reservation->house_id = $house_id;
        $reservation->total = $total;
        $reservation->days = $days;
        $reservation->reserved = true;
        return view('reservations.recapitulatif_reservation')->with('reservation', $reservation)
                                                             ->with('house', $house)
                                                             ->with('start', $start)
                                                             ->with('end', $end)
                                                             ->with('days', $days)
                                                             ->with('total', $total);
    }
}
