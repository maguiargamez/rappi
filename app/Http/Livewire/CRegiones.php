<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Region;

class CRegiones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $slug, $nombre, $descripcion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.c_regiones.view', [
            'cRegiones' => Region::latest()
						->orWhere('slug', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
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
		$this->slug = null;
		$this->nombre = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'descripcion' => 'required',
        ]);

        Region::create([
			'slug' => Str::slug($this-> nombre),
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Región agregada correctamente.');
    }

    public function edit($id)
    {
        $record = Region::findOrFail($id);

        $this->selected_id = $id;
		$this->slug = $record-> slug;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'slug' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Region::find($this->selected_id);
            $record->update([
			'slug' => Str::slug($this-> nombre),
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Región actualizada.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Region::where('id', $id);
            $record->delete();
        }
    }
}
