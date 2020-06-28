<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Juguetes',
            'description' => 'Categoria jueguetes',
            'color_code' => '#ffffff',
            'icon_path' => 'categories/category-photo-1552932555.png',
            'icon_url' => 'https://scotiapuntos.s3.us-east-2.amazonaws.com/categories/category-photo-1552932555.png',
            'pdf_url' => 'http://cdn.agilitycms.com/scotiabank-peru/scotia-puntos/pdf/2018/junio/AF_DIRECTORIO_LIMA_Chicos.pdf',
            'active_url' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Viajes',
            'description' => 'Categoria Viajes',
            'color_code' => '#000000',
            'icon_path' => 'categories/category-photo-1552932555.png',
            'icon_url' => 'https://scotiapuntos.s3.us-east-2.amazonaws.com/categories/category-photo-1552932555.png',
            'pdf_url' => 'http://cdn.agilitycms.com/scotiabank-peru/scotia-puntos/pdf/2018/junio/AF_DIRECTORIO_LIMA_Chicos.pdf',
            'active_url' => '1',
        ]);
    }
}
