<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Anexo;
use App\Models\Requisito;

class Anexos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $contenido, $requisito_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.anexos.view', [
            'anexos' => Anexo::latest()
						->orWhere('contenido', 'LIKE', $keyWord)
						->orWhere('requisito_id', 'LIKE', $keyWord)
						->paginate(10),
                        'requisitos' => Requisito::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->contenido = null;
		$this->requisito_id = null;
    }

    public function store()
    {
        $this->validate([
		'contenido' => 'required',
		'requisito_id' => 'required',
        ]);

        Anexo::create([ 
			'contenido' => $this-> contenido,
			'requisito_id' => $this-> requisito_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Anexo Successfully created.');
    }

    public function edit($id)
    {
        $record = Anexo::findOrFail($id);

        $this->selected_id = $id; 
		$this->contenido = $record-> contenido;
		$this->requisito_id = $record-> requisito_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'contenido' => 'required',
		'requisito_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Anexo::find($this->selected_id);
            $record->update([ 
			'contenido' => $this-> contenido,
			'requisito_id' => $this-> requisito_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Anexo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Anexo::where('id', $id);
            $record->delete();
        }
    }
}
