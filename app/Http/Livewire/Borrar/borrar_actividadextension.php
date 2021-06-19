<?php

namespace App\Http\Livewire\Borrar;

use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use App\Models\ArticulosTesis;
use App\Models\Indexaciones_Revistas;
use App\Models\Personas;
use App\Models\Proyectos;
use App\Models\PersonasProgramas;
use App\Models\PersonasTesisTutores;
use App\Models\PersonasTesisComision;
use App\Models\Persona_Articulo;
use App\Models\ProyectosPersonasCoinvestigadores;
use App\Models\ProyectosPersonasColaboradores;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\ProyectosActividadesAcademicas;
use App\Models\ProyectosActividadesExtension;
use App\Models\ProyectosArticulos;
use App\Models\ProyectosTesistas;
use App\Models\Tesis;
use App\Models\Revista;
use App\Models\Viajes;
use App\Models\ProyectosViajes;
use App\Models\Revistas;
use App\Models\TesisInterna;
use Livewire\Component;
use Livewire\WithPagination;

class borrar_actividadextension extends Component
{
    use WithPagination;

    public $showModal = false;
    public $productId;
    public $product;

    protected $paginationTheme = 'bootstrap';

    public $designTemplate = 'tailwind';

    

    public $allProgramas;
    public $items = null;

    public $edit;

    public function mount($edit)
    {
        
        $this->items = $edit;
        

    }
    public function render()
    {
        
        
        return view('livewire.borrar.actividadextension', [
            'products' => $this->items
        ]);
    }

    
    public function open()
    {
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {

        $product = ActividadExtension::find($productId);
        if ($product) {
            $product->is_valid=0;
            PersonasActividadesExtension::where('id_actividad','=',$product->id)->update(['is_valid' => 0]);
            ProyectosActividadesExtension::where('id_actividad','=',$product->id)->update(['is_valid' => 0]);

            $product->save();

            return redirect()->to('/actividadextension');
        }
    }
}
