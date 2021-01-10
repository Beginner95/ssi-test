<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(15);

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $models = CarModel::pluck('name', 'id');

        return view('admin.cars.create', compact('models'));
    }

    public function store(CarRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['file'] = Car::uploadImage($request);

        Car::create($data);

        return redirect()->route('cars.index')->with('success', 'Автомобиль успешно добавлен');
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
