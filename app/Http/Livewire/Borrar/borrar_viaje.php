<?php

namespace App\Http\Livewire\Borrar;

use App\Models\ActividadViaje;
use App\Models\ArticulosTesis;
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
use App\Models\TesisInterna;
use App\Models\ViajeFinanciacion;
use Livewire\Component;
use Livewire\WithPagination;

class borrar_viaje extends Component
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
        
        
        return view('livewire.borrar.viaje', [
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

        $product = Viajes::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->updated_by=auth()->id();

            ViajeFinanciacion::where('id_viaje','=',$product->id)->update(['is_valid' => 0,'updated_by'=>auth()->id()]);
            ActividadViaje::where('id_viaje','=',$product->id)->update(['is_valid' => 0,'updated_by'=>auth()->id()]);

            $product->save();
            return redirect()->to('/viajes');
        }
    }
}
