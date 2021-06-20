<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Revistas;
use Livewire\Component;
use Livewire\WithPagination;

use DB;

class filtrorevistas extends Component
{
    use WithPagination;

    public $sortBy = 'publicaciones';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';
    public $filtro;


    

    public function render()
    {
        
        $items= Revistas::where('is_valid','=',1)
                ->search($this->search);

        if($this->sortBy=='publicaciones')
        {
            $items= $items->withCount('articulos')
                ->orderBy('articulos_count',$this->sortDirection);
        }
        elseif($this->sortBy=='Fondecyt')
        {
            $clasificaciones=["R","B","MB","R/B/MB*","MB/B*"];
            $items = $items->orderBy(DB::raw('FIELD(clasificacion_Fondecyt,"R","B","MB","R/B/MB*","MB/B*","")'),$this->sortDirection);
            /*
            $ids=['MB','B','R','No Clasificada'];
            $items = $items->whereIn('revistas.clasificacion_Fondecyt', $ids)
            ->orderByRaw('FIELD (revistas.clasificacion_Fondecyt, ' . implode(', ', $ids) . ') ASC');
            /*
            $clasificaciones=['MB','B','R/B/MB*','R','No Clasificada',1];
            $items = $items->orderBy(function($model) use ($clasificaciones){
                return array_search($model->fondecyt(), $clasificaciones);});
            */
            
        }
        else
        {
            $items = $items->orderBy($this->sortBy,$this->sortDirection);
        }
          
        $items = $items->paginate(25);
                
        /*
        $items= Revistas::where('is_valid','=',1)
                ->search($this->search)
                ->orderBy($this->sortBy,$this->sortDirection)
                ->paginate(25);
        */
                
        
        return view('livewire.tablas.revistas',[
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