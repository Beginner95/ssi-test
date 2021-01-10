<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarModelRequest;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function index()
    {
        $car_models = CarModel::paginate(15);

        return view('admin.car_models.index', compact('car_models'));
    }

    public function create()
    {
        $brands = Brand::get();

        return view('admin.car_models.create', compact('brands'));
    }

    public function store(CarModelRequest $request): RedirectResponse
    {
        CarModel::create($request->only(['brand_id', 'name']));

        return redirect()->route('car-models.index')->with('success', 'Модель добавлена');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
