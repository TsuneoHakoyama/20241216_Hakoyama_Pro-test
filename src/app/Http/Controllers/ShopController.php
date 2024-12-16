<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Shop;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();

        $query = Shop::query()->with(['genre', 'prefecture', 'favorites' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->withAvg('reviews', 'rating');

        $sort = $request->input('sort', 'random');

        if ($sort === 'high') {
            $query->orderByRaw('reviews_avg_rating IS NULL, reviews_avg_rating DESC');
        } elseif ($sort === 'low') {
            $query->orderByRaw('reviews_avg_rating IS NULL, reviews_avg_rating ASC');
        } else {
            $query->inRandomOrder();
        }

        $shops = $query->get();

        return view('index', compact('shops', 'sort', 'prefectures', 'genres'));
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
        $today = Carbon::now()->toDateString();
        $shop = Shop::where('id', $shop_id)
                    ->with('prefecture', 'genre', 'reviews', 'bookings')
                    ->first();

        if(Auth::check()) {
            $user_id = Auth::id();
            $booking_status = Booking::where('shop_id', $shop_id)
                                     ->where('user_id', $user_id)
                                     ->whereDate('created_at', '<', $today)
                                     ->get();
            $review_status = Review::where('shop_id', $shop_id)
                                     ->where('user_id', $user_id)
                                     ->first();

            return view('detail', compact(['shop', 'today', 'booking_status', 'review_status']));
        }

        return view('detail', compact('shop', 'today'));
    }
}
