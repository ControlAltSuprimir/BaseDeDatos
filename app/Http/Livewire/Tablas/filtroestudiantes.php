<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Articulos;
use App\Models\Personas;
use App\Models\Tesis;
use App\Models\Programas;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class filtroestudiantes extends Component
{
    use WithPagination;

    public $sortBy = 'titulo';

    public $sortDirection = 'asc';
    public $perPage = 25;
    public $search = '';
    public $filtro;




    public function render()
    {
        //$personas = Personas::where('is_valid','=',1);
        $elEstado=0; // 1=>Activo,2=>Finalizado,3=>No Terminado,4=>Congelado
        $elPrograma=0; // 1=>licenciatura,2=>pedagogia,3=>magister,4=>doctorado
        if($this->filtro['estado']=='estudiante'){ $elEstado=1;}
        elseif($this->filtro['estado']=='exestudiante'){ $elEstado=2;}

        if ($this->filtro['programa'] == 'licenciatura') { $elPrograma=1;}
        elseif ($this->filtro['programa'] == 'pedagogia') { $elPrograma=2;}
        if ($this->filtro['programa'] == 'magister') { $elPrograma=3;}
        if ($this->filtro['programa'] == 'doctorado') { $elPrograma=4;}

        $items= Programas::find($elPrograma)
                            ->estudiantes()
                            ->where('personas_programas.estado','=',$elEstado)
                            ->paginate(25);

        return view('livewire.tablas.filtroestudiantes', [
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
