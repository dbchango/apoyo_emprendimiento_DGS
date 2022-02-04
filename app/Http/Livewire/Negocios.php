<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Negocio;
use Illuminate\Support\Facades\Auth;

class Negocios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $ubicacion, $detalles, $logo, $user_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.negocios.view', [
              'negocios' => Negocio::where([['user_id', '=', Auth::user()->id],
              ['nombre', 'LIKE', $keyWord],
              ['ubicacion', 'LIKE', $keyWord],
              ['detalles', 'LIKE', $keyWord],
              ['logo', 'LIKE', $keyWord]
              ])->paginate(10),

 
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
}
