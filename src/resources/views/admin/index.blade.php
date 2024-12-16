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
                        <div class="message">
                            @if(session('success-import'))
                            {{ session('success-import')}}
                            @endif
                        </div>
                        <div class="csv-file">
                            <div class="error-message">
                                @if($errors->has('csv_file'))
                                {{ $errors->first('csv_file') }}
                                @endif
                            </div>
                            <label for="csv">
                                <input type="file" name="csv_file" id="csv">csvファイルを選択する
                            </label>
                            <p id="upload-csv">選択されていません</p>
                        </div>
                        <div class="image-file">
                            <div class="error-message">
                                @if($errors->has('image_file'))
                                {{ $errors->first('image_file') }}
                                @endif
                            </div>
                            <label for="image">
                                <input type="file" name="image_file[]" id="image" multiple>画像を選択する
                            </label>
                            <p id="upload-image">選択されていません</p>
                        </div>
                    </div>
                    <div class="submit-button">
                        <button type="submit">インポート</button>
                    </div>
                </form>
            </div>

            <div class="shop-user">
                <form action="{{ route('admin.user.confirm') }}" method="post">
                    @csrf
                    <h3>店舗代表者登録</h3>
                    <div class="message">
                        @if(session('success'))
                        {{ session('success')}}
                        @endif
                    </div>
                    <table class="input-form">
                        <tr>
                            <th>利用者名：</th>
                            <td><input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="利用者名"></td>
                            <div class="error-message">
                                @if($errors->has('name'))
                                {{ $errors->first('name') }}
                                @endif
                            </div>
                        </tr>
                        <tr>
                            <th>メールアドレス：</th>
                            <td><input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="aaa@example.com"></td>
                            <div class="error-message">
                                @if($errors->has('email'))
                                {{ $errors->first('email') }}
                                @endif
                            </div>
                        </tr>
                        <tr>
                            <th>パスワード：</th>
                            <td><input type="text" id="password" name="password"></td>
                            <div class="error-message">
                                @if($errors->has('password'))
                                {{ $errors->first('password') }}
                                @endif
                            </div>
                        </tr>
                        <tr>
                            <th>店舗名：</th>
                            <td><input type="text" id="shop-name" name="shop_name" value="{{ old('shop_name') }}" placeholder="店舗名"></td>
                            <div class="error-message">
                                @if($errors->has('shop_name'))
                                {{ $errors->first('shop_name') }}
                                @endif
                            </div>
                        </tr>
                    </table>
                    <div class="submit-button">
                        <button type="submit">確認</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script src="{{ asset('js/csvfilename.js') }}"></script>
    <script src="{{ asset('js/imagefilename.js') }}"></script>
</body>