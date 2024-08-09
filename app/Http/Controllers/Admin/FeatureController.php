<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    public function index()
    {
        $features = Features::all();
        return view('admin.features.index', compact('features'));
    }


    public function create(): string
    {
        return view('admin.features.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Features::create($request->all());

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully');
    }


    public function edit($id): string
    {
        $feature = Features::findOrFail($id);
        return view('admin.features.edit', compact('feature'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $feature = Features::findOrFail($id);
        $feature->update($request->all());

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully');
    }


    public function destroy($id): RedirectResponse
    {
        $feature = Features::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Feature deleted successfully');
    }
}
