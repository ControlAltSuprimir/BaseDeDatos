<?php

namespace App\Http\Livewire\Modals\viaje;


use App\Models\Proyectos;
use App\Models\ViajeFinanciacion;
use Livewire\Component;
use Livewire\WithPagination;

class proyectosviaje extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $rules = [
        'product.id_proyecto' => 'required|numeric',
        'product.contribucionfinanciera' => ''
    ];

    
    public $allProyectos;
    public $items = null;
    public $type;
    public $edit;
    public $search;

    public $menu = [];

    public function mount($edit)
    {
        //$this->search = "";
        //$this->type = $type;
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo', 'asc')->get();
        $this->items = $edit;
    }
    public function render()
    {
        return view('livewire.modals.viaje.proyectosviaje', [
            'products' => ViajeFinanciacion::where('is_valid', '=', 1)->whereNotNull('id_proyecto')->where('id_viaje', '=', $this->items)->latest()->paginate(10)
        ]);
    }


    //Esta función no se está usando en este momento
    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product =  ViajeFinanciacion::find($productId);
    }

    public function save()
    {
        //$this->product->id_Persona=$this->items;
        $this->validate();

        if (!is_null($this->productId)) {
            //
            $this->product->updated_by = auth()->id();
            $this->product->save();
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $product = ViajeFinanciacion::find($productId);
        if ($product) {
            $product->is_valid = 0;
            $this->product->updated_by = auth()->id();
            $product->save();
        }
    }
}
