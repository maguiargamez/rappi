<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $two_factor_secret, $two_factor_recovery_codes, $password;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.users.view', [
            'users' => User::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->email = null;
        $this->password = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
			'name' => $this-> name,
			'email' => $this-> email,
            'password' => Hash::make($this-> password),
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->email = $record-> email;
//        /$this->password = $record-> password;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([
			'name' => $this-> name,
			'email' => $this-> email,
                'password' => Hash::make($this-> password),
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'User actualizado.');


        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
