<?php/*

namespace App\Http\Livewire\Tablas;

use App\Models\Programas;
use Livewire\Component;
use Livewire\WithPagination;

class Filtroformacion extends Component
{
    use WithPagination;

    public $edit;

    public $sortBy = 'titulo';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';


    public function mount($edit)
    {
        if($edit['type']=='persona')
        {
            $itemMaximal = Programas::where('is_valid','=',1)
            
           $items = Programas::where('is_valid', '=', 1)
            //->searchProgramas($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);    
        }
    }


    public function render()
    {
        /*
        $items = Articulos::where('is_valid', '=', 1)
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);
        */
        /*
        $items = Articulos::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        */
        /*
        return view('livewire.tablas.articulos', [
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
