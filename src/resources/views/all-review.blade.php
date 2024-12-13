<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>レビュー一覧</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

</head>

<body>
    <div class="main-content">
        <div class="main-board">
            <div class="shop-detail">
                <div class="header__wrapper-title">
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
                    <nav class="menu" id="menu">
                        <ul>
                            <li><a href="{{ route('root') }}">Home</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                            <li><a href="{{ '/mypage' }}">Mypage</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/hamburger.js') }}"></script>
</body>