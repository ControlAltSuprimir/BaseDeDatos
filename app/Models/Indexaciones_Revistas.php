<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indexaciones_Revistas extends Model
{
    use HasFactory;

    protected $table='indexaciones_revistas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function laRevista()
    {
        return $this->belongsTo(Revistas::class, 'id_Revista')->withDefault([
            'nombre' => '',
        ]);
    }

}

