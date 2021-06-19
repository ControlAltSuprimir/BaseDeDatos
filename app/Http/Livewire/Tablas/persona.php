<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Personas;
use Livewire\Component;
use Livewire\WithPagination;

class Persona extends Component
{
    use WithPagination;

    public $sortBy = 'primer_apellido';

    //public $filtro = 'is_valid';
    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';


    public $filtro;


    public function mount()
    {
    }


    public function render()
    {

        $items = Personas::where('is_valid', '=', 1)
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);

        return view('livewire.tablas.personas', [
            'items' => $items
        ]);
    }

    
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }
    

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
