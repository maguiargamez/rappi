<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SitioTuristicoVisitaResource;
use App\Models\SitioTuristicoVisita;
use Illuminate\Http\Request;

class SitioTuristicoVisitaController extends Controller
{
    public function create(Request $request)
    {
        $visita = SitioTuristicoVisita::create([
            'sitio_turistico_id' => $request->input('data.attributes.sitio_turistico_id'),
            'ip' => $request->input('data.attributes.ip'),
            'fecha' => $request->input('data.attributes.fecha'),
        ]);

        return SitioTuristicoVisitaResource::make($visita);
    }
}
