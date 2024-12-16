<?php

namespace App\Http\Controllers;

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

    public function import(Request $request)
    {
        // バリデーション
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
            'image_file.*' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 画像ファイルを保存しパスを取得
        $imagePaths = [];
        $dir = 'images/shops';
        if ($request->hasFile('image_file')) {
            foreach ($request->file('image_file') as $image) {
                $file_name = $image->getClientOriginalName();
                $path = $image->storeAs('public/' . $dir, $file_name);  // publicディレクトリに保存
                $imagePaths[] = $path;  // 画像のパスを保存
            }
        }

        // CSVファイルを読み込む
        $csvFile = $request->file('csv_file');
        $csvContent = file_get_contents($csvFile->getRealPath());

        // 文字コードをShift-JISからUTF-8に変換
        $csvContentUtf8 = mb_convert_encoding($csvContent, 'UTF-8', 'SJIS');

        // League\Csv\Reader を使用してCSVデータを読み込む
        $csv = Reader::createFromString($csvContentUtf8);
        $csv->setHeaderOffset(0);  // ヘッダー行をスキップ

        // 地域とジャンルのマッピング関数を使用
        $getGenreId = fn($genreName) => Genre::where('name', $genreName)->value('id');
        $getPrefectureId = fn($prefectureName) => Prefecture::where('name', $prefectureName)->value('id');

        foreach ($csv->getRecords() as $row) {
            $shop = new Shop();  // Shopモデルを新規作成
            $shop->name = $row['店舗名'];  // 店名をセット
            $shop->prefecture_id = $getPrefectureId($row['地域']);  // 地域のIDを取得してセット
            $shop->genre_id = $getGenreId($row['ジャンル']);        // ジャンルのIDを取得してセット
            $shop->description = $row['説明'];  // 説明をセット

            // 画像名に基づいて画像パスを取得
            $imageName = $row['画像名'] ?? null;  // CSVに画像名がある場合のみ
            $imagePath = collect($imagePaths)->first(fn($path) => basename($path) === $imageName);

            $shop->image = Storage::url($imagePath);  // 画像パスをセット

            $shop->save();  // データベースに保存
        }

        return back()->with('success', '店舗データをインポートしました！');
    }

    public function showReview(Request $request)
    {
        $reviews = Review::all();

        return view('admin.review', compact('reviews'));
    }

    public function remove(Request $request)
    {
        Review::find($request->id)->delete();

        return redirect()->back();

    }

    public function confirm(Request $request)
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
