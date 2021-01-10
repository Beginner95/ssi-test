<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_model_id' => 'required|integer',
            'year_manufacture' => 'required',
            'national_number' => 'required',
            'color' => 'required',
            'transmission' => 'required',
            'rental_price' => 'required',
            'file' => 'nullable|image'
        ];
    }
}
