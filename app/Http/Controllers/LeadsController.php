<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadsRequest;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;

class LeadsController extends Controller
{
    public function create(LeadsRequest $request): RedirectResponse
    {
        $lead = new Lead();
        $lead->fill($request->validated());
        $lead->save();

        return back();

    }
}
