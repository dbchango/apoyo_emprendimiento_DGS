<?php

namespace App\Http\Livewire;

use App\Models\Negocio;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RequisitoCumplido;
use App\Models\Requisito;
use Illuminate\Support\Facades\Auth;

class RequisitoCumplidos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $requisito_id, $negocio_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.requisito-cumplidos.view', [
            'requisitoCumplidos' => RequisitoCumplido::latest()
						->orWhere('requisito_id', 'LIKE', $keyWord)
						->orWhere('negocio_id', 'LIKE', $keyWord)
						->paginate(10),
            'requisitos' => Requisito::all(),
            'negocios' => Negocio::all(),
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
		$this->negocio_id = null;
    }

    public function store()
    {
        $this->validate([
		'requisito_id' => 'required',
		'negocio_id' => 'required',
        ]);

        RequisitoCumplido::create([
			'requisito_id' => $this-> requisito_id,
			'negocio_id' => $this-> negocio_id,
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
		$this->negocio_id = $record-> negocio_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'requisito_id' => 'required',
		'negocio_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = RequisitoCumplido::find($this->selected_id);
            $record->update([
			'requisito_id' => $this-> requisito_id,
			'negocio_id' => $this-> negocio_id,
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'RequisitoCumplido Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            try {
                $record = RequisitoCumplido::where('id', $id);
                $record->delete();
            } catch (\Exception $e) {
                session()->flash('messageError', 'Algo anda mal, intentalo de nuevo');
            }
        }
    }
}
