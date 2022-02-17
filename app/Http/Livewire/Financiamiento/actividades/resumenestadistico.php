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

class resumenestadistico extends Component
{
    use WithPagination;


    public $filtro;

    public $searchTerm;


    public function render()
    {

        $actividades = ActividadAcademica::join('actividad_financiacion', 'actividad_financiacion.id_academica', '=', 'actividadacademica.id')
        ->select('actividadacademica.nombre', 'actividadacademica.fecha_comienzo', 'actividadacademica.fecha_termino', 'actividad_financiacion.contribucion_financiera')
        ->where('actividad_financiacion.is_valid', '=', 1)
        ->where('actividad_financiacion.id_institucionfinanciadora', '=', 1)
        ->where('actividadacademica.is_valid', '=', 1)
        ->get();
        
    $extensiones = ActividadExtension::join('actividad_financiacion', 'actividad_financiacion.id_extension', '=', 'actividadextension.id')
        ->select('actividadextension.nombre', 'actividadextension.fecha_comienzo', 'actividadextension.fecha_termino', 'actividad_financiacion.contribucion_financiera')
        ->where('actividad_financiacion.is_valid', '=', 1)
        ->where('actividad_financiacion.id_institucionfinanciadora', '=', 1)
        ->where('actividadextension.is_valid', '=', 1)
        ->get();
        //$actividades = ActividadAcademica::where('is_valid', '=', 1)->select('montofinanciado', 'fecha_comienzo')->where('id_financiamiento', '=', 1)->get();
        //$extensiones = ActividadExtension::where('is_valid', '=', 1)->select('montofinanciado', 'fecha_comienzo')->where('id_financiamiento', '=', 1)->get();

        $montoFinanciado = 0; //Recaudamos el monto total financiado desde hace 10 años
        $myArray = []; //Listamos las actividades en este array. Dante wn ¿Por qué la insistencia en tener una tabla para cada tipo de actividad? Lo mismo con las tesis, mira el temendo baile de código que hay que hacer por eso
        $dineroSinAsignar = 0; //Dinero de Actividades en donde no se le ha asignado una fecha aún

        $anosFinanciadosArray = [];
        $financiamientoPorAnoArray = [];
        for ($i = date("Y") - 10; $i <= date("Y") - 1; $i++) {
            $anosFinanciadosArray[] = $i;
            $financiamientoPorAnoArray[$i] = 0;
        } //array con los últimos 10 años



        $encabezado = array(
            0 => 'Año',
            1 => 'Tipo',
            2 => 'Periodo'
        );


        foreach ($actividades as $actividad) {

            $montoFinanciado = $montoFinanciado + $actividad->montofinanciado;

            if (in_array(date('Y', strtotime($actividad->fecha_comienzo)), $anosFinanciadosArray)) {
                $index = date('Y', strtotime($actividad->fecha_comienzo));
                $financiamientoPorAnoArray[$index] = $financiamientoPorAnoArray[$index] + $actividad->contribucion_financiera;
            }
            if (is_null($actividad->fecha_comienzo)) {
                $dineroSinAsignar = $dineroSinAsignar + $actividad->montofinanciado;
            }
        }

        foreach ($extensiones as $actividad) {

            $montoFinanciado = $montoFinanciado + $actividad->montofinanciado;

            if (in_array(date('Y', strtotime($actividad->fecha_comienzo)), $anosFinanciadosArray)) {
                $index = date('Y', strtotime($actividad->fecha_comienzo));
                $financiamientoPorAnoArray[$index] = $financiamientoPorAnoArray[$index] + $actividad->contribucion_financiera;
            }

            if (is_null($actividad->fecha_comienzo)) {
                $dineroSinAsignar = $dineroSinAsignar + $actividad->montofinanciado;
            }
        }


        $anosFinanciados = "'" . implode("','", $anosFinanciadosArray) . "'";
        $financiamientoPorAno = implode(",", $financiamientoPorAnoArray);

        $data = compact('encabezado', 'montoFinanciado', 'anosFinanciados', 'financiamientoPorAno', 'dineroSinAsignar', 'anosFinanciadosArray', 'financiamientoPorAnoArray');
        if ($this->filtro == 'graph') {
            return view('livewire.financiamiento.actividades.graficogeneral', ['data' => $data]);
        } else {
            return view('livewire.financiamiento.actividades.resumengeneral', ['data' => $data]);
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

    public function paginate($items, $perPage = 30, $page = null, $options = [])

    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
