<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;

    protected $table='instituciones';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
   

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/instituciones/$this->id\" > {$this->nombre} </a>";
    }


}
