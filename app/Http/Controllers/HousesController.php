<?php

namespace App\Http\Controllers;

use App\House;
use App\Ville;
use App\Category;
use App\Comment;
use App\Reservation;
use App\Propriete;
use App\Valuecatpropriete;
use App\User;
use App\Message;
use App\Post;
use App\Admin;
use App\Notifications\ReplyToAnnonce;
use Illuminate\Http\Request;
use App\Http\Requests\CreateHouseStep1Request;
use App\Http\Requests\CreateHouseStep2Request;
use App\Http\Requests\CreateHouseStep3Request;
use App\Http\Requests\CreateHouseStep4Request;
use App\Http\Requests\CreateHouseStep5Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Session;
use Image;
use View;
use GooglePlaces;
use App\Http\Middleware\XSS;

class HousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(House $house)
    {
        $today = Date::today()->format('Y-m-d');
        $categories = category::all();
        $houses = house::with('valuecatproprietes', 'proprietes', 'category')
        ->where('end_date', '>=', $today)
        ->where('statut', 'Validé')
        ->where('disponible', 'oui')
        ->orderBy('id', 'desc')
        ->get();
        return view('houses.index')->with('houses', $houses)
                                   ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Category  $categories
     * @param  \App\Ville  $villes
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories, Ville $villes)
    {
        $categories = category::all();
        $villes = ville::all();

        return view('houses.create', [
            'villes'=> $villes,
            'categories' => $categories,
        ]);
    }

    public function create_step1(Request $request) { 
        $houseAdresse = $request->session()->get('houseAdresse');
        if($houseAdresse == NULL){
            $adresse = "";
        } else {
            $adresse = last($houseAdresse);
        }
        return view('houses.create_step1', [
            'adresse' => $adresse
        ]);
    }

    public function postcreate_step1(CreateHouseStep1Request $request) {
        $houseAdresse = session('houseAdresse', $request->adresse);
        $request->session()->push('houseAdresse', $request->adresse);

        $houseUser = session('houseUser', $request->user_id);
        $request->session()->push('houseUser', $request->user_id);
        return redirect('/house/create_step2');
    } 

    public function create_step2(Request $request) {        
        $houseTelephone = $request->session()->get('houseTelephone');
        if($houseTelephone == NULL){
            $telephone = "";
        } else {
            $telephone = last($houseTelephone);
        }
        return view('houses.create_step2', [
            'telephone' => $telephone
        ]);
    }

    public function postcreate_step2(CreateHouseStep2Request $request) {
          
        $houseTelephone = session('houseTelephone', $request->phone);
        $request->session()->push('houseTelephone', $request->phone);

        $houseUser = session('houseUser', $request->user_id);
        $request->session()->push('houseUser', $request->user_id);

        return redirect('/house/create_step3');
    }

    public function create_step3(Category $categories, Request $request) {
        $houseTitle = $request->session()->get('houseTitle');
        
        if($houseTitle == NULL){
            $title = "";
        } else {
            $title = last($houseTitle);
        }

        $houseCategory = $request->session()->get('houseCategory');
        if($houseCategory == null){
            $categorySelected = "";
        } else {
            $categorySelected = last($houseCategory);
        }
        
        $categories = category::where('statut','=', 1)->get();

        $houseNbPersonnes = $request->session()->get('houseNbPersonnes');
        if($houseNbPersonnes == NULL){
            $nb_personnes = "";
        } else {
            $nb_personnes = last($houseNbPersonnes);
        }

        $houseStartDate = $request->session()->get('houseStartDate');
        if($houseStartDate == NULL){
            $start_date = "";
        } else {
            $start_date = last($houseStartDate);
        }

        $houseEndDate = $request->session()->get('houseEndDate');
        if($houseEndDate == NULL){
            $end_date = "";
        } else {
            $end_date = last($houseEndDate);
        }

        $houseDescription = $request->session()->get('houseDescription');
        if($houseDescription == NULL){
            $description = "";
        } else {
            $description = last($houseDescription);
        }
        
        return view('houses.create_step3', [
            'categories' => $categories,
            'title' => $title,
            'houseCategory' => $houseCategory,
            'categorySelected' => $categorySelected,
            'nb_personnes' => $nb_personnes,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'description' => $description
        ]);
    }

    public function postcreate_step3(CreateHouseStep3Request $request) {
        $categories = category::where('statut', '=', 1)->get();
        $lastCategory = category::where('statut', '=', 1)->orderBy('id', 'desc')->first();
        $houseTitle = session('houseTitle', $request->title);
        $request->session()->push('houseTitle', $request->title);

        $request->session()->push('houseCategory', $request->category_id);
        $houseCategory = $request->session()->get('houseCategory');
        $request->session()->push('houseCategory', $request->category_id);
        if(last($houseCategory) == null){
            $categorySelected = "";
        } else {
            $categorySelected = last($houseCategory);
        }
        $lastCategory = $categories->last();
        if($request->category_id > $lastCategory->id){
            $categorySelected = $request->category_id;
            return redirect()->back()->with('danger', 'Veuillez selectionner une categorie valide');
        }
        // if($request->category_id > $lastCategory->id){
        //     $request->category_id = "";
        //     $houseCategory = null;
        //     return redirect()->back();
        // }
        
        $houseNbPersonnes = session('houseNbPersonnes', $request->nb_personnes);
        $request->session()->push('houseNbPersonnes', $request->nb_personnes);

        $houseStartDate = session('houseStartDate', $request->start_date);
        $request->session()->push('houseStartDate', $request->start_date);

        $houseEndDate = session('houseEndDate', $request->end_date);
        $request->session()->push('houseEndDate', $request->end_date);

        $houseDescription = session('houseDescription', $request->description);
        $request->session()->push('houseDescription', $request->description);
        
        
        $housePropriete = $request->session()->pull('houseProprietes');
        $houseProprieteId = $request->session()->pull('houseProprietesId'); 

        $proprietesChecked = $request->input('propriete');

        $housePropriete = session('houseProprietes', $proprietesChecked);
        if($proprietesChecked != NULL){
            $i = 0;
            for($i=0;$i < count($proprietesChecked); $i++){
                var_dump($proprietesChecked[$i]);
                $request->session()->push('houseProprietes', $proprietesChecked[$i]);
            }
        }
        return redirect('/house/create_step4');
    }
    

    public function create_step4(Request $request) {
        $housePrice = $request->session()->get('housePrice');
        if($housePrice == NULL){
            $price = "";
        } else {
            $price = last($housePrice);
        }
        return view('houses.create_step4', [
            'price' => $price
        ]);
    }

    public function postcreate_step4(CreateHouseStep4Request $request) {
        $housePrice = session('housePrice', $request->price);
        $request->session()->push('housePrice', $request->price);

        return redirect('/house/create_step5');
    }

    public function create_step5(Request $request) {
        $housePhoto = $request->session()->get('housePhoto');
        if($housePhoto == NULL){
            $photo = "";
        } else {
            $photo = last($housePhoto);
        }
        return view('houses.create_step5', [
            'photo' => $photo
        ]);
    }

    public function postcreate_step5(CreateHouseStep5Request $request) {
        $houseAdresse = $request->session()->get('houseAdresse');
        $houseTitle = $request->session()->get('houseTitle');
        $houseUser = $request->session()->get('houseUser');
        $houseCategory = $request->session()->get('houseCategory');
        $houseTelephone = $request->session()->get('houseTelephone');
        $houseNbPersonnes = $request->session()->get('houseNbPersonnes');
        $houseStartDate = $request->session()->get('houseStartDate');
        $houseEndDate = $request->session()->get('houseEndDate');
        $houseDescription = $request->session()->get('houseDescription');
        $housePrix = $request->session()->get('housePrice');
        
        $housePhoto = session('housePhoto', $request->photo);
        $request->session()->push('housePhoto', $request->photo);
        
        $house = new house;
        $house->adresse = last($houseAdresse);
        $house->user_id = last($houseUser);
        $house->title = last($houseTitle);
        $house->category_id = last($houseCategory);
        $house->phone = last($houseTelephone);
        $house->nb_personnes = last($houseNbPersonnes);

        $date = Carbon::createFromFormat('d/m/Y', last($houseStartDate));
        $newFormat = Carbon::parse($date)->format('Y-m-d');
        $date2 = Carbon::createFromFormat('d/m/Y', last($houseEndDate));
        $newFormat2 = Carbon::parse($date2)->format('Y-m-d');
        //$end_date = Carbon::createFromFormat('Y-m-d', $newFormat2);
        $house->start_date = $newFormat;
        $house->end_date = $newFormat2;
        $house->description = last($houseDescription);
        $house->price = last($housePrix);
        $house->statut = "En attente de validation";
        $house->disponible = "oui";

        $housePropriete = $request->session()->get('houseProprietes');

        $picture = $request->file('photo');
        $filename  = time() . '.' . $picture->getClientOriginalExtension();
        $path = public_path('img/houses/' . $filename);
        Image::make($picture->getRealPath())->save($path);
        $house->photo = $filename;
        $house->save();
        if($housePropriete == null){

        } else {
            foreach($housePropriete as $proprietes){
                $valuecatProprietesHouse = new valuecatPropriete;
                $valuecatProprietesHouse->category_id = $house->category_id;
                $valuecatProprietesHouse->propriete_id = intval($proprietes);
                $valuecatProprietesHouse->house_id = $house->id;
                
                $valuecatProprietesHouse->save();
            }
        }
        $message = new message;
        $message->content = "Vous avez bien créé l'annonce ".$house->title.", notre équipe va vérifier le contenu et vous enverra un message, une fois votre annonce validée par notre équipe, elle sera consultable sur le site dans nos hébergements";
        $message->user_id = $house->user_id;
        $message->save();

        $post = new post;
        $post->name = Auth::user()->nom.' '.Auth::user()->prenom;
        $post->email = Auth::user()->email;
        $post->content = 'Une nouvelle annonce '.$house->title.' de '.Auth::user()->nom.' '.Auth::user()->prenom.' a été créé';
        $post->type = "annonce";
        $post->house_id = $house->id;
        $post->reservation_id = 0;
        $post->user_id = Auth::user()->id;
        $post->save();

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new ReplyToAnnonce($post));
        }

        $request->session()->forget('houseAdresse');
        $request->session()->forget('houseTelephone');
        $request->session()->forget('houseTitle');
        $request->session()->forget('houseCategory');
        $request->session()->forget('houseProprietes');
        $request->session()->forget('houseNbPersonnes');
        $request->session()->forget('houseStartDate');
        $request->session()->forget('houseEndDate');
        $request->session()->forget('houseDescription');
        $request->session()->forget('housePrice');
        $request->session()->forget('housePhoto');
        $request->session()->forget('houseUser');
        
        return redirect('/house/confirmation_create_house')->with('success', "Votre annonce a bien été créé, vous avez reçu un message");
    }

    public function confirmation_create_house(){
        return view('houses.confirmation_create_house');
    }

    public function json_propriete($id, $category){
        $house = house::find($id);
        
        $proprietes = propriete::where('category_id', $category)->get();
        $valuecatProprietesHouse = valuecatpropriete::where('category_id', $category) 
        ->where('house_id', $id)
        ->get();

        $valArray = array();
        foreach($proprietes as $propriete){
            foreach($valuecatProprietesHouse as $val){
                if($val->propriete_id == $propriete->id){
                    array_push($valArray, $val);
                }
            }
        }
        //var_dump($valArray);
        return response()->json(["proprietes" => $proprietes,
                                 "house" => $house,
                                 "valArray" => $valArray]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house, Reservation $reservation)
    {
        $house = house::find($house->id);
        return view('houses.show', compact('house', 'id'))->with('house', $house);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house, Category $categories, Ville $villes)
    {
        $house = house::find($house->id);
        $categories = category::all();
        $villes = ville::all();
        return view('houses.edit', compact('house', 'id'))->with('categories', $categories)->with('villes', $villes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        $house = house::find($house->id);
        $house->title = $request->get('title');
        $house->category_id = $request->get('category_id');
        $house->ville_id = $request->get('ville_id');
        $house->adresse = $request->get('adresse');
        $house->price = $request->get('price');
        $house->photo = $request->get('photo');
        $house->description = $request->get('description');
        
        $picture = $request->file('photo');
        $filename  = time() . '.' . $picture->getClientOriginalExtension();
        $path = public_path('img/houses/' . $filename);
        Image::make($picture->getRealPath())->resize(350, 200)->save($path);
        $house->photo = $filename;

        $house->save();
        return redirect('/houses/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house = house::find($house->id);
        $house->delete();
        return redirect('houses/index');
        
    }

    public function mylocations($id) {
        $houseProfil = DB::table('users')
        ->select('users.*', 'houses.*')
        ->leftJoin('houses', 'houses.user_id','users.id')
        ->where('users.id', '=', $id)
        ->where('houses.id', '!=', NULL)
        ->get();
        return view('houses.mylocations', compact('houseProfil'))->with('data', Auth::user()->user);
    }

    public function note(House $house, Note $note) {
        $note = note::find($house->id);
        $house->title = $request->get('title');
        $house->idCategory = $request->get('idCategory');
        $house->price = $request->get('price');
    }
}
