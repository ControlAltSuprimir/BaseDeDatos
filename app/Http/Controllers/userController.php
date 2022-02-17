<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personas;
use App\Models\Roles;

use Illuminate\Http\Request;

use DB;
use Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $rol = auth()->user()->rol->first();
        //return $rol->first();
        if ($rol->rol == 'Admin') {

            $user = User::where('is_valid','=',1)->get();
            $data = compact('user');
            return view('user.index', ['data' => $data]);
        }

        $message= array(
            'titulo' => 'Acceso denegado.',
            'contenido' => 'Sólo administradores pueden entrar a la dirección que deseabas'
        );    
        return redirect('/dashboard')->with('success',$message);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rol = auth()->user()->rol->first();
        //return $rol->first();
        if ($rol->rol == 'Admin') {
            $personas = Personas::where('is_valid', '=', 1)->get();
            $roles = Roles::where('is_valid', '=', 1)->get();
            $data = compact('personas', 'roles');
            return view('user.create', ['data' => $data]);
        }
        $message= array(
            'titulo' => 'Acceso denegado.',
            'contenido' => 'Sólo administradores pueden entrar a la dirección que deseabas'
        );
        return redirect('/dashboard')->with('success', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request;
        $rol = auth()->user()->rol->first();
        //return $rol->first();
        if ($rol->rol == 'Admin') {
            $user = new User;
            $user->name = $request->nombre_usuario;
            $user->email = $request->email;
            $user->password = Hash::make($request->rut);
            //return $user;
            $user->save();

            DB::table('users_personas')->insert([
                'id_persona' => $request->persona,
                'id_user' => $user->id,
                'is_valid' => 1
            ]);

            DB::table('users_roles')->insert([
                'id_rol' => $request->rol,
                'id_user' => $user->id,
                'is_valid' => 1
            ]);
        }
        $message= array(
            'titulo' => 'Acceso denegado.',
            'contenido' => 'Sólo administradores pueden entrar a la dirección que deseabas'
        );
        return redirect('/dashboard')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /*
        $persona = Personas::findOrFail($id);

        $academico = Academicos::where('id_Persona', '=', $id)->where('is_valid', '=', 1)->first();
        //$articulos = $persona->articulos;
        if (is_null($academico)) {
            $data = compact('persona');
            return view('personas.show', ['data' => $data]);
        } else {
            $data = compact('academico');
            return  view('academicos.show', ['data' => $data]);
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rol = auth()->user()->rol->first();
        //return $rol->first();
        if ($rol->rol == 'Admin') {
            $user =User::find($id);
            $personas = Personas::where('is_valid', '=', 1)->get();
            $roles = Roles::where('is_valid', '=', 1)->get();
            $data = compact('personas', 'roles','user');
            return view('user.edit', ['data' => $data]);
        }
        $message= array(
            'titulo' => 'Acceso denegado.',
            'contenido' => 'Sólo administradores pueden entrar a la dirección que deseabas'
        );
        return redirect('/dashboard')->with('success', $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $id;
        $rol = auth()->user()->rol->first();
        //return $rol->first();
        if ($rol->rol == 'Admin') {

        $user = User::find($id);
        $user->name = $request->nombre_usuario;
        $user->email = $request->email;
        $user->password = Hash::make($request->rut);
        //return $user;
        $user->save();

        DB::table('users_personas')
            ->where('id_user', '=', $user->id)
            ->update([
                'id_persona' => $request->persona,
                'id_user' => $user->id,
                'is_valid' => 1
            ]);

        DB::table('users_roles')
            ->where('id_user', '=', $user->id)
            ->update([
                'id_rol' => $request->rol,
                'id_user' => $user->id,
                'is_valid' => 1
            ]);
        }

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona = Personas::find($id);
        $persona->is_valid = 0;

        return redirect('/personas');
    }
}
