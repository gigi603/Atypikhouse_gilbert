<?php

namespace App\Http\Controllers;

use App\House;
use App\Category;
use App\Ville;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
    /**
     * Display the houses researched in the searchbar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $ville = \Request::get('ville');
        $category = \Request::get('category_id');
        $categories = category::all();
        $datas = $request->flashOnly(['ville', 'category_id', 'start_date', 'end_date', 'nb_personnes']);
        $houses = House::with('category')->where([['ville', 'LIKE', '%' . $request->ville . '%'],['category_id', 'LIKE','%'. $request->category . '%'],['nb_personnes', 'LIKE','%'. $request->nb_personnes . '%'],['statut', '=', 'Validé']])->get();
        
        return view('houses.index')->with('houses', $houses)
                                   ->with('categories', $categories)
                                   ->with('category_id', $category)
                                   ->with('datas', $datas);
    }
}
