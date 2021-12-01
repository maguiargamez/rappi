<?php

namespace App\Http\Livewire;

use App\Models\SitioTuristico;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TSitiosTuristico;

class TSitiosTuristicos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $slug, $region_id, $municipio_id, $nombre, $descripcion, $como_llegar, $lugares_relacionados, $coordenadas, $activo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $sitios= SitioTuristico::getAllTable($keyWord);
        foreach ($sitios as $sitio){
            $sitio->region= $sitio->region->nombre;
            $sitio->municipio= $sitio->municipio->nombre;
        }
        return view('livewire.t_sitios_turisticos.view', [
            'tSitiosTuristicos' => $sitios
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->slug = null;
		$this->region_id = null;
		$this->municipio_id = null;
		$this->nombre = null;
		$this->descripcion = null;
		$this->como_llegar = null;
		$this->lugares_relacionados = null;
		$this->coordenadas = null;
		$this->activo = null;
    }

    public function store()
    {
        $this->validate([
		'slug' => 'required',
		'region_id' => 'required',
		'municipio_id' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'como_llegar' => 'required',
		'lugares_relacionados' => 'required',
		'coordenadas' => 'required',
		'activo' => 'required',
        ]);

        TSitiosTuristico::create([
			'slug' => $this-> slug,
			'region_id' => $this-> region_id,
			'municipio_id' => $this-> municipio_id,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'como_llegar' => $this-> como_llegar,
			'lugares_relacionados' => $this-> lugares_relacionados,
			'coordenadas' => $this-> coordenadas,
			'activo' => $this-> activo
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'TSitiosTuristico Successfully created.');
    }

    public function edit($id)
    {
        $record = TSitiosTuristico::findOrFail($id);

        $this->selected_id = $id;
		$this->slug = $record-> slug;
		$this->region_id = $record-> region_id;
		$this->municipio_id = $record-> municipio_id;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->como_llegar = $record-> como_llegar;
		$this->lugares_relacionados = $record-> lugares_relacionados;
		$this->coordenadas = $record-> coordenadas;
		$this->activo = $record-> activo;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'slug' => 'required',
		'region_id' => 'required',
		'municipio_id' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'como_llegar' => 'required',
		'lugares_relacionados' => 'required',
		'coordenadas' => 'required',
		'activo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TSitiosTuristico::find($this->selected_id);
            $record->update([
			'slug' => $this-> slug,
			'region_id' => $this-> region_id,
			'municipio_id' => $this-> municipio_id,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'como_llegar' => $this-> como_llegar,
			'lugares_relacionados' => $this-> lugares_relacionados,
			'coordenadas' => $this-> coordenadas,
			'activo' => $this-> activo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'TSitiosTuristico Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = TSitiosTuristico::where('id', $id);
            $record->delete();
        }
    }
}
