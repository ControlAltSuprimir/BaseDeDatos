<?php

namespace App\Http\Livewire\Tablas;


use App\Models\ActividadFinanciacion;

use Livewire\Component;
use Livewire\WithPagination;

class actividaddinamica extends Component
{
    use WithPagination;

    public $profile;

    public $type;
    public $identity;

    


    public function mount($type, $identity)
    {
        $this->type = $type;
        $this->identity = $identity;
    }

    public function render()
    {
        $items = [];
        if($this->type == 'proyecto'){
            $profile = ActividadFinanciacion::where('id_proyecto','=',$this->identity)->where('is_valid','=',1)->get();

            foreach($profile as $member){
                $items[]=array(
                    'id' => ($member->id_extension) ? $member->id_extension:$member->id_academica,
                    'tipo' => ($member->id_extension) ? 'Extensión' : 'Académica',
                    'nombre' => ($member->id_extension) ? $member->laExtension->nombre:$member->laAcademica->nombre,
                    'intervalo' => ($member->id_extension) ? $member->laExtension->intervalo():$member->laAcademica->intervalo(),
                );
                
            }

        }
        return view('livewire.tablas.actividaddinamica', [
            'items' => $items
        ]);
    }

    
}
