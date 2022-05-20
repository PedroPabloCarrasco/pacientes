<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paciente;

class Pacientes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $ApellidoPaterno, $ApellidoMaterno, $Correo, $Foto;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pacientes.view', [
            'pacientes' => Paciente::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('ApellidoPaterno', 'LIKE', $keyWord)
						->orWhere('ApellidoMaterno', 'LIKE', $keyWord)
						->orWhere('Correo', 'LIKE', $keyWord)
						->orWhere('Foto', 'LIKE', $keyWord)
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
		$this->Nombre = null;
		$this->ApellidoPaterno = null;
		$this->ApellidoMaterno = null;
		$this->Correo = null;
		$this->Foto = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'ApellidoPaterno' => 'required',
		'ApellidoMaterno' => 'required',
		'Correo' => 'required',
		'Foto' => 'required',
        ]);

        Paciente::create([ 
			'Nombre' => $this-> Nombre,
			'ApellidoPaterno' => $this-> ApellidoPaterno,
			'ApellidoMaterno' => $this-> ApellidoMaterno,
			'Correo' => $this-> Correo,
			'Foto' => $this-> Foto
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'El paciente fue creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Paciente::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		$this->ApellidoPaterno = $record-> ApellidoPaterno;
		$this->ApellidoMaterno = $record-> ApellidoMaterno;
		$this->Correo = $record-> Correo;
		$this->Foto = $record-> Foto;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'ApellidoPaterno' => 'required',
		'ApellidoMaterno' => 'required',
		'Correo' => 'required',
		'Foto' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paciente::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'ApellidoPaterno' => $this-> ApellidoPaterno,
			'ApellidoMaterno' => $this-> ApellidoMaterno,
			'Correo' => $this-> Correo,
			'Descripcion' => $this-> Foto
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Paciente Actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Paciente::where('id', $id);
            $record->delete();
        }
    }
}
