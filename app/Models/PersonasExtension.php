<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasExtension extends Model
{
    use HasFactory;

    protected $table='personas_extension';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'id_persona');
    }
}
