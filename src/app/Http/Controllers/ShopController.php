<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();

        if(Auth::check()) {
            $shops = Shop::with(['genre', 'prefecture', 'favorites' => function ($query) {
                $query->where('user_id', Auth::id());
            }])->get();
        }

        $shops = Shop::with(['genre', 'prefecture'])->get();

        return view('index', compact('shops', 'prefectures', 'genres'));
    }

    public function search(Request $request)
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();

        $query = Shop::query();
        $query = $this->getSearchQuery($request, $query);
        $shops = $query->get();

        return view('index', compact('shops', 'prefectures', 'genres'));
    }

    private function getSearchQuery($request, $query)
    {
        if (!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%');
            });
        }

        if (!empty($request->area)) {
            $query->where('prefecture_id', '=', $request->area);
        }

        if (!empty($request->genre)) {
            $query->where('genre_id', '=', $request->genre);
        }
        return $query;
    }

    public function detail($shop_id)
    {

        $shop = Shop::where('id', $shop_id)
                     ->with('prefecture', 'genre', 'reviews')
                     ->first();

        $today = Carbon::now()->toDateString();

        return view('detail', compact('shop', 'today'));
    }
}
