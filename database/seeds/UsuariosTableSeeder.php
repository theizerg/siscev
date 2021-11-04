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


       





    }
}
