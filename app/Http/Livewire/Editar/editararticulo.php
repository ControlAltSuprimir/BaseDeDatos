<?php

namespace App\Http\Livewire\Editar;
use App\Models\Personas;
use App\Models\Revistas;
use App\Models\Articulos;
use App\Models\Indexaciones_Revistas;
use Illuminate\Http\Request;
use App\Models\Indexaciones;
use Livewire\Component;

class editararticulo extends Component
{
    public $orderProducts = [];
    public $allProducts = [];
    public $indexacionesAEditar = [];
    public $allPersonas = [];
    public $extraPersonas = [];
    public $allRevistas = [];
    public $perfil;
    public $edit;


    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->get();
        $this->allRevistas = Revistas::where('is_valid','=',1)->get();

        $id=$edit;
        $articulo = Articulos::find($id);
        $detalles = $articulo->autores()->get();
        //$tablaDeIndexaciones = [];
        foreach($detalles as $detalle)
        {
            $array = array(
                'id' => $detalle->id,
                'id_Persona' => $detalle->id,
                'autor' => $detalle->full_name(),
                );
            $this->orderProducts[] =$array;
            $this->indexacionesAEditar[] =$array;

        }
        $this->perfil=$articulo;
        
        
    }

    public function addExtraPersona()
    {
        $this->extraPersonas[] = ['primer_nombre' => '', 'primer_apellido' => ''];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function removeExtraPersona($indexExtraPersona)
    {
        unset($this->extraPersonas[$indexExtraPersona]);
        $this->extraPersonas = array_values($this->extraPersonas);
    }

    public function render()
    {
        info($this->extraPersonas);
        info($this->orderProducts);
        return view('livewire.editar.articulos');
    }
}
