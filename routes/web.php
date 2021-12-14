<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('home', \App\Http\Livewire\Dashboard\SitiosTuristicosList::class)->name('home');
    //Route::get('home', \App\Http\Livewire\Dashboard\SitiosTuristicosList::class)->name('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//Route Hooks - Do not delete//
	Route::view('t-sitios-turisticos', 'livewire.t_sitios_turisticos.index')->middleware('auth');

Route::view('t-sitios-turisticos-visitas', 'livewire.t_sitios_turisticos_visitas.index')->middleware('auth');
