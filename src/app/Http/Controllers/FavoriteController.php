<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $favorite = new Favorite;
        $favorite->shop_id = $request->shop_id;
        $favorite->user_id = Auth::user()->id;
        $favorite->save();

        return redirect()->route('shop-all', [$request->shop_id]);
    }

    public function destroy(Request $request)
    {
        $shop = Shop::findOrFail($request->shop_id);
        $shop->favorites()->delete();

        return redirect()->route('shop-all', [$request->shop_id]);
    }
}
