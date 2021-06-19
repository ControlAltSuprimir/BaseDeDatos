<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasTesisTutores extends Model
{
    use HasFactory;

    protected $table = 'personas_tesis_tutores';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function el_tutor()
    {
        return $this->belongsTo(Personas::class, 'id_Persona');
    }
}
