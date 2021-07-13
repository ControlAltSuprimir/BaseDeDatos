<?php

namespace App\Http\Livewire\Tablas;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Articulos;
use App\Models\Proyectos;
use App\Models\PersonaProyecto;
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
        /*
        $myArray = [
            ['id' => 1, 'title' => 'Laravel CRUD'],
            ['id' => 2, 'title' => 'Laravel Ajax CRUD'],
            ['id' => 3, 'title' => 'Laravel CORS Middleware'],
            ['id' => 4, 'title' => 'Laravel Autocomplete'],
            ['id' => 5, 'title' => 'Laravel Image Upload'],
            ['id' => 6, 'title' => 'Laravel Ajax Request'],
            ['id' => 7, 'title' => 'Laravel Multiple Image Upload'],
            ['id' => 8, 'title' => 'Laravel Ckeditor'],
            ['id' => 9, 'title' => 'Laravel Rest API'],
            ['id' => 10, 'title' => 'Laravel Pagination'],
        ];
*/
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

        } elseif ($this->filtro['tipo'] == 'revista') {
            $items = Articulos::where('is_valid', '=', 1)
                ->where('id_Revista', '=', $this->filtro['id'])
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(25);


            return view('livewire.tablas.articulos', [
                'items' => $items
            ]);
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
