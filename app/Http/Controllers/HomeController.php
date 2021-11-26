<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SitioTuristicoCollection;
use App\Http\Resources\SitioTuristicoResource;
use App\Models\SitioTuristico;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $sitios= SitioTuristico::getAll();
        //dd($sitios);

        return view('home', compact('sitios'));
    }

}

