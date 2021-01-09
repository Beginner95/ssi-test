<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    public function definition(): array
    {
        $brands = Brand::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'brand_id' => rand(min($brands), max($brands))
        ];
    }
}
