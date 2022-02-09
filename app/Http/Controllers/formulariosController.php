<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personas;
use App\Models\Academicos;
use App\Models\Proyectos;
use App\Models\Roles;

use App\Models\Formularioviajes;
use App\Models\Viajes;
use App\Models\ProyectosViajes;

use App\Mail\FormularioViaje;
use App\Models\ViajeFinanciacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class formulariosController extends Controller
{
    //
    public function index()
    {
        //
        return view('formularios.index');
    }

    public function viajespendientes()
    {
        // formularios de viajes pendientes

        $rol = auth()->user()->rol->first();
        //return $rol->first();
        //if ($rol->rol == 'Admin') {

        $pendientes = Formularioviajes::where('is_valid', '=', 1)->where('procesado', '=', 0)->where('rechazado', '=', 0)->paginate(25);
        $procesados = Formularioviajes::where('is_valid', '=', 1)->where('procesado', '=', 1)->where('rechazado', '=', 0)->paginate(25);
        $rechazados = Formularioviajes::where('is_valid', '=', 1)->where('rechazado', '=', 1)->paginate(25);
        $data = compact('pendientes', 'procesados', 'rechazados');
        return view('formularios.viajespendientes', ['data' => $data]);
        //}

        //return redirect('/dashboard')->with('success', 'Sólo administradores pueden entrar a la dirección que deseabas');
    }

    public function viajespendientesshow($id)
    {
        $pendiente = Formularioviajes::find($id);
        $data = compact('pendiente');
        return view('formularios.viajespendientesshow', ['data' => $data]);
    }

    public function viajeprocesado($id)
    {
        $pendiente = Formularioviajes::find($id);
        $viaje = new Viajes;

        $viaje->id_persona = $pendiente->id_persona;

        $viaje->paisDestino = $pendiente->pais_destino;
        $viaje->ciudadDestino = $pendiente->ciudad_destino;
        $viaje->paisOrigen = $pendiente->pais_origen;
        $viaje->ciudadOrigen = $pendiente->ciudad_origen;

        $viaje->comentarios = $pendiente->comentarios;
        $viaje->fecha = $pendiente->fecha;

        $viaje->created_by = auth()->id();
        $viaje->updated_by = auth()->id();
        $viaje->is_valid = 1;

        $viaje->save();

        $pendiente->procesado = 1;
        $pendiente->id_viaje = $viaje->id;
        $pendiente->save();

        if (isset($pendiente->id_proyecto)) {
            $link = new ViajeFinanciacion;
            $link->id_proyecto = $pendiente->id_proyecto;
            $link->id_viaje = $viaje->id;
            $link->contribucionfinanciera = $pendiente->contribucionfinanciera;
            $link->comentarios = $viaje->comentarios;
            $link->created_by = auth()->id();
            $link->updated_by = auth()->id();
            $link->is_valid = 1;
            $link->save();
        }

        if (isset($pendiente->id_institucion)) {
            $linkInstitucion = new ViajeFinanciacion;
            $linkInstitucion->id_institucion = $pendiente->id_institucion;
            $linkInstitucion->id_viaje = $viaje->id;
            $linkInstitucion->contribucionfinanciera = $pendiente->contribucionfinancierainstitucion;
            $linkInstitucion->comentarios = $viaje->comentarios;
            $linkInstitucion->created_by = auth()->id();
            $linkInstitucion->updated_by = auth()->id();
            $linkInstitucion->is_valid = 1;
            $linkInstitucion->save();
        }
        return redirect('/viajes/' . $viaje->id);
    }




    public function viaje()
    {
        //formulario de viaje se arma con Livewire
        return view('formularios.viajes');
    }

    // Guardando el viaje y enviando el correo correspondiente
    public function storeviaje(Request $request)
    {
        // guardar el viaje pendiente
        //return $request;

        $formulario = new Formularioviajes;

        $formulario->id_persona = $request->academico;

        $formulario->pais_origen = $request->pais_origen;
        $formulario->ciudad_origen = $request->ciudad_origen;
        $formulario->pais_destino = $request->pais_destino;
        $formulario->ciudad_destino = $request->ciudad_destino;

        $formulario->fecha = $request->fecha;
        $formulario->retorno_aproximado = $request->fecha_regreso;

        $formulario->id_proyecto = $request->proyecto;
        $formulario->contribucionfinanciera = $request->contribucionfinanciera;

        $formulario->id_institucion = $request->institucion;
        $formulario->contribucionfinancierainstitucion = $request->contribucionfinancierainstitucion;
        

        $formulario->comentarios = $request->comentarios;

        $formulario->procesado = 0;
        $formulario->rechazado = 0;
        $formulario->is_valid = 1;

        $formulario->save();

        //Enviando correo


        Mail::to($request->user())->send(new FormularioViaje($formulario));

        $mensaje = array(
            'titulo' => 'Formulario de Viaje exitoso',
            'contenido' => 'Se envió una notificación de correo a Alexia Cornejo'
        );




        if (auth()->check()) {
            return redirect('/dashboard')->with('success', $mensaje);
        } else {
            return view('formularios.resultado');
        }
    }
}
