<?php

namespace App\Mail;

//Modelos
use App\Models\Academicos;
use App\Models\Personas;

//Necesario
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//Para enviar correo
use Illuminate\Support\Facades\Mail;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Notificación";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.notificacion');
    }

    public function nuevoUsuario()
    {
        /*
        $academicos = Academicos::where('is_valid', '=', 1)->first();
        $academicos = Academicos::whereRaw("REPLACE(`name`, ' ', '') = ? ", $name)->first();
        
        $persona = Personas::find($academicos->id_Persona);
        $new_str= str_replace(' ', '',$persona->email);
        $persona->{'daemail'}= $new_str;
        $persona->save();
        
        $raufart = $academicos->persona->email;
        

        $correo = new Notificacion;
        $correo->subject = "Nuevo Usuario";
        $correo->from('example@diego.com', 'Admin');
        //Mail::to('rfauffar@uchile.cl')->send($correo);
        Mail::to($raufart)->send($correo);
        return "Mensaje Enviado";
        */


        /*
        $academicos = Academicos::where('is_valid', '=', 1)->get();
        $correos = [];
        foreach ($academicos as $academico) {
            $correo = new Notificacion;
            $correo->subject = "Nuevo Usuario";
            Mail::to(''.$academico->persona->email.'')->send($correo);
            //sleep(10);
            //return $academico->persona->email;
        }
        return 'listo';
        */
    }
}
