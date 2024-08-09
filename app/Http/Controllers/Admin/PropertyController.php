<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use App\Models\PropertyDetails;
use App\Models\Features;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('details')->get();
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $features = Features::all();
        return view('admin.properties.create', compact('features'));
    }

    public function store(StorePropertyRequest $request, PropertyDetailRequest $detailRequest )
    {
        $property = new Property();
        $property->fill($request->validated());
        $property->save();
        $property->details()->save(new PropertyDetails($detailRequest->validated()));
        return redirect()->route('admin.properties.index');
    }

    public function show(Property $property)
    {
        $property->load('details');
        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $property->load('details');
        return view('admin.properties.edit', compact('property'));
    }

    public function update(StorePropertyRequest $request, Property $property, PropertyDetailRequest $detailRequest )
    {
        $property->update($request->validated());

        $property->details()->update($detailRequest->validated());

        return redirect()->route('admin.properties.index');
    }

    public function destroy(Property $property)
    {
        $property->details()->delete();
        $property->delete();
        return redirect()->route('admin.properties.index');
    }
}
