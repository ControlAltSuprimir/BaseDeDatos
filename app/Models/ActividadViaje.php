<?php

namespace App\Models;

use App\Http\Livewire\Modals\institucionesactividad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadViaje extends Model
{
    use HasFactory;

    protected $table='actividad_viaje';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 


    public function laAcademica()
    {
        return $this->belongsTo(ActividadAcademica::class, 'id_academica');
    }

    public function laExtension()
    {
        return $this->belongsTo(ActividadExtension::class, 'id_extension');
    }

    public function elViaje()
    {
        return $this->belongsTo(Viajes::class, 'id_viaje');
    }

}
