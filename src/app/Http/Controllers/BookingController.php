<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking(BookingRequest $request)
    {
        $request['user_id'] = Auth::id();
        $booking = $request->only([
            'shop_id',
            'user_id',
            'date',
            'time',
            'number'
        ]);

        Booking::create($booking);

        return view('booking');
    }

    public function cancel(Request $request)
    {
        Booking::find($request->reservation_id)->delete();

        return redirect()->route('mypage', [$request->shop_id]);
    }
}
