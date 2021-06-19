<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona_Articulo extends Model
{
    use HasFactory;

    protected $table='persona_articulo';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function elAutor()
    {
        return $this->belongsTo(Personas::class, 'id_Persona')->withDefault([
            'primer_nombre' => '',
        ]);
    }
}
