<?php

namespace Tests\Feature;

use App\Models\Ciudad;
use App\Models\Campus;
use App\Models\Carrera;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ciudad()
    {
        $ciudad_datos = ['nombre' => 'ciudad', 'entidadFederativa' => 'federacion', 'borrado' => false];
        $ciudad = new Ciudad($ciudad_datos);
        $ciudad->save();

        $campus_datos = ['nombre' => 'campus', 'borrado' => false];
        $campus = new Campus($campus_datos);
        $campus->ciudad()->associate($ciudad);
        $campus->save();

        $this->assertEquals($campus->pkCampus, $ciudad->campuses()->first()->pkCampus);
        $this->assertDatabaseHas('Ciudad', $ciudad_datos);
    }

    public function test_campus()
    {
        $ciudad_datos = ['nombre' => 'ciudad', 'entidadFederativa' => 'federacion', 'borrado' => false];
        $ciudad = new Ciudad($ciudad_datos);
        $ciudad->save();

        $campus_datos = ['nombre' => 'campus', 'borrado' => false];
        $campus = new Campus($campus_datos);
        $campus->ciudad()->associate($ciudad);
        $campus->save();

        $carrera_datos = ['nombre' => 'carrera', 'borrado' => false];
        $carrera = new Carrera($carrera_datos);
        $carrera->save();

        $usuario_datos = [
            'nombre' => 'usuario',
            'apellido' => 'apellido',
            'correoElectronico' => 'correo',
            'contrasena' => 'password',
            'nombreDeUsuario' => 'user',
            'borrado' => false,
            'usuarioCreacion' => 0
        ];
        $usuario = new User($usuario_datos);
        $usuario->carrera()->associate($carrera);
        $usuario->campus()->associate($campus);
        $usuario->save();

        $this->assertEquals($ciudad->pkCiudad, $campus->ciudad()->first()->pkCiudad);
        $this->assertEquals($usuario->pkUsuario, $campus->usuarios()->first()->pkUsuario);
        $this->assertDatabaseHas('Campus', $campus_datos);
    }

    public function test_carrera()
    {
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

        $usuario_datos = [
            'nombre' => 'usuario',
            'apellido' => 'apellido',
            'correoElectronico' => 'correo',
            'contrasena' => 'password',
            'nombreDeUsuario' => 'user',
            'borrado' => false,
            'usuarioCreacion' => 0
        ];
        $usuario = new User($usuario_datos);
        $usuario->carrera()->associate($carrera);
        $usuario->campus()->associate($campus);
        $usuario->save();

        $this->assertEquals($usuario->pkUsuario, $carrera->usuarios()->first()->pkUsuario);
        $this->assertDatabaseHas('Carrera', $carrera_datos);
    }

    public function test_usuario()
    {
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

        $usuario_datos = [
            'nombre' => 'usuario',
            'apellido' => 'apellido',
            'correoElectronico' => 'correo',
            'contrasena' => 'password',
            'nombreDeUsuario' => 'user',
            'borrado' => false,
            'usuarioCreacion' => 0
        ];
        $usuario = new User($usuario_datos);
        $usuario->carrera()->associate($carrera);
        $usuario->campus()->associate($campus);
        $usuario->save();

        $this->assertEquals($carrera->pkCarrera, $usuario->carrera()->first()->pkCarrera);
        $this->assertEquals($campus->pkCampus, $usuario->campus()->first()->pkCampus);
        $this->assertDatabaseHas('Usuario', $usuario_datos);
    }
}
