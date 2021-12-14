<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;

class SitioTuristicoVisita extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $keyWord;

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $sitios= \App\Models\SitioTuristicoVisita::getAllTable($keyWord);


        foreach ($sitios as $sitio){
            $sitio->sitioturistico= $sitio->sitioturistico->nombre;
        }
        //dd($sitios);
        return view('livewire.t_sitios_turisticos_visitas.view', [
            'tSitiosTuristicos' => $sitios
        ]);
    }
}
