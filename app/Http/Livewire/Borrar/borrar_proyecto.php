<?php

namespace App\Http\Livewire\Borrar;

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
use App\Models\Viajes;
use App\Models\ProyectosViajes;




use Livewire\Component;
use Livewire\WithPagination;

class borrar_proyecto extends Component
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
        
        
        return view('livewire.borrar.proyecto', [
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

        $product = Proyectos::find($productId);
        if ($product) {
            $product->is_valid=0;
            ProyectosViajes::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            ProyectosTesistas::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            ProyectosArticulos::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            ProyectosActividadesExtension::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            ProyectosActividadesAcademicas::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            ProyectosPersonasColaboradores::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            ProyectosPersonasCoinvestigadores::where('id_proyecto','=',$product->id)->update(['is_valid' => 0]);
            $product->save();

            return redirect()->to('/proyectos');
        }
    }
}
