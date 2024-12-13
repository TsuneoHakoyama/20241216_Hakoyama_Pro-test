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

        $presence = Review::where('user_id', $user_id)
                          ->where('shop_id', $request->shop_id)
                          ->first();

        is_null($presence) ? Review::create($param) : Review::find($presence->id)->update($param);

        return redirect()->route('detail', ['id' => $request->shop_id]);
    }

    public function update(Request $request)
    {
        $shop = Shop::where('id', $request->shop_id)
            ->with('prefecture', 'genre')
            ->first();
        $my_review = Review::find($request->review_id);

        return view('review', compact('shop', 'my_review'));
    }

    public function removeReview(Request $request)
    {
        Review::find($request->review_id)->delete();

        return redirect()->back();
    }
}
