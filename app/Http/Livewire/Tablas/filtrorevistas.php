<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Revistas;
use Livewire\Component;
use Livewire\WithPagination;

class filtrorevistas extends Component
{
    use WithPagination;

    public $sortBy = 'nombre';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';
    public $filtro;


    

    public function render()
    {
        if($this->filtro['tipo']=='indexacion'){

        $items = Revistas::where('is_valid', '=', 1)
            ->whereHas('indexaciones', function ($query) {
            return $query->where('indexaciones.id', '=', $this->filtro['id']);
        })
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(5);


        return view('livewire.tablas.revistas', [
            'items' => $items
        ]);}
        elseif($this->filtro['tipo']=='revista')
        {
            $items = Revistas::where('is_valid', '=', 1)
            ->where('id_Revista', '=', $this->filtro['id'])
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(5);


        return view('livewire.tablas.articulos', [
            'items' => $items
        ]); 
        }
        else
        {
            $items= Revistas::where('is_valid','=',1)
                ->search($this->search)
                ->orderBy($this->sortBy,$this->sortDirection)
                ->paginate(5);
        
        return view('livewire.tablas.revistas',[
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