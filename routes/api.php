<?php

use App\Http\Controllers\Api\SitioTuristicoController;
use App\Http\Controllers\Api\SitioTuristicoVisitaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('sitios-turisticos', [SitioTuristicoController::class, 'index'])->name('api.v1.sitios-turisticos.index');
Route::get('sitios-turisticos/{sitio}', [SitioTuristicoController::class, 'show'])->name('api.v1.sitios-turisticos.show');

Route::post('sitios-turisticos-visitas', [SitioTuristicoVisitaController::class, 'create'])->name('api.v1.sitios-turisticos-visitas.create');
//Test2
