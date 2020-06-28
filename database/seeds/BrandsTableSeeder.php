<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Gloria',
            'email' => 'erass@gloria.com',
            'photo_path' => 'brands/brand-photo-1552930619.png',
            'photo_url' => '/private/var/folders/4k/fq3rn2sn2bd46b7p4blqyjh00000gn/T/phpEWdDYX',
            'final_url' => 'https://scotiapuntos.s3.us-east-2.amazonaws.com/brands/brand-photo-1552930619.png',
            'active_url' => '1',
            'user_id' => '3',
        ]);
        DB::table('brands')->insert([
            'name' => 'Samsung',
            'email' => 'asddd@samsung.com',
            'photo_path' => 'brands/brand-photo-1552930619.png',
            'photo_url' => '/private/var/folders/4k/fq3rn2sn2bd46b7p4blqyjh00000gn/T/phpEWdDYX',
            'final_url' => 'https://scotiapuntos.s3.us-east-2.amazonaws.com/brands/brand-photo-1552930619.png',
            'active_url' => '1',
            'user_id' => '4',
        ]);

    }
}
