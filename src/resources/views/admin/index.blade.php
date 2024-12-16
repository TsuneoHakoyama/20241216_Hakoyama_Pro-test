<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ホーム</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>

<body>
    <div class="header">
        <div class="logo-board">
            <div class="title-logo">
                <button class="burger" id="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="logo">
                <a href="#">Rese</a>
            </div>
        </div>
        <div class="review-link">
            <li><a href="{{ route('admin.review') }}">口コミ一覧</a></li>
            <li><a href="{{ route('admin.logout') }}">ログアウト</a></li>
        </div>
    </div>

    <main>
        <div class="main-board">
            <div class="shop-info">
                <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data" accept="text/csv, image/jpeg, image/png">
                    @csrf
                    <h3>店舗情報登録</h3>
                    <div class="upload-area">
                        <div class="csv-file">
                            <label for="csv">
                                <input type="file" name="csv_file" id="csv">csvファイルを選択する
                            </label>
                            <p id="upload-csv">選択されていません</p>
                        </div>
                        <div class="image-file">
                            <label for="image">
                                <input type="file" name="image_file[]" id="image" multiple>画像を選択する
                            </label>
                            <p id="upload-image">選択されていません</p>
                            <script src="{{ asset('js/filename.js') }}"></script>
                        </div>
                    </div>
                    <div class="submit-button">
                        <button type="submit">インポート</button>
                    </div>
                    <div class="error-message">
                        @if ($errors->has('image'))
                        {{ $errors->first('image')}}
                        @endif
                    </div>
                </form>
            </div>

            <div class="shop-user">
                <form action="{{ route('admin.user.confirm') }}" method="post">
                    @csrf
                    <h3>店舗代表者登録</h3>
                    <table class="input-form">
                        <tr>
                            <th>利用者名：</th>
                            <td><input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="利用者名"></td>
                        </tr>
                        <tr>
                            <th>メールアドレス：</th>
                            <td><input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="aaa@example.com"></td>
                        </tr>
                        <tr>
                            <th>パスワード：</th>
                            <td><input type="text" id="password" name="password"></td>
                        </tr>
                        <tr>
                            <th>店舗名：</th>
                            <td><input type="text" id="shop-name" name="shop_name" value="{{ old('shop_name') }}" placeholder="店舗名"></td>
                        </tr>
                    </table>
                    <div class="submit-button">
                        <button type="submit">確認</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script src="{{ asset('js/filename.js') }}"></script>
</body>