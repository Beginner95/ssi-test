<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarModelRequest;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;

class CarModelController extends Controller
{
    public function index()
    {
        $car_models = CarModel::paginate(15);

        return view('admin.car_models.index', compact('car_models'));
    }

    public function create()
    {
        $brands = Brand::pluck('name', 'id');

        return view('admin.car_models.create', compact('brands'));
    }

    public function store(CarModelRequest $request): RedirectResponse
    {
        CarModel::create($request->only(['brand_id', 'name']));

        return redirect()->route('car-models.index')->with('success', 'Модель добавлена');
    }

    public function edit(CarModel $carModel)
    {
        $brands = Brand::pluck('name', 'id');

        return view('admin.car_models.edit', compact('carModel', 'brands'));
    }

    public function update(CarModel $carModel, CarModelRequest $request): RedirectResponse
    {
        $carModel->update($request->only(['brand_id', 'name']));

        return redirect()->route('car-models.index')->with('success', 'Модель обновлена');
    }

    public function destroy(CarModel $carModel): RedirectResponse
    {
        try {
            $carModel->delete();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('car-models.index')->with('success', 'Модель удалена');
    }
}
