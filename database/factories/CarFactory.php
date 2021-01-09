<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        $transmission = ['Автомат', 'Механика'];
        $car_models = CarModel::pluck('id')->toArray();

        return [
            'file' => null,
            'year_manufacture' => $this->faker->date(),
            'national_number' => $this->faker->randomNumber(),
            'color' => $this->faker->colorName,
            'transmission' => $transmission[rand(0, 1)],
            'rental_price' => $this->faker->randomFloat(),
            'car_model_id' => rand(min($car_models), max($car_models))
        ];
    }
}
