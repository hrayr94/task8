<?php

namespace App\Http\Controllers;

use App\Models\Property;

class ComparingPropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::whereIn('id', [17,19,20])->get();

        return view('comparing_properties.index', compact('properties'));
    }

}
