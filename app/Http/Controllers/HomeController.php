<?php

namespace App\Http\Controllers;

use App\Models\SitioTuristico;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sitios= SitioTuristico::getTop(4);
        //dd($sitios);
        return view('home', compact($sitios));
    }
}
