<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Articulos;
use Livewire\Component;
use Livewire\WithPagination;

class Articulo extends Component
{
    use WithPagination;

    public $sortBy = 'fecha_publicacion';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';



    public function render()
    {
        $items= Articulos::where('is_valid','=',1)
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate(25);
        /*
        $items = Articulos::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        */

        return view('livewire.tablas.articulos',[
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