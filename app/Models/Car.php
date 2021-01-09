<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $fillable = [
        'file',
        'year_manufacture',
        'national_number',
        'color',
        'transmission',
        'rental_price',
        'car_model_id'
    ];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    public function model(): HasOne
    {
        return $this->hasOne(CarModel::class);
    }
}
