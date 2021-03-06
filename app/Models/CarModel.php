<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static pluck(string $string, string $string1)
 * @method static create(array $only)
 * @method static paginate(int $int)
 */
class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';
    protected $fillable = [
        'name',
        'brand_id'
    ];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function car(): HasOne
    {
        return $this->hasOne(Car::class);
    }
}
