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
use Illuminate\Http\Request;
use App\Http\Requests\EditHouseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class UsersController extends Controller
{
    public function index($id) {
        $userData = DB::table('users')
        ->where('id', $id)
        ->get();
        return view('users.index', compact('userData'))->with('data', Auth::user()->user);
    }

    public function houses(Request $request)
    {
        $user = $request->user();
        $houses = house::with('valuecatproprietes', 'proprietes', 'category', 'user')->where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        
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
        

    public function editHouse($id)
    {
        $categories = category::all();
        $house = house::find($id);
        return view('user.edit')->with('house', $house)
                                ->with('categories', $categories);
    }

    public function updateHouse(EditHouseRequest $request, $id)
    {
        $house = house::find($id);
        $valueproprietes = valuecatpropriete::where('house_id','=', $id)->get();

        if($house->category_id != $request->category_id){
            $house->category_id = $request->category_id;
            $house->save();
            
            
            $proprietes_category = propriete::where('category_id', '=', $request->category_id)->get();
            if($valueproprietes->count() > 0){
                $valueproprietesdelete = valuecatpropriete::where('house_id','=', $id)->delete();
                var_dump('bonjour');
                foreach($proprietes_category as $propriete_category){
                    $valuecatProprietesHouse = new valuecatPropriete;
                    $valuecatProprietesHouse->value = 0;
                    $valuecatProprietesHouse->category_id = $request->category_id;
                    $valuecatProprietesHouse->house_id = $house->id;
                    $valuecatProprietesHouse->propriete_id = $propriete_category->id;
                    $valuecatProprietesHouse->save(); 
                }         
                $house->save();
            }
            $house->save();
        }
        $house->title = $request->title;
        $house->category_id = intval($request->category_id);
        $house->pays = $request->pays;
        $house->ville = $request->ville;
        $house->adresse = $request->adresse;
        $house->price = $request->price;
        $house->description = $request->description;
        $house->save();
        
        $i = 0;
        foreach ($valueproprietes as $value) {
            DB::table('valuecatproprietes')
                ->leftJoin('houses', 'valuecatproprietes.house_id', '=', 'houses.id')
                ->where('house_id','=', $id)
                ->where('valuecatproprietes.id','=', $value->id)
                ->update([
                    'value' => $request->propriete[$i]
            ]);
            $i++;
        }
        $house->save();
    
        if($request->photo == NULL){
            $request->photo = $house->first()->photo;
            $house->save();
            return redirect()->back()->with('success', "L'hébergement de l'utilisateur a bien été modifié");
        } else {
            $picture = $request->file('photo');
            $filename  = time() . '.' . $picture->getClientOriginalExtension();
            $path = public_path('img/houses/' . $filename);
            Image::make($picture->getRealPath())->resize(350, 200)->save($path);
            $house->photo = $filename;
            $house->save();
            return redirect()->back()->with('success', "L'hébergement de l'utilisateur a bien été modifié");
        }
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
            $post->save();
            $house->delete();
            return redirect()->back()->with('success', "Votre annonce a bien été supprimée");
        } else {
            $post = new post;
            $post->name = $user->nom.' '.$user->prenom;
            $post->email = $user->email;
            $post->content = "L'utilisateur ".$user->nom.' '.$user->prenom." veut supprimer l'annonce ".$house->title;
            $post->save();
            return redirect()->back()->with('success', "Votre demande a bien été pris en compte, étant donné que votre annonce est en ligne, un message sera envoyé à l'administrateur qui supprimera votre annonce");
        }
    }

    public function reservations(Request $request)
    {
        $today = Date::now()->format('Y-m-d');
        $reservations = reservation::with('house')->where('start_date', '>=', $today)->where('end_date', '>=', $today)->where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
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

    public function historiques(Request $request)
    {
        $today = Date::now()->format('Y-m-d');
        $historiques = reservation::with('house')->where('start_date', '<=', $today)->where('end_date', '<=', $today)->where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
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
