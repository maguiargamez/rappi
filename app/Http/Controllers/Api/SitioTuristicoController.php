<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SitioTuristicoResource;
use App\Models\SitioTuristico;
use Illuminate\Http\Request;

class SitioTuristicoController extends Controller
{
    public function show(SitioTuristico $sitio)
    {
        return SitioTuristicoResource::make($sitio);

    }
}
