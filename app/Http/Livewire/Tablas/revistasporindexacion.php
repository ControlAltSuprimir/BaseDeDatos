<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Indexaciones_Revistas;
use App\Models\Revistas;
use Livewire\Component;
use Livewire\WithPagination;

class revistasporindexacion extends Component
{
    use WithPagination;

    public $sortBy = 'impact_factor';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';
    public $filtro;



    public function render()
    {
        $items = Indexaciones_Revistas::where('is_valid', '=', 1)
            ->where('id_Indexacion','=',$this->filtro['id'])
            /*->search($this->search)*/
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(5);
            /*
        ->whereHas('indexaciones', function ($query) {
            return $query->where('indexaciones.id', '=', $this->filtro['id']);
        })
        */

        /*
        $items = Articulos::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        */

        return view('livewire.tablas.revistasporindexacion', [
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
