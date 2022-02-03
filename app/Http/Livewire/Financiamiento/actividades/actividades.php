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

class actividades extends Component
{
    use WithPagination;

    public $sortBy = 'publicaciones';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';
    public $filtro;

    public $searchTerm;
    public $periodoSelected;


    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        if($this->periodoSelected==''){
            $actividades = ActividadAcademica::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->where('nombre','like',$searchTerm)->get();
            $extensiones = ActividadExtension::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->where('nombre','like',$searchTerm)->get();
        }
        else{
        $actividades = ActividadAcademica::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->whereYear('fecha_comienzo', $this->periodoSelected)->where('nombre','like',$searchTerm)->get();
        $extensiones = ActividadExtension::where('is_valid', '=', 1)->where('id_financiamiento','=',1)->whereYear('fecha_comienzo', $this->periodoSelected)->where('nombre','like',$searchTerm)->get();
        }

        $montoFinanciado =0;//Recaudamos el monto total financiado desde hace 10 años
        $myArray = [];//Listamos las actividades en este array. Dante wn ¿Por qué la insistencia en tener una tabla para cada tipo de actividad? Lo mismo con las tesis, mira el temendo baile de código que hay que hacer por eso
        $dineroSinAsignar=0; //Dinero de Actividades en donde no se le ha asignado una fecha aún

        $anosFinanciadosArray = [];
        $financiamientoPorAnoArray=[];
        for ($i = date("Y")-10; $i <= date("Y")-1; $i++) {
            $anosFinanciadosArray[]=$i;
            $financiamientoPorAnoArray[$i]=0;
        }//array con los últimos 10 años

        

        $encabezado = array(
            0 => 'Actividad',
            1 => 'Tipo',
            2 => 'Monto'
        );
        

        foreach ($actividades as $actividad){
            $row = array(
                0 => $actividad->nombre_Link(),
                1 => 'Académica',
                2 => $actividad->montofinanciado
            );
            $montoFinanciado = $montoFinanciado + $actividad->montofinanciado;
            $myArray[] = $row;

            if(in_array(date('Y', strtotime($actividad->fecha_comienzo)),$anosFinanciadosArray)){
                $index=date('Y', strtotime($actividad->fecha_comienzo));
                $financiamientoPorAnoArray[$index]=$financiamientoPorAnoArray[$index]+$actividad->montofinanciado;
            }
            
        }

        foreach ($extensiones as $actividad){
            $row = array(
                0 => $actividad->nombre_Link(),
                1 => 'Extensión',
                2 => $actividad->montofinanciado
            );
            $montoFinanciado = $montoFinanciado + $actividad->montofinanciado;
            $myArray[] = $row;

            if(in_array(date('Y', strtotime($actividad->fecha_comienzo)),$anosFinanciadosArray)){
                $index=date('Y', strtotime($actividad->fecha_comienzo));
                $financiamientoPorAnoArray[$index]=$financiamientoPorAnoArray[$index]+$actividad->montofinanciado;
            }

            if(is_null($actividad->fecha_comienzo)){
                $dineroSinAsignar=$dineroSinAsignar+ $actividad->montofinanciado;
            }
            
        }


        //$anosFinanciados="'". implode("','",$anosFinanciados)."'";
        $financiamientoPorAno= implode(",",$financiamientoPorAnoArray);
        $myArray = $this->paginate($myArray);
        $data = compact('myArray', 'encabezado','montoFinanciado','anosFinanciadosArray','financiamientoPorAnoArray','dineroSinAsignar','financiamientoPorAno');
        return view('livewire.financiamiento.actividades.actividades', ['data' => $data]);
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

    public function paginate($items, $perPage = 30, $page = null, $options = [])

    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
