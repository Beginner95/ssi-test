<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    public function run()
    {
        CarModel::factory()
            ->count(3)
            ->create();
    }
}
