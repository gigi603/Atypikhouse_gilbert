<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillesController extends Controller
{
    /**
     * Display cities
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = ville::all();
    }
}
