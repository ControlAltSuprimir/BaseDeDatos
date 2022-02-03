<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personas;
use App\Models\PTU;

class financiamientoController extends Controller
{
    public function actividades(){
        return view('financiamiento.actividades');
    }
}
