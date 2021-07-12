<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaProyecto extends Model
{
    use HasFactory;
    protected $table='proyectos_personas';
    protected $primaryKey = 'id';

    public function elProyecto()
    {
        return $this->belongsTo(Proyectos::class, 'id_proyecto');
    }

    public function laPersona()
    {
        return $this->belongsTo(Personas::class, 'id_proyecto');
    }

}
