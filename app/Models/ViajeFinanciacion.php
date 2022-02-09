<?php

namespace App\Models;

use App\Http\Livewire\Modals\institucionesactividad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViajeFinanciacion extends Model
{
    use HasFactory;

    protected $table='viaje_financiacion';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 


    public function elViaje()
    {
        return $this->belongsTo(Viajes::class, 'id_viaje');
    }

    public function elProyecto()
    {
        return $this->belongsTo(Proyectos::class, 'id_proyecto');
    }

    public function laInstitucion()
    {
        return $this->belongsTo(Institucionfinanciadora::class, 'id_institucionfinanciadora');
    }

}
