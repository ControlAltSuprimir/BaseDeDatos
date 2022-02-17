<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Viajes;
use Livewire\Component;
use Livewire\WithPagination;


class Viaje extends Component
{
    use WithPagination;

    public $sortBy = 'id';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';



    public function render()
    {
        $items= Viajes::with('persona')->where('is_valid','=',1)
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate(25);
        /*
        $items = Articulos::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        */

        return view('livewire.tablas.viajes',[
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