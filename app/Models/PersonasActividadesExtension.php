<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasActividadesExtension extends Model
{
    use HasFactory;

    protected $table='personas_extension';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function laActividad()
    {
        return $this->belongsTo(ActividadExtension::class, 'id_actividad')->where('actividadextension.is_valid','=',1);
    }

    public function leParticipante()
    {
        return $this->belongsTo(Personas::class, 'id_persona')->where('personas.is_valid','=',1);
    }
    
    public function leViaje()
    {
        return $this->belongsTo(Viajes::class, 'id_viaje')->where('viajes.is_valid','=',1);
    }
}

