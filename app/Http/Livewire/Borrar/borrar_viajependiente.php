<?php

namespace App\Http\Livewire\Borrar;

use App\Models\Formularioviajes;



use Livewire\Component;
use Livewire\WithPagination;

class borrar_viajependiente extends Component
{
    use WithPagination;

    public $showModal = false;
    public $productId;
    public $product;

    

    public $allProgramas;
    public $items = null;

    public $edit;

    public function mount($edit)
    {
        $this->items = $edit;

    }
    public function render()
    {
        
        
        return view('livewire.borrar.formularioviaje', [
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

        $product = Formularioviajes::find($productId);
        if ($product) {
            $product->rechazado=1;
            $product->save();

            request()->session()->flash(
                'success',
                'Viaje rechazado con éxito.'
            );

            return redirect()->to('/viajespendientes');
        }
    }
}
