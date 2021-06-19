<?php

namespace App\Http\Livewire\Editar;


use App\Models\ActividadExtension;
use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\ProyectosActividadesAcademicas;
use App\Models\ProyectosActividadesExtension;
use App\Models\Revistas;
use App\Models\Viajes;
use Livewire\Component;

class editarextension extends Component
{
    public $participantes = [];
    public $extraParticipantes= [];
    public $proyectos = [];

    public $allPersonas = [];
    public $allProyectos = [];
    public $allViajes = [];

    public $perfil;
    public $edit;




    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->get();
        $this->allViajes = Viajes::where('is_valid', '=', 1)->get();

        $this->perfil = ActividadExtension::find($edit);

        $enlaces = PersonasActividadesExtension::where('id_actividad','=',$edit)
                                                ->where('is_valid','=',1)
                                                ->get();
        
        foreach($enlaces as $enlace)
        {
            /*
            $this->participantes[]['select'] = $enlace->id_persona;
            $this->participantes[]['viaje'] = $enlace->id_viaje;
            */
            $this->participantes[]=array(
                'select' => $enlace->id_persona,
                'viaje' => $enlace->id_viaje,
                'cargo' =>$enlace->cargo
            );
        }
        
        //$this->participantes = [['select' => '', 'descripcion' => '', 'viaje' =>'']];
        $this->extraParticipantes = [['primer_nombre' => '', 'primer_apellido' => '']];
        //$this->proyectos = [];

        $losProyectos = ProyectosActividadesExtension::where('id_actividad','=',$edit)
                                                        ->where('is_valid','=',1)
                                                        ->get();

        foreach($losProyectos as $elProyecto)
        {
            $this->proyectos[] = $elProyecto->id_proyecto;
        }
    }


    public function addItem($index){
        if ($index=='participantes'){$this->participantes[]=[['select' => '', 'descripcion' => '']];}
        elseif($index=='extraParticipantes'){$this->extraParticipantes[]=[['primer_nombre' => '', 'primer_apellido' => '']];}
        elseif($index=='proyectos'){$this->proyectos[]='';}
    }

    public function removeItem($index,$type){
        if ($type=='participantes')
        {
            unset($this->participantes[$index]);
            $this->participantes = array_values($this->participantes);
        }
        elseif($type=='extraParticipantes')
        {
            unset($this->extraParticipantes[$index]);
            $this->extraParticipantes= array_values($this->extraParticipantes);
        }
        elseif($type=='proyectos')
        {
            unset($this->proyectos[$index]);
            $this->proyectos= array_values($this->proyectos);
        }
    }

    public function render()
    {
        return view('livewire.editar.actividadextension');
    }
}
