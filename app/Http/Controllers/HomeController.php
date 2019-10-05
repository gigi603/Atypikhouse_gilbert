<?php

/**
 * A propos
 * Mentions Légales
 * Politique de confidentialité
 * Conditions générales d'utilisation
 * 
 */

namespace App\Http\Controllers;

use App\House;
use App\User;
use App\Category;
use App\Valuecatpropriete;
use App\Propriete;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $today = Date::today()->format('Y-m-d');
        $houses = house::with('valuecatproprietes', 'proprietes', 'category')
        ->where('start_date', '>=', $today)
        ->where('end_date', '>=', $today)
        ->where('statut', '=', "Validé")
        ->where('disponible', '=', "oui")
        ->orderBy('id', 'desc')
        ->get();
        $categories = category::all();

        return view('home')->with('houses', $houses)
                           ->with('categories', $categories);
    }

    public function searchHouses(SearchRequest $request)
    {
        $today = Date::today()->format('Y-m-d');
        $houses = house::with('valuecatproprietes', 'proprietes', 'category')
        ->where('disponible', 'oui')
        ->orderBy('id', 'desc')
        ->get();
        $categories = category::all();
        //$datas = $request->flashOnly(['ville', 'category_id', 'start_date', 'end_date', 'nb_personnes']);
        return view('houses.index')->with('houses', $houses)
                           ->with('categories', $categories);
                           //->with('datas', $datas);
    }
    public function apropos() {
        $categories = category::all();
        return view('apropos')->with('categories', $categories);
    }
    public function mentions_legales() {
        $categories = category::all();
        return view('mentions_legales')->with('categories', $categories);
    }
    public function politique_de_confidentialite() {
        $categories = category::all();
        return view('politique_de_confidentialite')->with('categories', $categories);
    }
    public function cgu() {
        $categories = category::all();
        return view('cgu')->with('categories', $categories);
    }
    public function rgpd() {
        $categories = category::all();
        return view('rgpd')->with('categories', $categories);
    }
    public function faq() {
        $categories = category::all();
        return view('faq')->with('categories', $categories);
    }
}
