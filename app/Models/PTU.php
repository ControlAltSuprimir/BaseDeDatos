<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTU extends Model
{
    use HasFactory;

    protected $table='ptu';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function persona()
    {
        return $this->belongsTo(Personas::class,'id_persona')->where('personas.is_valid','=',1);
    }
}
