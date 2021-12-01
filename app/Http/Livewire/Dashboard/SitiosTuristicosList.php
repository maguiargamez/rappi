<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\SitioTuristico;
use Livewire\Component;

class SitiosTuristicosList extends Component
{
    /*public $sitios = [];
    public function mount()
    {
        $this->sitios= SitioTuristico::getAll();
    }*/

    public function render()
    {
        $sitios= SitioTuristico::getAll();
        return view('livewire.dashboard.sitios-turisticos-list',
        [
            'sitios' => $sitios
        ]);
    }
}
