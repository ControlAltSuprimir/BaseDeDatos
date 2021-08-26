<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Articulos;
use App\Models\Tesis;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

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
        $articulos = Articulos::where('is_valid', '=', 1);
        //Especificamos la búsqueda
        if ($this->filtro['tipo'] == 'persona') {

            $subitems = $articulos->whereHas('autores', function ($query) {
                return $query->where('personas.id', '=', $this->filtro['id']);
            })->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);
        } elseif ($this->filtro['tipo'] == 'revista') {
            $subitems = $articulos->where('id_Revista', '=', $this->filtro['id'])->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);
        } elseif ($this->filtro['tipo'] == 'noPublicados') {
            $subitems = Articulos::where('is_valid', '=', 1)
                ->where(function ($query) {
                    $query->where('estado_publicacion', '!=', 'publicado')
                        ->orWhereNull('estado_publicacion');
                })->search($this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(25);
        } elseif ($this->filtro['tipo'] == 'tesis') {
            $laTesis = Tesis::find($this->filtro['id']);
            $subitems= $laTesis->articulos()->get();
        } else {
            $subitems = $articulos->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);
        }
        $items=$subitems;
        /*
        $items = $subitems->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);
            */
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
