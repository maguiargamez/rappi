<?php

namespace App\Http\Livewire;


use App\Models\SitioTuristico;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TSitiosTuristico;

class SitioTuristicoVisitaHome extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $keyWord;

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $sitios= SitioTuristico::getAllTableVisits($keyWord);
        foreach ($sitios as $sitio){
            $sitio->region= $sitio->region->nombre;
            $sitio->municipio= $sitio->municipio->nombre;
        }
        return view('livewire.sitio-turistico-visita-home', [
            'tSitiosTuristicos' => $sitios
        ]);
    }
}
