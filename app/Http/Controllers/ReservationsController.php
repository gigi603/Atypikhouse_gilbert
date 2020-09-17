<?php

namespace App\Http\Controllers;

use App\House;
use App\Reservation;
use App\Post;
use App\User;
use App\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\PaymentRequest;
use Validator;
use URL;
use Session;
use Redirect;
use Input;

use App\Notifications\ReplyToReservation;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

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
        /*Récupère toutes les données de la réservation en cours */
        
        $format_startdate = str_replace('/', '-', $request->start_date);
        $format_enddate = str_replace('/', '-', $request->end_date);
        $start_date = date("y-m-d", strtotime($format_startdate));
        $end_date = date("y-m-d", strtotime($format_enddate));
        
        $house_id = $request->house_id;
        $house = house::find($house_id);

        $start = new Date($start_date);
        $end = new Date($end_date);
        $days = $start->diffInDays($end) + 1;
        $total = ($house->price * $days) * $request->nb_personnes;

        $reservation = new Reservation;
        $reservation->start_date = $start_date;
        $reservation->end_date = $end_date;
        $reservation->nb_personnes = $request->nb_personnes;
        $reservation->user_id = Auth::user()->id;
        $reservation->house_id = $house_id;
        $reservation->category_id = $house->category_id;
        $reservation->total = $total;
        $reservation->days = $days;
        $reservation->reserved = true;

        /*Créer une session pour chaque données de la reservation afin de les récupérer au moment
        du paiement */

        $reservationStartDate = session('reservationStartDate', $reservation->start_date);
        $request->session()->push('reservationStartDate', $reservation->start_date);

        $reservationEndDate = session('reservationEndDate', $reservation->end_date);
        $request->session()->push('reservationEndDate', $reservation->end_date);

        $reservationNbPersonnes = session('reservationNbPersonnes', $reservation->nb_personnes);
        $request->session()->push('reservationNbPersonnes', $reservation->nb_personnes);

        $reservationUserId = session('reservationUserId', $reservation->user_id);
        $request->session()->push('reservationUserId', $reservation->user_id);

        $reservationHouseId = session('reservationHouseId', $reservation->house_id);
        $request->session()->push('reservationHouseId', $reservation->house_id);

        $reservationCategoryId = session('reservationCategoryId', $reservation->category_id);
        $request->session()->push('reservationCategoryId', $reservation->category_id);


        $reservationPrice = session('reservationPrice', $house->price);
        $request->session()->push('reservationPrice', $house->price);

        $reservationDays = session('reservationDays', $reservation->days);
        $request->session()->push('reservationDays', $reservation->days);

        $reservationTotal = session('reservationTotal', $reservation->total);
        $request->session()->push('reservationTotal', $reservation->total);

        $reservationReserved = session('reservationReserved', $reservation->reserved);
        $request->session()->push('reservationReserved', $reservation->reserved);

        /* Redirige vers la page de récapitulatif de reservation avec les données */
        
        return view('reservations.recapitulatif_reservation')->with('reservation', $reservation)
                                                             ->with('house', $house)
                                                             ->with('start', $start)
                                                             ->with('end', $end)
                                                             ->with('days', $days)
                                                             ->with('total', $total);
    }

    public function payWithStripe()
    {
        return view('paywithstripe');
    }

    public function postPaymentWithStripe(PaymentRequest $request)
    {
        $prix = last($request->session()->get('reservationPrice'));
        $startdate = last($request->session()->get('reservationStartDate'));
        $enddate = last($request->session()->get('reservationEndDate'));
        $days = last($request->session()->get('reservationDays'));
        $total = last($request->session()->get('reservationTotal'));
        $nb_personnes = last($request->session()->get('reservationNbPersonnes'));
        $user_id = last($request->session()->get('reservationUserId'));
        $house_id = last($request->session()->get('reservationHouseId'));
        $category_id = last($request->session()->get('reservationCategoryId'));
        $stripe_payment = $total * 100;
        
        \Stripe\Stripe::setApiKey("sk_test_TyJ4IhA3qzhaTaCmv6IhW6Hk");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $stripe_payment,
            'currency' => 'eur',
            'description' => 'Paiement de la réservation',
            'source' => $token,
        ]);

        if($charge['status'] == 'succeeded') {
            Session::flash('success', 'Vous avez bien payé');
            $reservation = new Reservation;
            $reservation->start_date = $startdate;
            $reservation->end_date = $enddate;
            $reservation->user_id = $user_id;
            $reservation->house_id = $house_id;
            $reservation->category_id = $category_id;
            $reservation->nb_personnes = $nb_personnes;
            $reservation->price= $prix;
            $reservation->total= $total;
            $reservation->days= $days;
            $reservation->reserved = true;
            $reservation->save();
            

            //Envoyer une notification à l'admin
            $post = new post;
            $post->name = Auth::user()->prenom." ".Auth::user()->nom;
            $post->email = Auth::user()->email;
            $post->content = "Une nouvelle réservation de ".Auth::user()->prenom." ".Auth::user()->nom." a été effectué";
            $post->type = "reservation";
            $post->house_id = 0;
            $post->reservation_id = $reservation->id;
            $post->user_id = Auth::user()->id;
            $post->save();

            $admins = Admin::all();

            foreach ($admins as $admin) {
                $admin->notify(new ReplyToReservation($post));
            }
            $request->session()->forget('reservationPrice');
            $request->session()->forget('reservationStartDate');
            $request->session()->forget('reservationEndDate');
            $request->session()->forget('reservationDays');
            $request->session()->forget('reservationTotal');
            $request->session()->forget('reservationNbPersonnes');
            $request->session()->forget('reservationUserId');
            $request->session()->forget('reservationHouseId');
            $request->session()->forget('reservationCategoryId');

            return view('reservations.confirmation_payment')->with('reservation', $reservation);
        } else {
            Session::flash('error', 'Il y a une erreur dans votre saisie');
            return redirect()->back();
        }
    }

    public function confirmpaymentStripe(Request $request)
    {
        return view('reservations.confirmation_payment')->with('reservation', $reservation);
    }
}
