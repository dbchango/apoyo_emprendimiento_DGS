<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoDePersona;

class TipoDePersonas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipo-de-personas.view', [
            'tipoDePersonas' => TipoDePersona::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        TipoDePersona::create([
			'nombre' => $this-> nombre
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'TipoDePersona Successfully created.');
    }

    public function edit($id)
    {
        $record = TipoDePersona::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TipoDePersona::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'TipoDePersona Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            try {
                $record = TipoDePersona::where('id', $id);
                $record->delete();
            } catch (\Exception $e) {
                session()->flash('messageError', 'Algo anda mal, intentalo de nuevo');
            }
        }
    }
}
