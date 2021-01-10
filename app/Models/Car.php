<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function model(): HasOne
    {
        return $this->hasOne(CarModel::class, 'id', 'car_model_id');
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('file')) {
            if ($image) {
                Storage::delete($image);
            }

            return $request->file('file')->store("");
        }
        return null;
    }


    public function getImage(): string
    {
        if (!$this->file) {
            return asset("no-image.png");
        }
        return asset("uploads/{$this->file}");
    }
}
