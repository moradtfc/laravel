<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesUserTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(CataloguesTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
