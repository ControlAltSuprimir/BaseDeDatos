<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosActividadesExtension extends Model
{
    use HasFactory;

    protected $table='proyecto_extension';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function laActividad()
    {
        return $this->belongsTo(ActividadExtension::class, 'id_actividad');
    }

    public function elProyecto()
    {
        return $this->belongsTo(Proyectos::class, 'id_proyecto');
    }

}

