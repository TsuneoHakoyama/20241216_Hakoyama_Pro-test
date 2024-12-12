<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show()
    {
        $my_bookings = Shop::with(['bookings' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        $my_favorites = Shop::with(['favorites' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        return view('mypage', compact('my_bookings', 'my_favorites'));
    }

    public function destroy(Request $request)
    {
        $shop = Shop::find($request->shop_id);
        $shop->favorites()->delete();

        return redirect()->route('mypage', [$request->shop_id]);
    }
}
