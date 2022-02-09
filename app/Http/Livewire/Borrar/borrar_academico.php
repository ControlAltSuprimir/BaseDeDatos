<?php

namespace App\Http\Livewire\Borrar;

use App\Models\Academicos;



use Livewire\Component;
use Livewire\WithPagination;

class borrar_academico extends Component
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
        return view('livewire.borrar.academico', [
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
        $product = Academicos::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->save();
            return redirect()->to('/academicos');
        }
    }
}
