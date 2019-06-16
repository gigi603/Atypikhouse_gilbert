<?php

namespace App\Http\Controllers;

use App\House;
use App\Category;
use App\Ville;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
    /**
     * Display the houses researched in the searchbar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ville = \Request::get('ville');
        $category = \Request::get('category_id');
        $categories = category::all();
        $houses = House::with('category')->where([['ville', 'LIKE', '%' . $ville . '%'],['category_id', 'LIKE','%'. $category . '%'],['statut', '=', 'Validé']])->get();
        
        return view('houses.index')->with('houses', $houses)
                                   ->with('categories', $categories)
                                   ->with('category_id', $category);
    }
}
