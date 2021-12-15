<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Municipio;

class CMunicipios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $activo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.c_municipios.view', [
            'cMunicipios' => Municipio::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('activo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->nombre = null;
		$this->activo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Municipio::create([
			'nombre' => $this-> nombre,
        ]);

        $this->resetInput();
        $this->emit('closeModal');
		session()->flash('message', 'Municipio agregado.');

    }

    public function edit($id)
    {
        $record = Municipio::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->activo = $record-> activo;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Municipio::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Municipio actualizado.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Municipio::where('id', $id);
            $record->delete();
        }
    }
}
