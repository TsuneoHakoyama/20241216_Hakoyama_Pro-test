<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function reservation(BookingRequest $request)
    {
        if ($request->input('back') == 'back') {
            $shop_id = $request->input('shop_id');
            return redirect()->route('detail', ['id' => $shop_id]);
        }

        $request['user_id'] = Auth::id();
        $confirm = $request->only([
            'shop_id',
            'user_id',
            'date',
            'time',
            'people'
        ]);

        Booking::create($confirm);

        return view('reservation-complete');
    }

    public function cancel(Request $request)
    {
        Booking::find($request->reservation_id)->delete();

        return redirect()->route('mypage', [$request->shop_id]);
    }
}
