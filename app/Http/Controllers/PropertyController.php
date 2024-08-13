<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Features;
use App\Models\Property;
use App\Models\PropertyDetails;
use App\Models\PropertyImages;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class PropertyController extends Controller
{
    public function index(): string
    {
        $properties = Property::all();

        return view('properties.index', compact('properties'));
    }

    public function welcome()
    {
        $properties = Property::all();

        return view('welcome', compact('properties'));
    }


    public function create(): string
    {
        $features = Features::all();
        $rooms = Property::ROOMS;
        $buildingAges = Property::BUILDING_AGES;

        return view('properties.create', [
            'statuses' => Property::getStatuses(),
            'types' => Property::getTypes(),
            'features' => $features,
            'rooms' => $rooms,
            'buildingAges' => $buildingAges,
        ]);
    }


    public function store(StorePropertyRequest $request, PropertyDetailRequest $detailRequest): RedirectResponse
    {

        $property = new Property();
        $property->user_id = auth()->id();
        $property->fill($request->validated());
        $property->save();

        $propertyDetails = new PropertyDetails();
        $propertyDetails->property_id = $property->id;
        $propertyDetails->fill($detailRequest->validated());
        $propertyDetails->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filePath = $image->store('public/images');
                $propertyImages = new PropertyImages();
                $propertyImages->property_id = $property->id;
                $propertyImages->image = $filePath;
                $propertyImages->save();
            }
        }

        return redirect()->route('properties.index');
    }

    public function edit($id): string
    {
        $property = Property::findOrFail($id);
        $features = Features::all();
        return view('properties.edit', [
            'property' => $property,
            'features' => $features,
            'statuses' => Property::getStatuses(),
            'types' => Property::getTypes(),
        ]);
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully');
    }

    private function getSimilarProperties(Property $property)
    {
        return Property::where('id', '!=', $property->id)
            ->where('area', $property->area)
            ->take(5)
            ->get()
            ->all();
    }

    public function show($id): string
    {
        $property = Property::with('details')->findOrFail($id);
        $properties = Property::all();

        if (!$property) {
            abort(404);
        }

        return view('properties.show', [
            'property' => $property,
            'properties' => $properties,
        ]);
    }


    public function destroy($id): RedirectResponse
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully');
    }


}
