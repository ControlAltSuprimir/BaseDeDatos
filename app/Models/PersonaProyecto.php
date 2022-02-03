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
        return $this->belongsTo(Personas::class, 'id_persona')->orderBy('personas.primer_apellido');
    }

    protected $fillable = ['id_persona', 'id_proyecto' , 'participacion','fecha','descripcionParticipacion','created_by','updated_by'];

}
