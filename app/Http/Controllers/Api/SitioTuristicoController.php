<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SitioTuristicoCollection;
use App\Http\Resources\SitioTuristicoResource;
use App\Models\SitioTuristico;
use Illuminate\Http\Request;

class SitioTuristicoController extends Controller
{
    public function show($id)
    {
        $sitio= SitioTuristico::getSingle($id);
        $sitio->region= $sitio->region->nombre;
        return SitioTuristicoResource::make($sitio);
    }

    public function index()
    {
        $sitios= SitioTuristico::getAll();
        foreach ($sitios as $sitio){
            $sitio->region= $sitio->region->nombre;
        }
        return SitioTuristicoCollection::make($sitios);
    }
}
