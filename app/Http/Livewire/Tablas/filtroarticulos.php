<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Articulos;
use Livewire\Component;
use Livewire\WithPagination;

class filtroarticulos extends Component
{
    use WithPagination;

    public $sortBy = 'titulo';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';
    public $filtro;


    

    public function render()
    {
        if($this->filtro['tipo']=='persona'){

        $items = Articulos::where('is_valid', '=', 1)
            ->whereHas('autores', function ($query) {
            return $query->where('personas.id', '=', $this->filtro['id']);
        })
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);


        return view('livewire.tablas.articulos', [
            'items' => $items
        ]);}
        elseif($this->filtro['tipo']=='revista')
        {
            $items = Articulos::where('is_valid', '=', 1)
            ->where('id_Revista', '=', $this->filtro['id'])
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);


        return view('livewire.tablas.articulos', [
            'items' => $items
        ]); 
        }
        else
        {
            $items= Articulos::where('is_valid','=',1)
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate(25);
        
        return view('livewire.tablas.articulos',[
            'items'=> $items
        ]);
        }
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
