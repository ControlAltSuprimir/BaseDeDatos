<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticulosTesis extends Model
{

    use HasFactory;
    protected $table = 'articulos_tesis';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';     

    
    
}
