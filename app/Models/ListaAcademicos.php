<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ListaAcademicos extends Model
{
    use HasFactory;
    protected $table = 'lista_academicos';
    protected $primaryKey = 'id';
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

}
