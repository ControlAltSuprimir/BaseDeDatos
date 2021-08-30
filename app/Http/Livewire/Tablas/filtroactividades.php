<?php

namespace App\Http\Livewire\Tablas;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Articulos;
use App\Models\Viajes;
use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use App\Models\Proyectos;
use App\Models\PersonaProyecto;
use Livewire\Component;
use Livewire\WithPagination;

use DB;

class filtroactividades extends Component
{
    use WithPagination;

    public $sortBy = 'titulo';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';
    public $filtroActividades;




    public function render()
    {
        
        $myArray = [];
        if ($this->filtroActividades['tipo'] == 'persona') {

            $academicasActividades = DB::table('personas_academica')->where('is_valid','=',1)
                ->where('id_persona','=',$this->filtroActividades['id'])
                ->get();
            $extensionActividades = DB::table('personas_extension')->where('is_valid','=',1)
            ->where('id_persona','=',$this->filtroActividades['id'])
            ->get();

            foreach ($academicasActividades as $academica) {
                $laAcademica = ActividadAcademica::find($academica->id_academica);
                $elViaje = Viajes::find($academica->id_viaje);
                $row = array(
                    'nombre' => $laAcademica->nombre,
                    'link' => '/actividadacademica/'.$laAcademica->id,
                    'tipo' => 'Académica',
                    'fecha' => $laAcademica->fecha_comienzo . ' / ' . $laAcademica->fecha_termino,
                    'viaje' => (isset($elViaje)) ? $elViaje->full_name() : '',
                    'id_viaje' => $academica->id_viaje
                );
                $myArray[] = $row;
            }

            foreach ($extensionActividades as $extension) {
                $laExtension = ActividadExtension::find($extension->id_actividad);
                $elViaje = Viajes::find($extension->id_viaje);
                $row = array(
                    'nombre' => $laExtension->nombre,
                    'link' => '/actividadextension/'.$laExtension->id,
                    'tipo' => 'Extensión',
                    'fecha' => $laExtension->fecha_comienzo . ' / ' . $laExtension->fecha_termino,
                    'viaje' => $elViaje->full_name(),
                    'id_viaje' => $extension->id_viaje
                );
                $myArray[] = $row;
            }
            /*
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
            */

            $data = $this->paginate($myArray);
            return view('livewire.tablas.filtroactividades', compact('data'));

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
