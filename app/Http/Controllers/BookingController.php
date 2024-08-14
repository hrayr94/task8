<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $booking = new Booking();
//        dd($request->all());
        $booking->fill($request->validated());
        $booking->save();
        return back()->with('success', 'Booking request has been submitted!');
    }
}
