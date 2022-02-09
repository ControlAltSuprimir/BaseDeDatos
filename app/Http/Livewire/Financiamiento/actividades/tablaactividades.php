<?php

namespace App\Http\Livewire\Financiamiento\actividades;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use App\Models\Curso;



use Livewire\Component;
use Livewire\WithPagination;

use DB;

class tablaactividades extends Component
{
    use WithPagination;


    public $ano;

    public $searchTerm;


    public function render()
    {

        
            $searchTerm = '%'.$this->searchTerm . '%';
            if ($this->ano == ''){
                $actividades = ActividadAcademica::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->where('nombre','like',$searchTerm)->get();
                $extensiones = ActividadExtension::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->where('nombre','like',$searchTerm)->get();
            }
            else{
                $actividades = ActividadAcademica::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->whereYear('fecha_comienzo', $this->ano)->where('nombre','like',$searchTerm)->get();
                $extensiones = ActividadExtension::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->whereYear('fecha_comienzo', $this->ano)->where('nombre','like',$searchTerm)->get();
            }

    
            
            $myArray = [];//Listamos las actividades en este array. Dante wn ¿Por qué la insistencia en tener una tabla para cada tipo de actividad? Lo mismo con las tesis, mira el temendo baile de código que hay que hacer por eso
            
    
            $encabezado = array(
                0 => 'Actividad',
                1 => 'Tipo',
                2 => 'Periodo'
            );
            
    
            foreach ($actividades as $actividad){
                $row = array(
                    0 => $actividad->nombre_Link(),
                    1 => 'Académica',
                    2 => $actividad->intervalo()
                );
                $myArray[] = $row;
            }
    
            foreach ($extensiones as $actividad){
                $row = array(
                    0 => $actividad->nombre_Link(),
                    1 => 'Extensión',
                    2 => $actividad->intervalo()
                );
                $myArray[] = $row;
                
            }
    
            $myArray = $this->paginate($myArray);
            $data = compact('myArray', 'encabezado');
            return view('livewire.financiamiento.actividades.tabladinamica', ['data' => $data]);
        
        
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginate($items, $perPage = 30, $page = null, $options = [])

    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
