<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CarModelSeeder::class);
        $this->call(CarSeeder::class);
    }
}
