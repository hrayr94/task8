<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }


    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully');
    }
}
