<?php

namespace App\Http\Livewire\Modals;

use App\Models\Proyectos;
use App\Models\ActividadFinanciacion;
use Livewire\Component;
use Livewire\WithPagination;

class proyectosactividad extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $rules = [
        'product.id_proyecto' => 'required|numeric',
        'product.contribucion_financiera'=> ''
    ];

    public $allViajes;
    public $allProyectos;
    public $lesViajes;
    public $allPersonas;
    public $items = null;
    public $type;
    public $edit;
    public $search;

    public $menu = [];

    public function mount($edit, $type)
    {
        //$this->search = "";
        $this->type = $type;
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->items = $edit;
    }
    public function render()
    {
        return view('livewire.modals.proyectosactividad', [
            'products' => ($this->type == 1) ? ActividadFinanciacion::where('is_valid', '=', 1)->whereNotNull('id_proyecto')->where('id_academica', '=', $this->items)->latest()->paginate(10) : ActividadFinanciacion::where('is_valid', '=', 1)->whereNotNull('id_proyecto')->where('id_extension', '=', $this->items)->latest()->paginate(10)
        ]);
    }


    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = ($this->type == 1) ? ActividadFinanciacion::find($productId) : ActividadFinanciacion::find($productId);
        
    }

    

    public function save()
    {
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
        $product = ActividadFinanciacion::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->updated_by = auth()->id();
            $product->save();
        }
    }
}
