<?php

namespace App\Http\Livewire\Editar;

use App\Models\Academicos;
use App\Models\Proyectos;
use App\Models\Institucionfinanciadora;
use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;

use Illuminate\Http\Request;
use App\Models\Indexaciones;
use App\Models\Viajes;
use Livewire\Component;


class editarviaje extends Component
{

    //menues
    public $allAcademicos = [];
    public $allProyectos = [];
    public $allInstituciones = [];
    public $allAcademicas = [];
    public $allExtensiones = [];

    //a editar 
    public $proyectos = [];
    public $instituciones = [];
    public $academicas = [];
    public $extensiones =[];

    public $perfil;
    public $edit;


    public function mount($edit)
    {
        $this->allProyectos = Proyectos::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->allInstituciones = Institucionfinanciadora::where('is_valid','=',1)->get();
        $this->allAcademicas = ActividadAcademica::where('is_valid','=',1)->get();
        $this->allExtensiones = ActividadExtension::where('is_valid','=',1)->get();

        $this->allAcademicos =  Academicos::with('persona')->select('academicos.*')
            ->where('academicos.is_valid', '=', 1)
            ->join('personas', 'personas.id', '=', 'academicos.id_Persona')
            ->orderBy('personas.primer_apellido')
            ->orderBy('personas.segundo_apellido')
            ->get();

        $id = $edit;
        $viaje = Viajes::find($id);

        // Instituciones Financiadoras
        $lasinstituciones = $viaje->institucionesFinanciadoras()->get();
        //Proyectos
        $losproyectos = $viaje->proyectos()->get();
        //Actividades
        $lasacademicas = $viaje->academicas()->get();
        $lasextensiones = $viaje->extensiones()->get();

        //Participantes
        foreach($losproyectos as $proyecto) { $this->proyectos[] = $proyecto->id; }
        foreach($lasinstituciones as $institucion) { $this->instituciones[] = $institucion->id; }
        foreach($lasacademicas as $academica) { $this->academicas[] = $academica->id; }
        foreach($lasextensiones as $extension) { $this->extensiones[] = $extension->id; }

        $this->perfil = $viaje;
    }





    


    // Render

    public function render()
    {
        info($this->proyectos);
        info($this->instituciones);
        info($this->academicas);
        info($this->extensiones);
        
        return view('livewire.editar.viajes');
    }
}
