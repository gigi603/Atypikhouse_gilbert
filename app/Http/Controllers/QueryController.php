<?php

namespace App\Http\Controllers;

use App\House;
use App\Category;
use App\Ville;
use \DateTime;
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
        $categories = category::all();
        $datas = $request->flashOnly([ 'category_id', 'start_date', 'end_date', 'nb_personnes']);
        $start_date = DateTime::createFromFormat('!d/m/Y', $request->start_date);
        $end_date = DateTime::createFromFormat('!d/m/Y', $request->end_date);
        var_dump($start_date);
        var_dump($end_date);
        if($start_date > $end_date)
            echo("start_date est plus grand");
        else
            echo("end_date est plus grand");
        // $date1 = "1998-11-24"; 
        // $date2 = "1997-03-26"; 
        // var_dump($date1);
        // var_dump($date2);
        
        // // Use comparison operator to  
        // // compare dates 
        // if ($date1 > $date2) 
        //     echo "$date1 is latest than $date2"; 
        // else
        //     echo "$date1 is older than $date2"; 
        
        
        // $start_date = DateTime::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        // var_dump($start_date);
        
        // $end_date = strtotime($request->start_date)->format('Y-m-d');
        // $start_date = date('Y-m-d H:i', $request->start_date);
        $houses = House::with('category')->where([['category_id', '=', $request->category_id],['start_date', '<=', $start_date],['end_date', '>=', $end_date], ['statut', '=', 'Validé']])->get();

        return view('houses.index')->with('houses', $houses)
                                   ->with('categories', $categories)
                                   ->with('datas', $datas);
    }
}
