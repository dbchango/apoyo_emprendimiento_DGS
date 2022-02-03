<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Requisito;
use App\Models\OrganizacionesRegulatoria;

class Requisitos extends Component
{
    use WithPagination;
    public $selectedOrganizacion=null;
	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $costo, $contenido, $nombre, $detalles, $organizaciones_regulatorias_id;
    public $updateMode = false;

    public function render()
    {
       // dd(OrganizacionesRegulatoria::all());
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.requisitos.view', [
            'requisitos' => Requisito::latest()
						->orWhere('costo', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
                        ->orWhere('contenido', 'LIKE', $keyWord)
						->orWhere('detalles', 'LIKE', $keyWord)
						->orWhere('organizaciones_regulatorias_id', 'LIKE', $keyWord)
						->paginate(10),
            'organizacionesRegulatoria' => OrganizacionesRegulatoria::all(),

        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->costo = null;
        $this->nombre = null;
		$this->contenido = null;
		$this->detalles = null;
		$this->organizaciones_regulatorias_id = null;
    }

    public function store()
    {
        $this->validate([
		'costo' => 'required',
        'nombre' => 'required',
		'contenido' => 'required',
		'detalles' => 'required',
		'organizaciones_regulatorias_id' => 'required',
        ]);

        Requisito::create([
			'costo' => $this-> costo,
            'nombre' => $this-> nombre,
			'contenido' => $this-> contenido,
			'detalles' => $this-> detalles,
			'organizaciones_regulatorias_id' => $this-> organizaciones_regulatorias_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Requisito Successfully created.');
    }

    public function edit($id)
    {
        $record = Requisito::findOrFail($id);

        $this->selected_id = $id;
		$this->costo = $record-> costo;
		$this->nombre = $record-> nombre;
		$this->contenido = $record-> contenido;
		$this->detalles = $record-> detalles;
		$this->organizaciones_regulatorias_id = $record-> organizaciones_regulatorias_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'costo' => 'required',
		'contenido' => 'required',
		'nombre' => 'required',
		'detalles' => 'required',
		'organizaciones_regulatorias_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Requisito::find($this->selected_id);
            $record->update([
			'costo' => $this-> costo,
			'contenido' => $this-> contenido,
			'nombre' => $this-> nombre,
			'detalles' => $this-> detalles,
			'organizaciones_regulatorias_id' => $this-> organizaciones_regulatorias_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Requisito Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Requisito::where('id', $id);
            $record->delete();
        }
    }
}
