<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RequisitoCumplido;

class RequisitoCumplidos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $requisito_id, $user_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire\requisito-cumplidos\view', [
            'requisitoCumplidos' => RequisitoCumplido::latest()
						->orWhere('requisito_id', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
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
		$this->requisito_id = null;
		$this->user_id = null;
    }

    public function store()
    {
        $this->validate([
		'requisito_id' => 'required',
		'user_id' => 'required',
        ]);

        RequisitoCumplido::create([
			'requisito_id' => $this-> requisito_id,
			'user_id' => $this-> user_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'RequisitoCumplido Successfully created.');
    }

    public function edit($id)
    {
        $record = RequisitoCumplido::findOrFail($id);

        $this->selected_id = $id;
		$this->requisito_id = $record-> requisito_id;
		$this->user_id = $record-> user_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'requisito_id' => 'required',
		'user_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = RequisitoCumplido::find($this->selected_id);
            $record->update([
			'requisito_id' => $this-> requisito_id,
			'user_id' => $this-> user_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'RequisitoCumplido Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = RequisitoCumplido::where('id', $id);
            $record->delete();
        }
    }
}
