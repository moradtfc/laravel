<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('roles')->insert(
        array(
            'name' => 'admin',
            'description' => 'Administrador',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        )
    );

            DB::table('roles')->insert(
        array(
            'name' => 'scotiabank',
            'description' => 'Usuarios Scotiabank',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        )
    );

            DB::table('roles')->insert(
        array(
            'name' => 'socio',
            'description' => 'Socios Scotiabank',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        )
    );

               DB::table('users')->insert(
        array(
            'name' => 'Fernando Lira',
            'email' => 'fernando@datatrust.pe',
            'password'=> bcrypt('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'id_rol' => '1',
        )
    );

    DB::table('users')->insert(
        array(
            'name' => 'Usuario Fernando Scotiabank',
            'email' => 'fernando@crediscotia.com.pe',
            'password'=> bcrypt('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'id_rol' => '2',
        )
    );

    DB::table('users')->insert(
        array(
            'name' => 'Usuario Socio',
            'email' => 'socio@datatrust.pe',
            'password'=> bcrypt('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'id_rol' => '3',
        )
    );
    DB::table('users')->insert(
        array(
            'name' => 'Usuario Socio 2',
            'email' => 'socio2@datatrust.pe',
            'password'=> bcrypt('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
   			'id_rol' => '3',
        )
    );


    }
}
