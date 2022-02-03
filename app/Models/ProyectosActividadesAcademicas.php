<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosActividadesAcademicas extends Model
{
    use HasFactory;

    protected $table='proyecto_academica';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function laActividad()
    {
        return $this->belongsTo(ActividadAcademica::class, 'id_academica');
    }

    public function elProyecto()
    {
        return $this->belongsTo(Proyectos::class, 'id_proyecto');
    }

}

