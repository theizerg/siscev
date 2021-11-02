<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gerencias;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name     = 'Admin';
        $user->username = 'laradmin';
        $user->genero   = 'M';
        $user->lastname = 'Administrador';
        $user->email    = 'admin@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');


        $user = new User;
        $user->name     = 'Usuario';
        $user->username = 'larausuario';
        $user->genero   = 'F';
        $user->lastname = 'Usuarios';
        $user->email    = 'usuario@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Usuario');




        $gerencia = new Gerencias;
        $gerencia->descricion     = 'GESTION DEL TALENTO HUMANO';
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'ADMINISTRACION';
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'TECNOLOGIA DE LA INFORMACION';
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'RESGUARDO INSTITUCIONAL';
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'COOP Y FINANC  NACIONAL';
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'ADMINISTRACION DE FONDOS';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'AUDITORIA INTERNA';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'FINANZAS';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'PRESIDENCIA';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'INFOR Y RELACIONES PUBLICAS';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'FONDOS PARA EL DESARROLLO';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'PLANIFI Y GESTION ESTRATEGICA';
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'PREINVERSION Y ASISTENCIA TECNICA';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'VICEPRESIDENCIA EJECUTIVA';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'SECRETARIA DE LA PRESIDENCIA';
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'COOP Y FINANC INTERNACIONAL';
        $gerencia->save();





    }
}
