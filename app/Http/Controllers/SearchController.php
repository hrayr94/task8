<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Property::query();

        // Status filter
        $query->when($request->input('tab') && $request->input('tab') !== 'Any Status', function ($q) use ($request) {
            $q->where('status', $request->input('tab'));
        });

        // Location filter
        $query->when($request->filled('autocomplete-input'), function ($q) use ($request) {
            $q->where('address', 'LIKE', '%' . $request->input('autocomplete-input') . '%');
        });

        // Price filter
        $query->when($request->filled('min_price'), function ($q) use ($request) {
            $q->where('price', '>=', $request->input('min_price'));
        });

        $query->when($request->filled('max_price'), function ($q) use ($request) {
            $q->where('price', '<=', $request->input('max_price'));
        });

        // Beds filter
        $query->when($request->filled('beds'), function ($q) use ($request) {
            $q->where('bedrooms', $request->input('beds'));
        });

        // Baths filter
        $query->when($request->filled('baths'), function ($q) use ($request) {
            $q->where('bathrooms', $request->input('baths'));
        });

        // Type filter (if applicable)
        $query->when($request->filled('type'), function ($q) use ($request) {
            $q->where('type', $request->input('type'));
        });

        // Execute the query and get the results with pagination
        $properties = $query->paginate(10); // Use paginate() instead of get()

        return view('listing.listing_list_full', compact('properties'));
    }
}
