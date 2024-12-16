<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店舗代表者登録</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/shop-user.css') }}">
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
            <li><a href="{{ route('admin.index') }}">管理者ホーム</a></li>
        </div>
    </div>

    <main>
        <div class="confirm">
            <div class="title">
                <h2>店舗代表者情報</h2>
            </div>
            <form action="{{ route('admin.user.register') }}" method="post">
                @csrf
                <table class="user-info">
                    <tr>
                        <th>利用者名</th>
                        <td> {{ $shop_user['name'] }}</td>
                        <input type="hidden" name="name" value="{{ $shop_user['name'] }}">
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $shop_user['email'] }}</td>
                        <input type="hidden" name="email" value="{{ $shop_user['email'] }}">
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <td>{{ $shop_user['password'] }}</td>
                        <input type="hidden" name="password" value="{{ $shop_user['password'] }}">
                    </tr>
                    <tr>
                        <th>店舗名</th>
                        <td>{{ $shop_user['shop_name'] }}</td>
                        <input type="hidden" name="shop_name" value="{{ $shop_user['shop_name'] }}">
                    </tr>
                </table>
                <div class="submit-button">
                    <button type="submit" name="back">戻る</button>
                    <button type="submit" name="send">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>