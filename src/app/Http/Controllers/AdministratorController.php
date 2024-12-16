<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Http\Requests\ShopUserRegisterRequest;
use App\Models\Genre;
use App\Models\Prefecture;
use App\Models\Review;
use App\Models\Shop;
use App\Models\ShopUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use League\Csv\Reader;


class AdministratorController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function import(ImportRequest $request)
    {
        dd($request->all());
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
            'image_file.*' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePaths = [];
        $dir = 'images/shops';
        if ($request->hasFile('image_file')) {
            foreach ($request->file('image_file') as $image) {
                $file_name = $image->getClientOriginalName();
                $path = $image->storeAs('public/' . $dir, $file_name);
                $imagePaths[] = $path;
            }
        }

        $csvFile = $request->file('csv_file');
        $csvContent = file_get_contents($csvFile->getRealPath());

        $csvContentUtf8 = mb_convert_encoding($csvContent, 'UTF-8', 'SJIS');

        $csv = Reader::createFromString($csvContentUtf8);
        $csv->setHeaderOffset(0);

        $getGenreId = fn($genreName) => Genre::where('name', $genreName)->value('id');
        $getPrefectureId = fn($prefectureName) => Prefecture::where('name', $prefectureName)->value('id');

        foreach ($csv->getRecords() as $row) {
            $shop = new Shop();
            $shop->name = $row['店舗名'];
            $shop->prefecture_id = $getPrefectureId($row['地域']);
            $shop->genre_id = $getGenreId($row['ジャンル']);
            $shop->description = $row['説明'];

            $imageName = $row['画像名'] ?? null;
            $imagePath = collect($imagePaths)->first(fn($path) => basename($path) === $imageName);

            $shop->image = Storage::url($imagePath);

            $shop->save();
        }

        return back()->with('success-import', '店舗データをインポートしました！');
    }

    public function showReview(Request $request)
    {
        $reviews = Review::all();

        return view('admin.review', compact('reviews'));
    }

    public function remove(Request $request)
    {
        Review::find($request->id)->delete();

        return redirect()->back()->with(['remove_msg' => '口コミを削除しました']);

    }

    public function confirm(ShopUserRegisterRequest $request)
    {
        $shop_user = $request->only([
            'name',
            'email',
            'password',
            'shop_name'
        ]);

        return view('admin.shop-user', compact('shop_user'));
    }

    public function store(Request $request)
    {
        if ($request->has('back')) {
            return redirect()->route('admin.index')->withInput();
        }

        ShopUser::create(
            $request->only([
                'name',
                'email',
                'password',
                'shop_name'
            ])
        );

        return redirect()->route('admin.index')->with('success', '店舗代表者を登録しました');
    }
}
