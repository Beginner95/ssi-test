<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
