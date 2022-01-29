<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\OrganizacionesRegulatoria;

class OrganizacionesRegulatorias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $direccion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire\organizaciones-regulatorias\view', [
            'organizacionesRegulatorias' => OrganizacionesRegulatoria::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
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
		$this->direccion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'direccion' => 'required',
        ]);

        OrganizacionesRegulatoria::create([
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'OrganizacionesRegulatoria Successfully created.');
    }

    public function edit($id)
    {
        $record = OrganizacionesRegulatoria::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->direccion = $record-> direccion;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'direccion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = OrganizacionesRegulatoria::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'OrganizacionesRegulatoria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = OrganizacionesRegulatoria::where('id', $id);
            $record->delete();
        }
    }
}
