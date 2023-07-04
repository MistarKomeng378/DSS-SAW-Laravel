<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countWarga = Alternative::count();
        $countMale = Alternative::where('jns_kelamin','L')->count();
        $countFemale = Alternative::where('jns_kelamin','P')->count();
        return view('home', compact('countWarga','countMale','countFemale'));
    }
}
