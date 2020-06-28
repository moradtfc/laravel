<?php

use Illuminate\Database\Seeder;

class CataloguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogues')->insert([
            'name' => 'Marzo',
            'status' => 'pendiente',
            'url' => 'http://www.datatrustperu.com.pe/clientes/2017/principal/natalia/junio/scotiabank_padre/scotiapuntos_dia_del_padre_01/scotiapuntos_dia_del_padre_1.html',
        ]);
        DB::table('catalogues')->insert([
            'name' => 'Abril',
            'status' => 'pendiente',
            'url' => 'http://www.datatrustperu.com.pe/clientes/2017/principal/natalia/junio/scotiabank_padre/scotiapuntos_dia_del_padre_01/scotiapuntos_dia_del_padre_1.html',
        ]);

    }
}
