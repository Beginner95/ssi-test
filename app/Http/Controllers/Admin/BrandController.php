<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use \Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(15);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $request): RedirectResponse
    {
        Brand::create($request->only(['name']));

        return redirect()->route('brands.index')->with('success', 'Марка добавлена');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Brand $brand, BrandRequest $request): RedirectResponse
    {
        $brand->update($request->only(['name']));

        return redirect()->route('brands.index')->with('success', 'Марка обновлена');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        try {
            $brand->delete();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('brands.index')->with('success', 'Марка удалена');
    }
}
