<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use App\Post;
use App\Reservation;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ReplyToReservation;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

class AddMoneyController extends Controller
{
    public function payWithStripe()
    {
        $prix = $_GET['prix'];
        $startdate = $_GET['start'];
        $enddate = $_GET['end'];
        $days = $_GET['days'];
        $total = $_GET['total'];
        $nb_personnes = $_GET['nb_personnes'];
        $user_id = $_GET['user_id'];
        $house_id = $_GET['house_id'];

        return view('paywithstripe')->with('prix', $prix)
                                    ->with('startdate', $startdate)
                                    ->with('enddate', $enddate)
                                    ->with('days', $days)
                                    ->with('total', $total)
                                    ->with('nb_personnes', $nb_personnes)
                                    ->with('user_id', $user_id)
                                    ->with('house_id', $house_id);
    }

    public function cgv()
    {
        return view('cgv');
    }

    public function postPaymentWithStripe(PaymentRequest $request)
    {
        $prix = $_POST['price'];
        $startdate = $_POST['start'];
        $enddate = $_POST['end'];
        $days = $_POST['days'];
        $total = $_POST['total'];
        $nb_personnes = $_POST['nb_personnes'];
        $user_id = $_POST['user_id'];
        $house_id = $_POST['house_id'];
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

            return view('reservations.confirmation_payment')->with('reservation', $reservation);
        } else {
            Session::flash('error', 'Il y a une erreur dans votre saisie');
            return redirect()->back();
        }
    }

    public function confirmpaymentStripe(Request $request)
    {
        // $prix = $_GET['prix'];
        // $startdate = $_GET['start'];
        // $enddate = $_GET['end'];
        // $days = $_GET['days'];
        // $total = $_GET['total'];
        // $user_id = $_GET['user_id'];
        // $house_id = $_GET['house_id'];

        return view('reservations.confirmation_payment')->with('reservation', $reservation);

        //                             ->with('startdate', $startdate)
        //                             ->with('enddate', $enddate)
        //                             ->with('days', $days)
        //                             ->with('total', $total)
        //                             ->with('user_id', $user_id)
        //                             ->with('house_id', $house_id);
    }
}