<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Negocio;
use App\Models\Requisito;
use App\Models\RequisitoCumplido;
use Illuminate\Support\Facades\Auth;

class Negocios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $selectede_id,$keyWord, $nombre, $ubicacion, $detalles, $logo, $user_id,$requisito_id,$negocio_id;
    public $updateMode = false;

    public function render()
    {
        $requisitos['requisitos'] = Requisito::all();
        $requisitosCumplidos['requisitosCumplidos'] = RequisitoCumplido::all()->where('negocio_id', '=', $this->selectede_id);
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.negocios.view', [
              'negocios' => Negocio::where([['user_id', '=', Auth::user()->id],
              ['nombre', 'LIKE', $keyWord],
              ['ubicacion', 'LIKE', $keyWord],
              ['detalles', 'LIKE', $keyWord],
              ['logo', 'LIKE', $keyWord]
              ])->paginate(10),
        ])->with($requisitos)
          ->with($requisitosCumplidos);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->nombre = null;
		$this->ubicacion = null;
		$this->detalles = null;
		$this->logo = null;
		$this->user_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'ubicacion' => 'required',
		'detalles' => 'required',
		'logo' => 'required',
        ]);

        Negocio::create([
			'nombre' => $this-> nombre,
			'ubicacion' => $this-> ubicacion,
			'detalles' => $this-> detalles,
			'logo' => $this-> logo,
			'user_id' => Auth::user()->id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Negocio Successfully created.');
    }

    public function idNegocio($id)
    {
        $this->selectede_id = $id;
    }

    public function storeRequisito()
    {
        $this->validate([
		'requisito_id' => 'required',
        ]);

        RequisitoCumplido::create([
			'requisito_id' => $this-> requisito_id,
			'negocio_id' =>$this->selectede_id,
        ]);
		session()->flash('message', 'Requisitos Successfully created.');
    }


    public function edit($id)
    {
        $record = Negocio::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->ubicacion = $record-> ubicacion;
		$this->detalles = $record-> detalles;
		$this->logo = $record-> logo;
		$this->user_id = Auth::user()->name;

        $this->updateMode = true;
    }


    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'ubicacion' => 'required',
		'detalles' => 'required',
		'logo' => 'required',

        ]);

        if ($this->selected_id) {
			$record = Negocio::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
			'ubicacion' => $this-> ubicacion,
			'detalles' => $this-> detalles,
			'logo' => $this-> logo,
			'user_id' => Auth::user()->id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Negocio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Negocio::where('id', $id);
            $record->delete();
        }
    }

    public function destroyRequisitoCumplido($id)
    {
        if ($id) {
            $record = RequisitoCumplido::where('id', $id);
            $record->delete();
        }
    }
}
