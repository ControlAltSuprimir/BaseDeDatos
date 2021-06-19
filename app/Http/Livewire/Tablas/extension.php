<?php

namespace App\Http\Livewire\Tablas;

use App\Models\ActividadExtension;
use Livewire\Component;
use Livewire\WithPagination;

class extension extends Component
{
    use WithPagination;

    public $sortBy = 'fecha_comienzo';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';



    public function render()
    {
        $items= ActividadExtension::where('is_valid','=',1)
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate(25);
        /*
        $items = Articulos::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        */

        return view('livewire.tablas.extension',[
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