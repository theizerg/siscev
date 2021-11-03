<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gerencias;
use App\Models\Ente;

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




        $ente = new Ente();
        $ente->descripcion     = 'BANDES';
        $ente->save();


        $ente = new Ente();
        $ente->descripcion     = 'CORPOVEX';
        $ente->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'GESTION DEL TALENTO HUMANO';
        $gerencia->ente_id =1;
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'ADMINISTRACION';
        $gerencia->ente_id =1;
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'TECNOLOGIA DE LA INFORMACION';
        $gerencia->ente_id =1;
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'RESGUARDO INSTITUCIONAL';
        $gerencia->ente_id =1;
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'COOP Y FINANC  NACIONAL';
        $gerencia->ente_id =1;
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'ADMINISTRACION DE FONDOS';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'AUDITORIA INTERNA';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'FINANZAS';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'PRESIDENCIA';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'INFOR Y RELACIONES PUBLICAS';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'FONDOS PARA EL DESARROLLO';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'PLANIFI Y GESTION ESTRATEGICA';
        $gerencia->ente_id =1;
        $gerencia->save();


        $gerencia = new Gerencias;
        $gerencia->descricion     = 'PREINVERSION Y ASISTENCIA TECNICA';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'VICEPRESIDENCIA EJECUTIVA';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'SECRETARIA DE LA PRESIDENCIA';
        $gerencia->ente_id =1;
        $gerencia->save();

        $gerencia = new Gerencias;
        $gerencia->descricion     = 'COOP Y FINANC INTERNACIONAL';
        $gerencia->ente_id =1;
        $gerencia->save();





    }
}
