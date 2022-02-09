<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coloquios extends Model
{
    use HasFactory;

    protected $table='coloquios';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function expositor()
    {
        return $this->belongsTo(Personas::class,'id_persona')->first();
    }

    public function institucion()
    {
        return $this->belongsTo(Instituciones::class,'id_institucion')->first();
    }

}
