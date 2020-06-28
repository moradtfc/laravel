<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name' => 'Tienda 1',
            'address' => 'direccion callao perla barracones donde no sales',
            'contact' => '456456-45645 , 456456-34553',
            'latitude' => '-11.9367735',
            'longitude' => '-76.6969111',
            'brand_id' => '2',
        ]);
         DB::table('stores')->insert([
            'name' => 'Tienda Sex Shop',
            'address' => 'el agustino frente a casa de IO',
            'contact' => '456456-45645 , 456456-34553',
            'latitude' => '-12.056479',
            'longitude' => '-76.9880827',
            'brand_id' => '2',
        ]);
          DB::table('stores')->insert([
            'name' => 'Tienda Pulpin',
            'address' => 'Barranco',
            'contact' => '456456-45645 , 456456-34553',
            'latitude' => '-12.143959',
            'longitude' => '-77.0202681',
            'brand_id' => '2',
        ]);
        DB::table('stores')->insert([
            'name' => 'Tienda 2',
            'address' => 'direccion callao perla barracones donde no sales',
            'contact' => '456456-45645 , 456456-34553',
            'latitude' => '-12.2380498',
            'longitude' => '-76.7838627',
            'brand_id' => '1',
        ]);
          DB::table('stores')->insert([
            'name' => 'Tiendita',
            'address' => 'Av Larco 123 4332',
            'contact' => '456456-45645 , 456456-34553',
            'latitude' => '-12.1250334',
            'longitude' => '-77.0292724',
            'brand_id' => '1',
        ]);
    }
}
