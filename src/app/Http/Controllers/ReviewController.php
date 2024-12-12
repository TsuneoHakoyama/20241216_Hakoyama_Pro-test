<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($shop_id)
    {
        $shop = Shop::where('id', $shop_id)
                    ->with('prefecture', 'genre')
                    ->first();

        return view('review', compact('shop'));
    }

    public function record(Request $request)
    {
        $user_id = Auth::id();
        $param = $request->all();
        unset($param['_token']);
        $param['user_id'] = $user_id;

        if (isset($request->image)) {
            $dir = 'images/reviews';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $param['image'] = 'storage/' . $dir . '/' . $file_name;
        }

        Review::create($param);

        return redirect()->route('detail', ['id' => $request->shop_id]);
    }
}
