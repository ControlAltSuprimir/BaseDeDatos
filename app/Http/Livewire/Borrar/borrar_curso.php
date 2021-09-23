<?php

namespace App\Http\Livewire\Borrar;

use App\Models\Personas;
use App\Models\Articulos;
use App\Models\ArticulosTesis;
use App\Models\Curso;
use App\Models\CursoAlumno;
use App\Models\CursoDocente;
use App\Models\PersonasTesisTutores;
use App\Models\PersonasTesisComision;
use App\Models\Persona_Articulo;
use App\Models\ProyectosPersonasCoinvestigadores;
use App\Models\ProyectosPersonasColaboradores;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\ProyectosArticulos;
use App\Models\Tesis;
use App\Models\Viajes;
use App\Models\ProyectosViajes;




use Livewire\Component;
use Livewire\WithPagination;

class borrar_curso extends Component
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
        
        
        return view('livewire.borrar.curso', [
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

        $product = Curso::find($productId);
        if ($product) {
            $product->is_valid=0;
            CursoDocente::where('id_curso','=',$product->id)->update(['is_valid' => 0]);
            CursoAlumno::where('id_curso','=',$product->id)->update(['is_valid' => 0]);
            $product->save();

            request()->session()->flash(
                'success',
                'Curso borrado con éxito.'
            );

            return redirect()->to('/cursos');
            //->with('success','Artículo borrado con éxito')
        }
    }
}
