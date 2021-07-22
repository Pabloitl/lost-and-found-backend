<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Carrera;
use App\Models\Ciudad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // curl -X POST -F 'nombre=test' -F 'apellido=test' -F 'correoElectronico=test@test.com' -F 'contrasena=aA1&saonteuhh' -F 'nombreDeUsuario=test' -F 'fotoDePerfil=@/foto.jpg' localhost:8000/api/usuarios/

        // TODO: Validacion del captcha
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|alpha|min:2|max:50',
            'apellido' => 'required|alpha|min:2|max:50',
            'correoElectronico' => 'required|unique:Usuario',
            'contrasena' => 'required|min:8|max:30|regex:/[&@$!%*#?]/|regex:/[0-9]/|regex:/[A-Z]/',
            'nombreDeUsuario' => 'required|alpha_num|min:3|max:15|unique:Usuario'
        ]);

        if ($validator->fails())
        {
            return $validator->errors()->jsonSerialize();
        }

        // TODO: Borrar creacion de otros modelos
        $carrera_datos = ['nombre' => 'carrera', 'borrado' => false];
        $carrera = new Carrera($carrera_datos);
        $carrera->save();
        $ciudad_datos = ['nombre' => 'ciudad', 'entidadFederativa' => 'federacion', 'borrado' => false];
        $ciudad = new Ciudad($ciudad_datos);
        $ciudad->save();
        $campus_datos = ['nombre' => 'campus', 'borrado' => false];
        $campus = new Campus($campus_datos);
        $campus->ciudad()->associate($ciudad);
        $campus->save();

        // TODO: Si la imagen esta vacia
        $fotoDePerfil = $request->file('fotoDePerfil')->store('fotos_perfil');

        $datos_usuario = [
            'nombre'            => $request->nombre,
            'apellido'          => $request->apellido,
            'correoElectronico' => $request->correoElectronico,
            'contrasena'        => $request->contrasena,
            'nombreDeUsuario'   => $request->nombreDeUsuario,
            'borrado'           => false,
            'usuarioCreacion'   => 0,
            'fotoDePerfil'      => $fotoDePerfil
        ];

        $usuario = new User($datos_usuario);
        $usuario->carrera()->associate($carrera);
        $usuario->campus()->associate($campus);
        $usuario->save();

        return response($usuario, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
