<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PreRequisito;
use App\Models\Requisito;

class PreRequisitos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $requisito_id, $pre_requisito_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pre-requisitos.view', [
            'preRequisitos' => PreRequisito::latest()
						->orWhere('requisito_id', 'LIKE', $keyWord)
						->orWhere('pre_requisito_id', 'LIKE', $keyWord)
						->paginate(10),
            'requisitos' => Requisito::all()
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->requisito_id = null;
		$this->pre_requisito_id = null;
    }

    public function store()
    {
        $this->validate([
		'requisito_id' => 'required',
		'pre_requisito_id' => 'required',
        ]);

        PreRequisito::create([
			'requisito_id' => $this-> requisito_id,
			'pre_requisito_id' => $this-> pre_requisito_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'PreRequisito Successfully created.');
    }

    public function edit($id)
    {
        $record = PreRequisito::findOrFail($id);

        $this->selected_id = $id;
		$this->requisito_id = $record-> requisito_id;
		$this->pre_requisito_id = $record-> pre_requisito_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'requisito_id' => 'required',
		'pre_requisito_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = PreRequisito::find($this->selected_id);
            $record->update([
			'requisito_id' => $this-> requisito_id,
			'pre_requisito_id' => $this-> pre_requisito_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'PreRequisito Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = PreRequisito::where('id', $id);
            $record->delete();
        }
    }
}
