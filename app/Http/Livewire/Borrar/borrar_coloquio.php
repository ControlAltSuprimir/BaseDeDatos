<?php

namespace App\Http\Livewire\Borrar;

use App\Models\Coloquios;




use Livewire\Component;
use Livewire\WithPagination;

class borrar_coloquio extends Component
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
        
        
        return view('livewire.borrar.coloquios', [
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

        $product = Coloquios::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->save();

            return redirect()->to('/coloquios');
        }
    }
}
