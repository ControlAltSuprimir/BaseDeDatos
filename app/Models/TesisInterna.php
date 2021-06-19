<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesisInterna extends Model
{
    use HasFactory;
    protected $table = 'tesisinterna';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function tesisAsociada()
    {
        return $this->belongsTo(Tesis::class,'id_tesis')->where('tesis.is_valid','=',1)->orderBy('titulo');
    }
}
