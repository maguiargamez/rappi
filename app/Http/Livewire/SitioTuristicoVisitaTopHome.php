<?php

namespace App\Http\Livewire;

use App\Models\SitioTuristico;
use Livewire\Component;

class SitioTuristicoVisitaTopHome extends Component
{
    public $sitios;
    public function render()
    {
        $sitios= SitioTuristico::getTop(4);
        $total_visitas= \App\Models\SitioTuristicoVisita::getAllCount();;

        $colors = [1=>'success', 2=>'info', 3=>'warning', 4=>'danger'];
        return view('livewire.sitio-turistico-visita-top-home', ['sitioss'=>$sitios, 'colors'=>$colors, 'total_visitas' => $total_visitas]);
    }
}
