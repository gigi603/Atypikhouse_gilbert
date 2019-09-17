<?php

namespace App\Http\Controllers;

use App\House;
use App\Category;
use App\Ville;
use \Date;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
// use Jenssegers\Date\Date;

class QueryController extends Controller
{
    /**
     * Display the houses researched in the searchbar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $categories = category::all();
        $datas = $request->flashOnly([ 'category_id', 'start_date', 'end_date', 'nb_personnes']);
        $today = Date::now();
        $start_date = Date::createFromFormat('!d/m/Y', $request->start_date)->format('Y-m-d');
        $end_date = Date::createFromFormat('!d/m/Y', $request->end_date)->format('Y-m-d');
        
        $houses= house::all();

        $houses = house::with('valuecatproprietes', 'proprietes', 'category')
        ->where('statut', 'Validé')
        ->where('start_date', '>=', $today)
        ->where('end_date', '>=', $today)
        ->where('start_date', '<=', $start_date)
        ->where('end_date', '>=', $end_date)
        ->where('nb_personnes', '>=', $request->nb_personnes)
        ->get();

        return view('houses.index')->with('houses', $houses)
                                   ->with('categories', $categories)
                                   ->with('datas', $datas);
    }
}
