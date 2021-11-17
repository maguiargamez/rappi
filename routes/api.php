<?php

use App\Http\Controllers\Api\SitioTuristicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('sitios-turisticos/{sitio}', [SitioTuristicoController::class, 'show'])->name('api.v1.sitios-turisticos.show');
