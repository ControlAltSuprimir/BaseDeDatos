<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Tesis;
use Livewire\Component;
use Livewire\WithPagination;

class filtrotesis extends Component
{
    use WithPagination;

    public $sortBy = 'fechaDefensa';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';



    public function render()
    {
        $items= Tesis::where('is_valid','=',1)
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate(25);
        

        return view('livewire.tablas.filtrotesis',[
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