<?php

namespace App\Http\Livewire\Tablas;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Articulos;
use App\Models\Proyectos;
use App\Models\PersonaProyecto;
use App\Models\ProyectosTesistas;
use App\Models\Tesis;
use Livewire\Component;
use Livewire\WithPagination;

class filtroproyectos extends Component
{
    use WithPagination;

    public $sortBy = 'titulo';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';
    public $filtro;




    public function render()
    {
        $myArray = [];
        if ($this->filtro['tipo'] == 'persona') {
            $proyectosResponsables = Proyectos::where('is_valid', '=', 1)
                ->where('investigador_responsable', '=', $this->filtro['id'])
                ->get();

            foreach ($proyectosResponsables as $proyecto) {
                $row = array(
                    'proyecto' => $proyecto->tituloLink(),
                    'rol' => "Investigador Responsable",
                    'codigo' => $proyecto->codigo_proyecto,
                    'fecha' => $proyecto->intervalo(),
                );
                $myArray[] = $row;
            }

            $otroProyectos = PersonaProyecto::where('is_valid', '=', 1)
                ->where('id_persona', '=', $this->filtro['id'])
                ->get();
            foreach ($otroProyectos as $proyecto) {
                $row = array(
                    'proyecto' => $proyecto->elProyecto->tituloLink(),
                    'rol' => $proyecto->participacion,
                    'codigo' => $proyecto->elProyecto->codigo_proyecto,
                    'fecha' => $proyecto->fecha,
                );
                $myArray[] = $row;
            }

            $data = $this->paginate($myArray);
            return view('livewire.tablas.filtroproyectos', compact('data'));
        } elseif ($this->filtro['tipo'] == 'tesis') {
            $losProyectos = Tesis::find($this->filtro['id'])
                ->otrosProyectos()
                ->get();

            foreach ($losProyectos as $proyecto){
                $row = array(
                    'proyecto' => $proyecto->elProyecto->tituloLink(),
                    'rol' => $proyecto->elProyecto->responsable->full_nameLink(),
                    'codigo' => $proyecto->elProyecto->codigo_proyecto,
                    'fecha' => $proyecto->elProyecto->intervalo(),
                );
                $myArray[] = $row;
                }
                $data = $this->paginate($myArray);
                return view('livewire.tablas.filtroproyectos', compact('data'));
        } else {
            $items = Articulos::where('is_valid', '=', 1)
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(25);

            return view('livewire.tablas.articulos', [
                'items' => $items
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

    public function paginate($items, $perPage = 15, $page = null, $options = [])

    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
