<?php

namespace App\Http\Livewire\Borrar;

use App\Models\ActividadAcademica;
use App\Models\ActividadFinanciacion;
use App\Models\ActividadViaje;
use App\Models\PersonasActividadesAcademicas;
use App\Models\ProyectosActividadesAcademicas;
use Livewire\Component;
use Livewire\WithPagination;

class borrar_actividadacademica extends Component
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
        
        
        return view('livewire.borrar.actividadacademica', [
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

        $product = ActividadAcademica::find($productId);
        if ($product) {
            $product->is_valid=0;
            PersonasActividadesAcademicas::where('id_academica','=',$product->id)->update(['is_valid' => 0]);
            ActividadFinanciacion::where('id_academica','=',$product->id)->update(['is_valid' => 0]);
            ActividadViaje::where('id_academica','=',$product->id)->update(['is_valid' => 0]);

            $product->save();

            return redirect()->to('/actividadacademica');
        }
    }
}
