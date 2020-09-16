<?php

namespace App\Http\Controllers;

use App\User;
use App\House;
use App\Comment;
use App\Reservation;
use App\Category;
use App\Propriete;
use App\Valuecatpropriete;
use App\Ville;
use App\Post;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditHouseRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\SendNewsletter;
use Illuminate\Support\Facades\Mail;
use Image;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class UsersController extends Controller
{
    public function profile($id) {
        $userData = DB::table('users')
        ->where('id', $id)
        ->get();
        return view('user.profile', compact('userData'))->with('data', Auth::user()->user);
    }

    public function edit(EditUserRequest $request, $id) {
        $user = User::find($id);
        try {
            if($request->newsletter != 1) {
                $user->newsletter = 0;
                $user->save();
                return redirect()->back();
            } else {
                $user->newsletter = 1;
                $user->save();
                $newsletters = newsletter::all();
                foreach($newsletters as $newsletter){
                    Mail::to('fatboar')->send(new SendNewsletter($newsletter));
                }
                return redirect()->back();
            }
        } catch(Exception $e){

        }
    }

    public function houses(Request $request)
    {
        $user = $request->user();
        $houses = house::with('valuecatproprietes', 'proprietes', 'category', 'user')->where('user_id', '=', Auth::user()->id)
        ->where('disponible', '=', 'oui')->orderBy('id', 'desc')->get();
        
        return view('user.houses', compact('houses'));
    }
    
    /**
     * Display the house details.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function showHouse($id)
    {
        if (Auth::check()) {
            $reservation = reservation::all();
            $house = house::find($id);
            $house::where('disponible', "oui")->first();
            $locataire = comment::where('user_id', Auth::user()->id)->get();
            $client_reserved = reservation::where('house_id', $id)->where('user_id', Auth::user()->id)->get();
            
            return view('user.show')->with('reservation', $reservation)
                                    ->with('house', $house)
                                    ->with('locataire', $locataire)
                                    ->with('client_reserved', $client_reserved);
        } else {
            $reservation = reservation::all();
            $house = house::find($id);
            return view('user.show')->with('reservation', $reservation)
                                    ->with('house', $house);
        }
    }
        

    public function editHouse($id, Request $request)
    {
        $categories = category::all();
        $house = house::find($id);

        if($house->category_id == null){
            $categorySelected = "";
        } else {
            $categorySelected = $house->category_id;
        }
        $proprietes = propriete::where('category_id', $house->category->id)->get();
        return view('user.edit')->with('house', $house)
                                ->with('categorySelected', $categorySelected)
                                ->with('categories', $categories)
                                ->with('proprietes', $proprietes);
    }

    public function updateHouse(EditHouseRequest $request, $id)
    {
        
        $house = house::find($id);
        $categories = category::where('statut','=', 1)->get();
        $houseCategoryEdit = $request->session()->get('houseCategoryEdit');
        $request->session()->push('houseCategoryEdit', $request->category_id);
        if($houseCategoryEdit == null){
            $categorySelected = "";
        } else {
            $categorySelected = last($houseCategoryEdit);
        }
        if($house->title != $request->title || $house->category_id != $request->category_id
        || $house->nb_personnes != $request->nb_personnes || $house->price != $request->price 
        || $house->adresse != $request->adresse || $house->photo != $request->photo
        || $house->description != $request->description || $house->start_date != $request->start_date 
        || $house->end_date != $request->end_date){
            $house->title = $request->title;
            $lastCategory = $categories->last();
            if($request->category_id > $lastCategory->id){
                $categorySelected = $request->category_id;
                return redirect()->back()->with('danger', 'Veuillez selectionner une categorie valide');
            }
            $house->category_id = $request->category_id;
            $house->nb_personnes = $request->nb_personnes;
            $house->price = $request->price;
            $house->adresse = $request->adresse;
            
            if($request->hasFile('photo')){
                $picture = $request->file('photo');
                $filename  = time() . '.' . $picture->getClientOriginalExtension();
                $path = public_path('img/houses/' . $filename);
                Image::make($picture->getRealPath())->resize(350, 225)->save($path);
                $house->photo = $filename;
            }
            $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date);
            $start_date_date_format = Carbon::parse($start_date)->format('Y-m-d');
            $house->start_date = $start_date_date_format;

            $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date);
            $end_date_date_format = Carbon::parse($end_date)->format('Y-m-d');
            $house->end_date = $end_date_date_format;

            $house->description = $request->description;
            $house->statut = "En attente de validation";
            $house->save();
        }
        $valueproprietes = valuecatpropriete::where('house_id','=', $id)->get();
            
        $proprietes_category = propriete::where('category_id', '=', $request->category_id)->get();
        
        $valueproprietesdelete = valuecatpropriete::where('house_id','=', $id)->delete();
        var_dump($request->propriete);
        if($request->nb_personne > 15 || $request->nb_personne < 0){
            $request->nb_personne = "";
        }
        if($request->propriete != NULL){
            foreach($request->propriete as $proprietes) {
                var_dump($proprietes);       
                $valuecatProprietesHouse = new valuecatPropriete;
                $valuecatProprietesHouse->category_id = $request->category_id;
                $valuecatProprietesHouse->house_id = $house->id;
                $valuecatProprietesHouse->propriete_id = $proprietes;
                $valuecatProprietesHouse->save();
            }
        }
        $request->session()->forget('houseCategoryEdit');
        return redirect()->back()->with('categorySelected', $categorySelected)
                                 ->with('success', "L'hébergement de l'utilisateur a bien été modifié");
    }

    public function deleteHouse(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $house = house::find($id);

        if($house->statut == "En attente de validation"){
            $post = new post;
            $post->name = $user->nom.' '.$user->prenom;
            $post->email = $user->email;
            $post->content = "L'annonce ".$house->title." de ".$user->nom.' '.$user->prenom." a été supprimée";
            $post->type = "annonce";
            $post->house_id = $house->id;
            $post->reservation_id = 0;
            $post->user_id = $user->id;

            $post->save();
            $house->delete();
            return redirect()->back()->with('success', "Votre annonce a bien été supprimée");
        } else {
            $post = new post;
            $post->name = $user->nom.' '.$user->prenom;
            $post->email = $user->email;
            $post->content = "L'utilisateur ".$user->nom.' '.$user->prenom." veut supprimer l'annonce ".$house->title;
            $post->type = "annonce";
            $post->house_id = $house->id;
            $post->reservation_id = 0;
            $post->user_id = $user->id;
            $post->save();
            return redirect()->back()->with('success', "Votre demande a bien été pris en compte, étant donné que votre annonce est en ligne, un message sera envoyé à l'administrateur qui supprimera votre annonce. N'oubliez pas vérifier vos notifications");
        }
    }

    public function reservations(Request $request)
    {
        $today = Date::today()->format('Y-m-d');
        $reservations = reservation::with('house')
        ->where('end_date', '>=', $today)
        ->where('user_id', '=', Auth::user()->id)
        ->where('reserved', '=', 1)
        ->orderBy('id', 'desc')
        ->get();
        
        return view('user.reservations', compact('reservations'));
    }
    
    public function showreservations($id)
    {
        $users = User::where('id', $id)->get();
        $houses = House::where('user_id', $id)->get();
        $reservation = reservation::find($id);
        return view('user.showreservations')->with('houses', $houses)
                                            ->with('users', $users)
                                            ->with('reservation', $reservation);
    }

    public function reservationsannulees(Request $request)
    {
        $today = Date::today()->format('Y-m-d');
        $reservations = reservation::with('house')->where('reserved', '=', 0)
        ->where('user_id', '=', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
        
        return view('user.reservationsannulees', compact('reservations'));
    }
    
    public function showreservationsannulees($id)
    {
        $users = User::where('id', $id)->get();
        $houses = House::where('user_id', $id)->get();
        $reservation = reservation::find($id);
        return view('user.showreservationsannulees')->with('houses', $houses)
                                            ->with('users', $users)
                                            ->with('reservation', $reservation);
    }

    public function cancelreservation($id) {
        $today = Date::today()->format('Y-m-d');

        $reservations = reservation::with('house')->where('start_date', '>=', $today)
        ->where('end_date', '>=', $today)
        ->where('user_id', '=', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();

        $reservation = reservation::find($id);
        $reservation->reserved = 0;
        $reservation->save();
        return redirect()->back()->with('success', "Votre demande a bien été pris en compte, votre réservation a bien été annulée");
    }

    public function historiques(Request $request)
    {
        $today = Date::today()->format('Y-m-d');
        $historiques = reservation::with('house')->where('start_date', '<=', $today)
        ->where('end_date', '<', $today)
        ->where('user_id', '=', Auth::user()->id)
        ->orderBy('id', 'desc')->get();
        return view('user.historiques', compact('historiques'));
    }

    //Vue de détails des historiques
    public function showhistoriques($id)
    {
        $users = User::where('id', $id)->get();
        $houses = House::where('user_id', $id)->get();
        $historique = reservation::find($id);
        return view('user.showhistoriques')->with('houses', $houses)
                                              ->with('users', $users)
                                              ->with('historique', $historique);
    }

    public function showhebergements($id)
    {
        $house = House::find($id);
        return view('user.showhebergements')->with('house', $house);
                                              
    }

}
