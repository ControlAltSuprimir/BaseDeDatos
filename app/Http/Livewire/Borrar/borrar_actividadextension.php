<?php

namespace App\Http\Livewire\Borrar;

use App\Models\ActividadExtension;
use App\Models\ActividadFinanciacion;
use App\Models\ActividadViaje;
use App\Models\PersonasActividadesExtension;
use App\Models\ProyectosActividadesExtension;
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
            ActividadFinanciacion::where('id_extension','=',$product->id)->update(['is_valid' => 0]);
            ActividadViaje::where('id_extension','=',$product->id)->update(['is_valid' => 0]);

            $product->save();

            return redirect()->to('/actividadextension');
        }
    }
}
