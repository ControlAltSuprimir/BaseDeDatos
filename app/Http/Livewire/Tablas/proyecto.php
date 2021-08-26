<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Proyectos;
use Livewire\Component;
use Livewire\WithPagination;

class Proyecto extends Component
{
    use WithPagination;

    public $sortBy = 'termino';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';



    public function render()
    {
        $items= Proyectos::where('is_valid','=',1)
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate($this->perPage);
        

        return view('livewire.tablas.proyectos',[
            'items'=> $items
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