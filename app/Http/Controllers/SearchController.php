<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Property::query()
            ->join('property_details', 'properties.id', '=', 'property_details.property_id')
            ->select('properties.*', 'property_details.bedrooms', 'property_details.bathrooms');

        $query->when($request->filled('status'), function ($q) use ($request) {
            $q->where('properties.status', $request->input('status'));
        });

        $query->when($request->filled('autocomplete-input'), function ($q) use ($request) {
            $q->where('properties.address', 'LIKE', '%' . $request->input('autocomplete-input') . '%');
        });

        $query->when($request->filled('min_area'), function ($q) use ($request) {
            $q->where('properties.area', '>=', $request->input('min_area'));
        });

        $query->when($request->filled('max_area'), function ($q) use ($request) {
            $q->where('properties.area', '<=', $request->input('max_area'));
        });

        $query->when($request->filled('min_price'), function ($q) use ($request) {
            $q->where('properties.price', '>=', $request->input('min_price'));
        });

        $query->when($request->filled('max_price'), function ($q) use ($request) {
            $q->where('properties.price', '<=', $request->input('max_price'));
        });

        $query->when($request->filled('beds'), function ($q) use ($request) {
            $q->where('property_details.bedrooms', $request->input('beds'));
        });

        $query->when($request->filled('baths'), function ($q) use ($request) {
            $q->where('property_details.bathrooms', $request->input('baths'));
        });

        $query->when($request->filled('type'), function ($q) use ($request) {
            $q->where('properties.type', $request->input('type'));
        });

        $properties = $query->paginate(10);

        $view = $request->input('view', 'sidebar');

        switch ($view) {
            case 'full-width':
                return view('listing.listing_list_full', compact('properties'));
            case 'sidebar':
            default:
                return view('listing.listing_list_sidebar', compact('properties'));
        }
    }
}
